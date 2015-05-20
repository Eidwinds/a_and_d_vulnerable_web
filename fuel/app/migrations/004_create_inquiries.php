<?php

namespace Fuel\Migrations;

class Create_inquiries
{
	public function up()
	{
		\DBUtil::create_table('inquiries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'body' => array('type' => 'text'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'default' => '0'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('inquiries');
	}
}