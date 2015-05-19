<?php

class Controller_Admin_Api extends Controller_Rest
{

	public function before()
	{
		parent::before();
	}

	public function post_deletetopic()
	{

		$topic = Model_Topic::find((int)Input::post("id"), [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($topic == null)
		{
			$this->response->set_status(400);
		}
		else
		{
			$topic->safeDelete();
		}
	}

	public function post_deleteuser()
	{

		$user = Model_User::find((int)Input::post("id"), [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($user == null)
		{
			$this->response->set_status(400);
		}
		else
		{
			$user->safeDelete();
		}
	}
}