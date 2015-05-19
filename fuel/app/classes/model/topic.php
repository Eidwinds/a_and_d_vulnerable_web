<?php

class Model_Topic extends \Orm\Model
{
	protected static $_properties = array(
		'id',
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

	protected static $_table_name = 'topics';

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_field('title', 'Title', 'required|max_length[100]');
		$val->add_field('body', 'Body', 'required');
		return $val;
	}

	public function safeDelete()
	{
		$this->deleted_at = time();
		$this->save();
	}

}
