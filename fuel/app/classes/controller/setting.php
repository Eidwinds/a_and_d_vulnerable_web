<?php

class Controller_Setting extends Controller_Users
{

	public function action_index()
	{
		if($this->user == null)
		{
			Response::redirect(404);
		}

		$this->data["errors"] = [];

		$this->data["prefectures"] = Config::get("prefectures.names");

		if(Input::post("email", null) !== null && Security::check_token())
		{
			if(!Model_User::checkEmail(Input::post("email", null)) && Input::post("email", null) != $this->user->email)
			{
				$this->data["errors"]["email"] = 1;
			}

			if(count($this->data["errors"]) == 0)
			{
				$this->user->email = Input::post("email", null);
				if(Input::post("password", null) != null)$this->user->password = md5(Input::post("password", null));
				$this->user->name = Input::post("name", null);
				$this->user->kana = Input::post("kana", null);
				$this->user->prefecture_id = (int)Input::post("prefecture_id", 0);
				$this->user->address = Input::post("address", null);
				$this->user->zip_code = Input::post("zip_code", null);
				$this->user->tel = Input::post("tel", null);
				$this->user->save();
			}
		}

		$this->data["email"] = $this->user["email"];
		$this->data["name"] = $this->user["name"];
		$this->data["kana"] = $this->user["kana"];
		$this->data["prefecture_id"] = $this->user["prefecture_id"];
		$this->data["address"] = $this->user["address"];
		$this->data["zip_code"] = $this->user["zip_code"];
		$this->data["tel"] = $this->user["tel"];

		$this->template->title = __('account_setting');
		$this->template->content = View::forge('setting', $this->data);
	}
}
