<?php

class Controller_Admin_Users extends Controller_Admin
{

	public function action_index()
	{
		$count = Model_User::count([
			"where" => [
				["deleted_at", 0]
			]
		]);

		$config= [
			'pagination_url'=>"",
			'uri_segment'=>"p",
			'num_links'=>9,
			'per_page'=>20,
			'total_items'=>$count,
		];

		$this->data["pager"] = Pagination::forge('mypagination', $config);

		$this->data["users"] = Model_User::find("all", [
			"where" => [
				["deleted_at", 0]
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = 'ユーザ';
		$this->template->content = View::forge('admin/users/index', $this->data);
	}

	public function action_create()
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
				$user->group_id = (int)Input::post("group_id", 0);
				$user->name = Input::post("name", null);
				$user->kana = Input::post("kana", null);
				$user->prefecture_id = (int)Input::post("prefecture_id", 0);
				$user->tel = Input::post("tel", null);
				$user->address = Input::post("address", null);
				$user->zip_code = Input::post("zip_code", null);
				$user->save();

				Response::redirect("admin/users");
			}
		}

		$this->data = array_merge($this->data, Input::post());

		$this->template->title = 'ユーザ作成';
		$this->template->content = View::forge('admin/users/form', $this->data);
	}

	public function action_update($id = 0)
	{
		$this->data["errors"] = [];

		$this->data["prefectures"] = Config::get("prefectures.names");

		$user = Model_User::find($id, [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($user == null)
		{
			Response::redirect("admin/users");
		}

		if(Input::post("email", null) !== null && Security::check_token())
		{

			if(!Model_User::checkEmail(Input::post("email", null)) && $user->email != Input::post("email", null))
			{
				$this->data["errors"]["email"] = 1;
			}

			if(count($this->data["errors"]) == 0)
			{
				$user->email = Input::post("email", null);
				if(Input::post("password", null) != null) $user->password = md5(Input::post("password", null));
				$user->group_id = (int)Input::post("group_id", 0);
				$user->name = Input::post("name", null);
				$user->kana = Input::post("kana", null);
				$user->prefecture_id = (int)Input::post("prefecture_id", 0);
				$user->tel = Input::post("tel", null);
				$user->address = Input::post("address", null);
				$user->zip_code = Input::post("zip_code", null);
				$user->save();

				Response::redirect("admin/users");
			}
		}

		$this->data["email"] = $user["email"];
		$this->data["group_id"] = $user["group_id"];
		$this->data["name"] = $user["name"];
		$this->data["kana"] = $user["kana"];
		$this->data["tel"] = $user["tel"];
		$this->data["prefecture_id"] = $user["prefecture_id"];
		$this->data["address"] = $user["address"];
		$this->data["zip_code"] = $user["zip_code"];

		$this->template->title = 'ユーザ更新';
		$this->template->content = View::forge('admin/users/form', $this->data);
	}
}
