<?php
return array(
	'_root_'  => 'master/index',  // The default route
	'_404_'   => 'master/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    'image' => 'master/showImage',
    //'image/:id/:name' => array('master/showImage'),
);