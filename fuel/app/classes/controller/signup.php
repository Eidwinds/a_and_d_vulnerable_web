<?php

class Controller_Signup extends Controller_Users
{

	public function action_index()
	{
		$this->data["errors"] = [];

		$this->data["prefectures"] = Config::get("prefectures.names");

		if(Input::post("email", null) !== null && Security::check_token())
		{
			if(!Model_User::checkEmail(Input::post("email", null)))
			{
				$this->data["errors"]["email"] = 1;
			}

			if(count($this->data["errors"]) == 0)
			{
				$user = Model_User::forge();
				$user->email = Input::post("email", null);
				$user->password = md5(Input::post("password", null));
				$user->group_id = 1;
				$user->name = Input::post("name", null);
				$user->kana = Input::post("kana", null);
				$user->prefecture_id = (int)Input::post("prefecture_id", 0);
				$user->address = Input::post("address", null);
				$user->zip_code = Input::post("zip_code", null);
				$user->tel = Input::post("tel", null);
				$user->save();

				Response::redirect("/signin");
			}
		}

		$this->data = array_merge($this->data, Input::post());

		$this->template->title = 'ユーザ登録';
		$this->template->content = View::forge('signup', $this->data);
	}
}
