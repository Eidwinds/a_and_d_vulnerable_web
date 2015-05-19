<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'email',
		'password',
		'last_login' => [
			"default" => 0
		],
		'login_hash'=> [
			"default" => ""
		],
		'deleted_at'=> [
			"default" => 0
		],
		'group_id'=> [
			"default" => 0
		],
		'name'=> [
			"default" => ""
		],
		'kana'=> [
			"default" => ""
		],
		'tel'=> [
			"default" => ""
		],
		'zip_code' => [
			"default" => ""
		],
		'prefecture_id'=> [
			"default" => 0
		],
		'address'=> [
			"default" => ""
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

	protected static $_table_name = 'users';

}
