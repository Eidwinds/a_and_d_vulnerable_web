<?php

class Controller_Admin extends Controller_Base
{
	public function before()
	{
		parent::before();
		$this->template = View::forge("admin/template");
		$this->template->is_signin = false;

		// logout
		if((int)Input::post("logout", 0) === 1 && Security::check_token())
		{
			Cookie::delete("ad");
			Response::redirect('admin/signin');
		}

		$this->user = Model_User::find("first", [
			"where" => [
				["login_hash", Cookie::get("ad")],
				["deleted_at", 0],
				["group_id", 100]
			]
		]);

		// check login
		if($this->user !== null)
		{
			$this->template->is_signin = true;
		}
		else
		{
			Response::redirect('admin/signin');
		}
	}

	public function action_index()
	{
		$this->template->title = 'Admin';
		$this->template->content = View::forge('admin/index');
	}
}
