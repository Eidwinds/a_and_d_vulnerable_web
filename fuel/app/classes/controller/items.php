<?php

class Controller_Items extends Controller_Users
{

	public function action_index()
	{

		$count = Model_Item::count([
			"where" => [
				["deleted_at", 0],
			]
		]);

		$config= [
			'pagination_url'=>"?search=".Input::Get("search"),
			'uri_segment'=>"p",
			'num_links'=>9,
			'per_page'=>20,
			'total_items'=>$count,
		];

		$this->data["pager"] = Pagination::forge('mypagination', $config);


		$search = "";
		if(Input::Get("search", "") != "")
		{
			$search = "AND name LIKE '%" . $_GET["search"] . "%' ";
		}


		$sql = "SELECT * FROM items WHERE deleted_at = 0 {$search} ORDER BY id DESC LIMIT {$this->data["pager"]->offset},{$this->data["pager"]->per_page}";
		$this->data["items"] = DB::query($sql)->execute()->as_Array();

		$this->template->title = '商品一覧';
		$this->template->content = View::forge('items/index', $this->data);
	}

	public function action_detail($id)
	{
		$this->data["item"] = Model_Item::find($id, [
			"where" => [
				["deleted_at", 0],
			],
		]);

		if($this->data["item"] == null)
		{
			Response::redirect(404);
		}

		$this->template->title = $this->data["item"]->name;
		$this->template->content = View::forge('items/detail', $this->data);
	}
}
