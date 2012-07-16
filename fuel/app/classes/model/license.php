<?php

class Model_License extends \Orm\Model
{

    protected static $_table_name = 'licenses';

    protected static $_properties = array (
		'id' => 
		array (
			'data_type' => 'tinyint',
			'label' => 'Id',
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
					0 => 255,
				),
			),
			'form' => 
			array (
				'type' => false,
			),
		),
		'license' => 
		array (
			'data_type' => 'varchar',
			'label' => 'License',
			'null' => true,
			'validation' => 
			array (
				'max_length' => 
				array (
					0 => 44,
				),
			),
			'form' => 
			array (
				'type' => 'text',
				'maxlength' => 44,
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