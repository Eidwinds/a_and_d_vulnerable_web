<?php

class Controller_Purchases extends Controller_Users
{

	public function action_index()
	{
		if($this->user == null)
		{
			Response::redirect(404);
		}

		$count = Model_Purchase::count([
			"where" => [
				["user_id", $this->user->id]
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

		$this->data["purchases"] = Model_Purchase::find("all", [
			"where" => [
				["user_id", $this->user->id]
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = '購入履歴';
		$this->template->content = View::forge('purchases/index', $this->data);
	}
}
