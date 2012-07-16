<?php

class Model_Image extends \Orm\Model
{

    protected static $_table_name = 'images';

    protected static $_properties = array (
		'id' => 
		array (
			'data_type' => 'int',
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
					0 => 2147483647,
				),
			),
			'form' => 
			array (
				'type' => false,
			),
		),
		'orginal_id' => 
		array (
			'data_type' => 'int',
			'label' => 'Orginal id',
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
		'url' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Url',
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
		'orginal_url' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Orginal url',
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
		'title' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Title',
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
		'desc' => 
		array (
			'data_type' => 'mediumtext',
			'label' => 'Desc',
			'null' => true,
			'validation' => 
			array (
				'max_length' => 
				array (
					0 => 16777215,
				),
			),
			'form' => 
			array (
				'type' => 'textarea',
			),
		),
		'author_username' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Author username',
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
		'author_realname' => 
		array (
			'data_type' => 'varchar',
			'label' => 'Author realname',
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
		'licens' => 
		array (
			'data_type' => 'tinyint',
			'label' => 'Licens',
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
		'width' => 
		array (
			'data_type' => 'smallint',
			'label' => 'Width',
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
		'height' => 
		array (
			'data_type' => 'smallint',
			'label' => 'Height',
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
		'chechksum' => 
		array (
			'data_type' => 'string',
			'label' => 'Chechksum',
			'null' => true,
			'validation' => 
			array (
			),
			'form' => 
			array (
				'type' => 'text',
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