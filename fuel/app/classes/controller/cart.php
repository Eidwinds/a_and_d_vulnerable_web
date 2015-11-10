<?php

class Controller_Cart extends Controller_Users
{

	public function action_index()
	{
		$items = explode(",", Cookie::get("cart"));
		$cart = "AND (";

		foreach($items as $item)
		{
			if($item != "")
			{
				if($cart != "AND (")
				{
					$cart .= " OR";
				}
				$cart .= " id = $item";
			}
		}

		$cart .= ")";

		if($cart == "AND ()")
		{
			$this->data["items"] = [];
		}
		else
		{
			$sql = "SELECT * FROM items WHERE deleted_at = 0 AND is_public = 1 $cart ORDER BY id DESC";
			$this->data["items"] = DB::query($sql)->execute()->as_Array();
		}

		$this->data["user"] = $this->user;

		$this->template->title = __('cart');
		$this->template->content = View::forge('carts/index', $this->data);
	}

	public function action_confirm()
	{

		$items = explode(",", Cookie::get("cart"));
		$cart = "AND (";

		foreach($items as $item)
		{
			if($item != "")
			{
				if($cart != "AND (")
				{
					$cart .= " OR";
				}
				$cart .= " id = $item";
			}
		}

		$cart .= ")";

		if($cart == "AND ()")
		{
			Response::redirect(404);
		}
		else
		{
			$sql = "SELECT * FROM items WHERE deleted_at = 0 AND is_public = 1 $cart ORDER BY id DESC";
			$this->data["items"] = DB::query($sql)->execute()->as_Array();
		}

		$this->data["user"] = $this->user;

		$this->template->title = __("confirm");
		$this->template->content = View::forge('carts/confirm', $this->data);
	}

	public function action_sent()
	{

		$items = explode(",", Cookie::get("cart"));
		$cart = "AND (";

		DB::start_transaction();
		foreach($items as $val)
		{
			$item = Model_Item::find($val,[
				"where" => [
					["deleted_at", 0],
					["is_public", 1],
				]
			]);

			if($item != null)
			{

				$item->stock = $item->stock - 1;
				$item->save();

				if($item->stock <= 0)
				{
					DB::rollback_transaction();
				}
				$purchases = Model_Purchase::forge();
				$purchases->user_id = $this->user->id;
				$purchases->item_id = $item["id"];
				$purchases->number = 1;
				$purchases->save();

			}
		}
		DB::commit_transaction();

		Cookie::set("cart", "");

		$this->data["user"] = $this->user;

		$this->template->title = __("complete");
		$this->template->content = View::forge('carts/sent', $this->data);
	}
}
