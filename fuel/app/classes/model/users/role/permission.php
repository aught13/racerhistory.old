<?php

class Model_Users_Role_Permission extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"role_id" => [
			"label" => "Role id",
			"data_type" => "int",
		],
		"perms_id" => [
			"label" => "Perms id",
			"data_type" => "int",
		],
		"actions" => [
			"label" => "Actions",
			"data_type" => "text",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_role_permission';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
	];

}
