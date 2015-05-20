<?php

class Model_Inquiry extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'email',
		'name',
		'title',
		'body',
		'deleted_at' => [
			"default" => 0
		],
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

	protected static $_table_name = 'inquiries';


	public function safeDelete()
	{
		$this->deleted_at = time();
		$this->save();
	}
}
