<?php

class Model_Users_Group extends \Orm\Model
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
		"user_id" => [
			"label" => "User id",
			"data_type" => "int",
			"default" => "0",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_group';

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
