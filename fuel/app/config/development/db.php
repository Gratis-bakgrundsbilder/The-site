<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
        //MySQL and MySQLi connections
        /*
		'connection'  => array(
            'hostname'   => 'localhost',
            'port'       => '3306',
            'database'   => 'gratis-bakgrundsbilder',
			'username'   => 'root',
			'password'   => '',
		),*/

        //PDO connections
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=gratis-bakgrundsbilder',
            'username'   => 'root',
            'password'   => '',
        ),
	),
);
