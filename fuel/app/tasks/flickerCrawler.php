<?php


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
class Crawler
{
    public function __construct()
    {
        # code...
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

}

?>