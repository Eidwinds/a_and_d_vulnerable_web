<?php

class Model_Purchase extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'item_id',
		'number',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'user_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		),
		'item' => array(
			'model_to' => 'Model_Item',
			'key_from' => 'item_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		)
	);

	protected static $_table_name = 'purchases';

}
