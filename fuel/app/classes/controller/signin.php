<?php

class Controller_Signin extends Controller_Users
{
	public function before()
	{
		parent::before();

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
				Response::redirect('/signin?error=1');
			}
			else
			{
				$user->login_hash = sha1($user->id);
				$user->last_login = time();
				$user->save();

				Cookie::set("ad_user", $user->login_hash);

				Response::redirect('/');
			}
		}
	}

	public function action_index()
	{
		$this->template->title = __('signin');
		$this->template->content = View::forge('signin');
	}
}
