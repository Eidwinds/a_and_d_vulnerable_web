<?php

class Controller_Topics extends Controller_Users
{

	public function action_index()
	{

		$count = Model_Topic::count([
			"where" => [
				["deleted_at", 0],
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

		$this->data["topics"] = Model_Topic::find("all", [
			"where" => [
				["deleted_at", 0],
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = __('topics');
		$this->template->content = View::forge('topics/index', $this->data);
	}

	public function action_detail($id)
	{
		$this->data["topic"] = Model_Topic::find($id, [
			"where" => [
				["deleted_at", 0],
			],
		]);

		if($this->data["topic"] == null)
		{
			Response::redirect(404);
		}

		$this->template->title = $this->data["topic"]->title . ' (' . date(__("date_style"), $this->data["topic"]->created_at) . ")";
		$this->template->content = View::forge('topics/detail', $this->data);
	}
}
