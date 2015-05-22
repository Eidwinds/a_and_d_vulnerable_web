<?php

class Controller_Admin_Signin extends Controller_Base
{
	public function before()
	{
		parent::before();
		$this->template = View::forge("admin/template");
		$this->template->is_signin = false;

		// check login
		if(Input::post("email", null) != null)
		{
			$email = Input::post("email", null);
			$password = md5(Input::post("password", null));

			$user = Model_User::find("first",[
				"where" => [
					["email", $email],
					["password", $password]
				]
			]);

			if($user == null)
			{
				Response::redirect('/admin/signin?error=1');
			}
			else
			{
				if($user->group_id != 100)
				{
					Response::redirect('/admin/signin?error=1');
				}
				$user->login_hash = sha1($email.time());
				$user->last_login = time();
				$user->save();

				Cookie::set("ad", $user->login_hash);

				Response::redirect('/admin/');
			}
		}
	}

	public function action_index()
	{
		$this->template->title = 'Admin';
		$this->template->content = View::forge('admin/signin');
	}
}
