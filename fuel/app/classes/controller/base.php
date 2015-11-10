<?php


class Controller_Base extends Controller_Template
{
	public $is_signin = false;
	public $user = null;
	public $data = [];

	public function before()
	{
		parent::before();
		$this->template->is_signin = false;


	}
}
