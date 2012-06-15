<?php

/**
* View-model for index
*
* This file automatic loads the app/view/index
*/
class View_index extends ViewModel
{
    
    function view()
    {
        $this->baseUrl = Uri::base(0);
        $this->imgUrl  = Uri::base(0) . 'assets/img';

       // $this->testImg = $this->imgUrl . '/test-wallpapers/thumb/1980x1080/gungor.jpg';
        $this->testImg  = $this->imgUrl . '/test-wallpapers/1980x1080/gungor.jpg';
        $this->testImg2 = $this->imgUrl . '/test-wallpapers/1024x638/bridge.jpg';
    }
}

?>