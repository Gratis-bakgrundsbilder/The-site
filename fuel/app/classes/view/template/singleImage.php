<?php


/**
 * ...
 */
class View_template_singleImage extends ViewModel
{
    
    function view()
    {
        //-------------------------------------------------
        // Variables
        //-------------------------------------------------

        $name   = 'gungor';
        $imgUrl = Uri::base(0) . 'assets/img/';

        View::set_global('baseUrl', Uri::base(0));
        View::set_global('testImg', $imgUrl . 'test-wallpapers/1980x1080/'. $name .'.jpg');

        View::set_global(array('title'       => 'Remembering Warmer Days',
                               'desc'        => 'As I was avoiding the snow by cleaning out my lightroom library, I found a couple of photos of warmer days that I hadn\'t posted.',
                               'author'      => 'andrewsulliv',
                               'authorLink'  => 'http://www.flickr.com/photos/andrewsulliv/',
                               'source'      => 'http://www.flickr.com/photos/andrewsulliv/5296357219/'));

        //-------------------------------------------------
        // The layout
        //-------------------------------------------------

        $this->header      = View::forge('header');
        $this->singleImage = View::forge('image/single');
        $this->footer      = View::forge('footer');
    }
}

?>