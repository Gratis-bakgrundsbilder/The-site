<?php

class Model_Image_View extends \Orm\Model
{

    protected static $_table_name = 'image_views';

    protected static $_properties = array (
		'image_id' => 
		array (
			'data_type' => 'int',
			'label' => 'Image id',
			'null' => false,
			'validation' => 
			array (
				0 => 'required',
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