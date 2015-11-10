<?php

class Controller_Admin_Items extends Controller_Admin
{

	public function action_index()
	{
		$count = Model_Item::count([
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

		$this->data["items"] = Model_Item::find("all", [
			"where" => [
				["deleted_at", 0]
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = __("items");
		$this->template->content = View::forge('admin/items/index', $this->data);
	}

	public function action_create()
	{
		if(Input::post("name", null) !== null && Security::check_token())
		{
			$item = Model_Item::forge();
			$item->name = Input::post("name", null);
			$item->stock = (int)Input::post("stock", null);
			$item->price = (int)Input::post("price", null);
			$item->detail = Input::post("detail", null);
			$item->is_public = (int)Input::post("is_public", null);
			$item->save();

			$config = [
				"path" => DOCROOT."assets/img/upload/",
				'randomize' => false,
				'auto_rename'    => false,
			];
			Upload::process($config);

			if (Upload::is_valid())
			{
				Upload::save();
				$saved_result = Upload::get_files();
				$file_name = $saved_result[0]['saved_as'];
				$item->img_path = $file_name;
			}

			$item->save();

			Response::redirect("admin/items");

		}

		$this->data = array_merge($this->data, Input::post());

		$this->template->title = __("create");
		$this->template->content = View::forge('admin/items/form', $this->data);
	}

	public function action_update($id = 0)
	{
		$item = Model_Item::find($id, [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($item == null)
		{
			Response::redirect("admin/items");
		}

		if(Input::post("name", null) !== null && Security::check_token())
		{
			$item->name = Input::post("name", null);
			$item->stock = (int)Input::post("stock", null);
			$item->price = (int)Input::post("price", null);
			$item->detail = Input::post("detail", null);
			$item->is_public = (int)Input::post("is_public", null);
			$item->save();

			$config = [
				"path" => DOCROOT."assets/img/upload/",
				'randomize' => false,
				'auto_rename'    => false,
			];
			Upload::process($config);

			if (Upload::is_valid())
			{
				Upload::save();
				$saved_result = Upload::get_files();
				$file_name = $saved_result[0]['saved_as'];
				$item->img_path = $file_name;
			}

			$item->save();

			Response::redirect("admin/items");

		}

		$this->data["name"] = $item["name"];
		$this->data["stock"] = $item["stock"];
		$this->data["price"] = $item["price"];
		$this->data["detail"] = $item["detail"];
		$this->data["is_public"] = $item["is_public"];
		$this->data["img_path"] = $item["img_path"];

		$this->template->title = __("edit");
		$this->template->content = View::forge('admin/items/form', $this->data);
	}
}
