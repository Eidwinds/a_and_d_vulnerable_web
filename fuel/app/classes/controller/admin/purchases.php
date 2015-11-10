<?php

class Controller_Admin_Purchases extends Controller_Admin
{

	public function action_index()
	{
		$count = Model_Purchase::count([
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
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = __("history");
		$this->template->content = View::forge('admin/purchases/index', $this->data);
	}
}
