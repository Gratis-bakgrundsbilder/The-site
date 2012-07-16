<?php

class Model_Crawler_Log extends \Orm\Model
{

    protected static $_table_name = 'crawler_log';

    protected static $_properties = array (
		'date' => 
		array (
			'data_type' => 'string',
			'label' => 'Date',
			'null' => false,
			'default' => 'CURRENT_TIMESTAMP',
			'validation' => 
			array (
				0 => 'required',
			),
			'form' => 
			array (
				'type' => 'text',
				'value' => 'CURRENT_TIMESTAMP',
			),
		),
		'start_time' => 
		array (
			'data_type' => 'string',
			'label' => 'Start time',
			'null' => true,
			'validation' => 
			array (
			),
			'form' => 
			array (
				'type' => 'text',
			),
		),
		'ending_time' => 
		array (
			'data_type' => 'string',
			'label' => 'Ending time',
			'null' => true,
			'validation' => 
			array (
			),
			'form' => 
			array (
				'type' => 'text',
			),
		),
		'images_fetched' => 
		array (
			'data_type' => 'smallint',
			'label' => 'Images fetched',
			'null' => true,
			'validation' => 
			array (
				'numeric_min' => 
				array (
					0 => 0,
				),
				'numeric_max' => 
				array (
					0 => 65535,
				),
			),
			'form' => 
			array (
				'type' => 'number',
				'min' => 0,
				'max' => 65535,
			),
		),
		'limit' => 
		array (
			'data_type' => 'smallint',
			'label' => 'Limit',
			'null' => true,
			'validation' => 
			array (
				'numeric_min' => 
				array (
					0 => 0,
				),
				'numeric_max' => 
				array (
					0 => 65535,
				),
			),
			'form' => 
			array (
				'type' => 'number',
				'min' => 0,
				'max' => 65535,
			),
		),
		'tags' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Tags',
			'null' => true,
			'validation' => 
			array (
				'max_length' => 
				array (
					0 => 255,
				),
			),
			'form' => 
			array (
				'type' => 'text',
				'maxlength' => 255,
			),
		),
		'searchText' => 
		array (
			'data_type' => 'varchar',
			'label' => 'SearchText',
			'null' => true,
			'validation' => 
			array (
				'max_length' => 
				array (
					0 => 255,
				),
			),
			'form' => 
			array (
				'type' => 'text',
				'maxlength' => 255,
			),
		),
		'license' => 
		array (
			'data_type' => 'tinyint',
			'label' => 'License',
			'null' => true,
			'validation' => 
			array (
				'numeric_min' => 
				array (
					0 => -128,
				),
				'numeric_max' => 
				array (
					0 => 127,
				),
			),
			'form' => 
			array (
				'type' => 'number',
				'min' => -128,
				'max' => 127,
			),
		),
		'minResolution' => 
		array (
			'data_type' => 'smallint',
			'label' => 'MinResolution',
			'null' => true,
			'validation' => 
			array (
				'numeric_min' => 
				array (
					0 => 0,
				),
				'numeric_max' => 
				array (
					0 => 65535,
				),
			),
			'form' => 
			array (
				'type' => 'number',
				'min' => 0,
				'max' => 65535,
			),
		),
		'startPage' => 
		array (
			'data_type' => 'int',
			'label' => 'StartPage',
			'null' => true,
			'validation' => 
			array (
				'numeric_min' => 
				array (
					0 => 0,
				),
				'numeric_max' => 
				array (
					0 => 2147483647,
				),
			),
			'form' => 
			array (
				'type' => 'number',
				'min' => 0,
				'max' => 2147483647,
			),
		),
	);

    protected static $_observers = array(
        'Orm\Observer_Validation' => array(
            'events' => array('before_save'),
        ),
        'Orm\Observer_Typing' => array(
            'events' => array('before_save', 'after_save', 'after_load'),
        ),
    );

}