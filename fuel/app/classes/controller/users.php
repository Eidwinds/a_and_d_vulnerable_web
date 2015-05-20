<?php

class Controller_Users extends Controller_Base
{
	public function before()
	{
		parent::before();
		$this->template->is_signin = false;

		// logout
		if((int)Input::post("logout", 0) === 1 && Security::check_token())
		{
			Cookie::delete("ad_user");
			Response::redirect('signin');
		}

		$this->user = Model_User::find("first", [
			"where" => [
				["login_hash", Cookie::get("ad_user")],
				["deleted_at", 0]
			]
		]);

		// check login
		if($this->user !== null)
		{
			$this->template->user = $this->user;
			$this->template->is_signin = true;
		}
	}

	public function action_index()
	{
		$this->data["topics"] = Model_Topic::find("all", [
			"where" => [
				["deleted_at", 0],
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => 5
		]);

		$this->data["items"] = Model_Item::find("all", [
			"where" => [
				["deleted_at", 0],
				["is_public", 1],
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => 5
		]);


		$this->template->title = 'トップページ';
		$this->template->content = View::forge('index', $this->data);
	}

	public function action_role()
	{
		$this->template->title = '利用規約';
		$this->template->content = View::forge('role', $this->data);
	}

	public function action_policy()
	{
		$this->template->title = 'プライバシーポリシー';
		$this->template->content = View::forge('policy', $this->data);
	}
	public function action_company()
	{
		$this->template->title = '会社概要';
		$this->template->content = View::forge('company', $this->data);
	}

	public function action_404()
	{
		$this->template->title = 'ページが見つかりません';
		$this->template->content = View::forge('404', $this->data);
	}
}
