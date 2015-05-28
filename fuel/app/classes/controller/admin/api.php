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

	public function post_deleteitem()
	{

		$user = Model_Item::find((int)Input::post("id"), [
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

	public function post_changeitem(){

		$item = Model_Item::find((int)Input::post("id"), [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($item == null)
		{
			$this->response->set_status(400);
		}
		else
		{
			if($item->is_public == 1)
			{
				$item->is_public = 0;
			}
			else
			{
				$item->is_public = 1;
			}

			$item->save();
		}
	}

	public function post_deleteinquiry()
	{

		$inquiry = Model_Inquiry::find((int)Input::post("id"), [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($inquiry == null)
		{
			$this->response->set_status(400);
		}
		else
		{
			$inquiry->safeDelete();
		}
	}

	public function post_changepurchase()
	{

		$purchase = Model_Purchase::find((int)Input::post("id"), [
		]);

		if($purchase == null)
		{
			$this->response->set_status(400);
		}
		else
		{
			$purchase->status = Input::post("status", 0);
			$purchase->save();
		}
	}
}