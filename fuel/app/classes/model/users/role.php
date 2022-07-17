<?php

class Model_Users_Role extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"name" => [
			"label" => "Name",
			"data_type" => "varchar",
		],
		"filter" => [
			"label" => "Filter",
			"data_type" => "enum",
			"default" => "",
			"options" => ["","A","D","R"],
		],
		"user_id" => [
			"label" => "User id",
			"data_type" => "int",
			"default" => "0",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_role';

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
