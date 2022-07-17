<?php

class Model_Users_User_Role extends \Orm\Model
{
	protected static $_properties = [
		"user_id" => [
			"label" => "User id",
			"data_type" => "int",
		],
		"role_id" => [
			"label" => "Role id",
			"data_type" => "int",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_user_role';

	protected static $_primary_key = ['user_id', 'role_id'];

	protected static $_has_many = [
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
	];

}
