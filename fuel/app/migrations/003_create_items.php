<?php

namespace Fuel\Migrations;

class Create_items
{
	public function up()
	{
		\DBUtil::create_table('items', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'img_path' => array('constraint' => 255, 'type' => 'varchar'),
			'detail' => array('type' => 'text'),
			'price' => array('constraint' => 11, 'type' => 'int'),
			'stock' => array('constraint' => 11, 'type' => 'int'),
			'is_public' => array('constraint' => 1, 'type' => 'tinyint', 'default' => '0'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('items');
	}
}