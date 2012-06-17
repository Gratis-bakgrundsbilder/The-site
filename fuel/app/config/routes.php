<?php
return array(
	'_root_'  => 'master/index',  // The default route
	'_404_'   => 'master/404',    // The main 404 route

    'image'            => 'master/index',
    'image/:id'        => 'master/showImage/$1',
    'image/:id/:any'   => 'master/showImage/$1',
);