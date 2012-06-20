<?php


namespace Fuel\Tasks;

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
class FlickerCrawler
{
    public function run()
    {
        echo "Hello world!\n";

        $config = \Fuel\Core\Config::load('flickrAPI');
        $apiKey = $config['key'];

        $this->flickrGet($apiKey, 'photos.search', array('tags' => 'bokeh'));
    }



    /**
     * Crawl
     *
     */
    public function crawl($limit         = 1000,
                          $searchText    = '',
                          $licens        = array('', 'NoDerivs', 'NonCommercial-NoDerivs', 'NonCommercial', 'NonCommercial-ShareAlike', 'ShareAlike'),
                          $minResolution = array(1280, 800),
                          $startPage     = null)
    {
        $startPage = (is_int($startPage)) ? $startPage : rand(); //$startPage = rand();



        return $this;
    }



    /**
     *
     */
    public function saveResults()
    {
        # code...
    }



    /**
     * Helper function to use flickrs API
     */
    private function flickrGet($apiKey, $method, $args = array())
    {
        //Prepare
        $args += array('api_key' => $apiKey,
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
            return false;
        }
    }

}

?>