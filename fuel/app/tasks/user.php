<?php

namespace Fuel\Tasks;

use Oil\Exception;

class User
{
	public static function createAdmin($email, $password)
	{
		$user = \Model_User::forge();
		$user->email = $email;
		$user->password = md5($password);
		$user->group_id = 100;
		$user->save();
	}
}