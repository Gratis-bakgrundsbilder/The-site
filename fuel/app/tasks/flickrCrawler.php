<?php

namespace Fuel\Tasks;


/**
 * Exceptiosn thrown by FlickerCrawler::flickrGet();
 */
class FlickrException extends \Exception {}


/**
 * Flicker crawler
 *
 * Crawls flicker for images
 *
 * @example Crawlar webben efter bilder.
 *          Körs med cronjob varje natt.
 *     
 *     `   $alice = new Crawler();
 *         $alice->crawl(1000, 'bokeh')->saveResults();
 *     `
 *     
 *     
 *      Workflow:
 *          Hämta bilder
 *              loopa igenom dem
 *              finns bilden redan?
 *          nej, spara till array med länk till bild, fotograf, licens, etc
 *          spara ner bilderna i databasen
 *
 * @author Sony? aka Sawny
 **/
class FlickrCrawler
{
    private $apikey; //Neccesary for this class to work. Value set in the run() method.
    private $wallpaperLocationFull; //Set in run();
    private $wallpaperLocationRelative; //Set in run();
   
    //TODO: get from DB
    private $licenses = array('Attribution licenses'                         => 4,        
                              'Attribution-NoDerivs License'                 => 6,
                              'Attribution-NonCommercial-NoDerivs License'   => 3,
                              'Attribution-NonCommercial License'            => 2,
                              'Attribution-NonCommercial-ShareAlike License' => 1,
                              'Attribution-ShareAlike License'               => 5,

                              4 => 'Attribution licenses',                        
                              6 => 'Attribution-NoDerivs License',                
                              3 => 'Attribution-NonCommercial-NoDerivs License',  
                              2 => 'Attribution-NonCommercial License',           
                              1 => 'Attribution-NonCommercial-ShareAlike License',
                              5 => 'Attribution-ShareAlike License');



    public function run()
    {
        //Variables, config, etc
        $config = \Fuel\Core\Config::load('flickrAPI');
        $this->apiKey = $config['key'];

        $this->wallpaperLocationFull     = DOCROOT . 'public/assets/img/wallpapers/' . date('Y-m-d') . '/';
        $this->wallpaperLocationRelative = '/assets/img/wallpapers/' . date('Y-m-d') . '/';


        echo "Hello world!\n";


        $this->crawl(7, 'bokeh');
    }



    /**
     * Crawl
     *
     * @todo make config file for the defaults?
     */
    public function crawl($limit         = 10,
                          $tags          = '',
                          $searchText    = '',
                          $license       = null,
                          $minResolution = array(1280, 800),
                          $startPage     = null)
    {
        $startPage = (is_int($startPage)) ? $startPage : rand(); //$startPage = rand();
        $license   = (!is_null($license)) ? $license   : $this->licenses['Attribution licenses'];

        //TODO: Om limit är över 500, dela upp i flera request.

        $args = array('per_page' => $limit,
                      'tags'     => $tags,
                      'text'     => $searchText,
                      'license'  => $license,
                      'page'     => $startPage);

        try {
            $result = $this->flickrGet('photos.search', $args);

            $pictures  = array(); //All pictures that match our criterias will be stored here with their data
            $db_result = array();
            $i = -1; //pictures index

            //Loop through all images we fetch
            foreach ($result['photos']['photo'] as $photo)
            {
                $isAnImageWeCanUse = false;
                $id                = $photo['id'];
                $sizes             = $this->flickrGet('photos.getSizes', array('photo_id' => $id));
                $i++;

                //Does the images exists in a highresolution?
                foreach ($sizes['sizes']['size'] as $key => $image)
                {

                    if($image['width']  > $minResolution[0] AND 
                       $image['height'] > $minResolution[1])
                    {
                        //Saves the biggest width + height.
                        $pictures[$i]['width']  = $image['width'];
                        $pictures[$i]['height'] = $image['height'];

                        $isAnImageWeCanUse = TRUE;
                    }
                }

                //canWeUse? AND 'Has we not fetched this image before?'
                if($isAnImageWeCanUse AND \Model_Image::find()->where('orginal_id', $id)->count() === 0) //Note: This method is faster than getting the whole image and calculate the checksum and first then check against every checksum in the database. But: This method dosen't finds duplicates. Bets solutions is probably to create an new task that runs every day that removes duplicates.
                {
                    $newFilename = $id .'.'. pathinfo($image['source'], PATHINFO_EXTENSION);

                    $info = $this->flickrGet('photos.getInfo', array('photo_id' => $id));
                    $info = $info['photo'];

                    $pictures[$i]['orginal_id']      = $id;
                    $pictures[$i]['title']           = $photo['title'];
                    $pictures[$i]['desc']            = $info['description']['_content'];
                    $pictures[$i]['license']         = $info['license'];
                    $pictures[$i]['author_username'] = $info['owner']['username'];
                    $pictures[$i]['author_realname'] = $info['owner']['realname'];
                    //$pictures[$i]['author_link']     = 'http://www.flickr.com/photos/'. $info['owner']['nsid'];
                    $pictures[$i]['orginal_url']     = 'http://www.flickr.com/photos/'. $info['owner']['nsid'] .'/'. $id;
                    $pictures[$i]['url']             = $this->wallpaperLocationRelative . $newFilename; //(Url at _our_ server)


                    //TODO: Process the image and save it (resize)


                    //Does the directory exists? Not? Create it!
                    if(!is_dir($this->wallpaperLocationFull)) {
                        if(!mkdir($this->wallpaperLocationFull)) {
                            throw new Exception("Can't create '". $this->wallpaperLocationFull ."'.");
                        }
                    }

                    //Save it!
                    $this->downloadImageAndSave($image['source'], $newFilename);
                    $db_result[] = \Model_Image::forge($pictures[$i])->save();

                }
            }

            print_r($pictures);
            print_r($db_result);
        }
        catch (FlickrException $e) {
            echo PHP_EOL . \CLI::color("Error!\n", 'red');

            echo 'Message:    '. $e->getMessage() . PHP_EOL .
                 'Error code: '. $e->getCode();
        }
        catch (Exception $e) {
            echo PHP_EOL . \CLI::color("Error!\n", 'red');

            echo 'Message:    '. $e->getMessage() . PHP_EOL .
                 'Error code: '. $e->getCode();
        }

        return true;
    }



    /**
     * Downloads an image
     *
     * @todo Return true/false if succeded
     */
    private function downloadImageAndSave($imageUrl, $newFilename)
    {
        //Took from @link http://stackoverflow.com/a/724449/996028
        $ch = curl_init($imageUrl);
        $fp = fopen($this->wallpaperLocationFull . $newFilename, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }



    /**
     * Helper function to use flickrs API
     *
     * $this->apiKey need to be set, else this will not work.
     *
     * @example `$this->flickrGet('photos.search', array('tags' => 'bokeh'))`
     * @throws FlickrException
     */
    private function flickrGet($method, $args = array())
    {
        //Prepare
        $args += array('api_key' => $this->apiKey,
                       'method'  => 'flickr.'. $method,
                       'format'  => 'php_serial');

        $encoded_args = array();

        foreach ($args as $k => $v) {
            $encoded_args[] = urlencode($k) .'='. urlencode($v);
        }
        
        
        //Call API
        $url  = "http://api.flickr.com/services/rest/?". implode('&', $encoded_args);
        $resp = unserialize(file_get_contents($url));

        //Return the result / error
        if($resp['stat'] == "ok") {
            return $resp;
        }
        else {
            throw new FlickrException($resp['message'], $resp['code']);
        }
    }

}

?>