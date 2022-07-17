<?php

class Model_Users_Permission extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"area" => [
			"label" => "Area",
			"data_type" => "varchar",
		],
		"permission" => [
			"label" => "Permission",
			"data_type" => "varchar",
		],
		"description" => [
			"label" => "Description",
			"data_type" => "varchar",
		],
		"actions" => [
			"label" => "Actions",
			"data_type" => "text",
		],
		"user_id" => [
			"label" => "User id",
			"data_type" => "int",
			"default" => "0",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_permission';

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
