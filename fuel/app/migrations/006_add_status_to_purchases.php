<?php

namespace Fuel\Migrations;

class Add_status_to_purchases
{
	public function up()
	{
		\DBUtil::add_fields('purchases', array(
			'status' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('purchases', array(
			'status'

		));
	}
}