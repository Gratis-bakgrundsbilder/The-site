<?php

/**
* View-model for index
*
* This file automatic loads the app/view/template/index
*/
class View_template_index extends ViewModel
{
    
    function view()
    {

        //-------------------------------------------------
        // Variables
        //-------------------------------------------------

        $name   = 'gungor';
        $name2  = 'bridge';
        $imgUrl = Uri::base(0) . 'assets/img/';

        View::set_global('baseUrl', Uri::base(0));

        View::set_global('testImg',  $imgUrl . 'test-wallpapers/thumb/1980x1080/'. $name .'.jpg');
        View::set_global('testImg2', $imgUrl . 'test-wallpapers/thumb/1024x638/'.  $name2 .'.jpg');

        View::set_global('testImgLink',  $this->baseUrl . 'image/' . 0 . '/'. $name);
        View::set_global('testImgLink2', $this->baseUrl . 'image/' . 1 . '/'. $name2);



        //-------------------------------------------------
        // The layout
        //-------------------------------------------------

        $this->header    = View::forge('header');
        $this->search    = View::forge('search');
        $this->imageList = View::forge('image/list');
        $this->footer    = View::forge('footer');
    }
}

?>