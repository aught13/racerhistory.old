<?php

class Model_Users_Metadatum extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"parent_id" => [
			"label" => "Parent id",
			"data_type" => "int",
			"default" => "0",
		],
		"key" => [
			"label" => "Key",
			"data_type" => "varchar",
		],
		"value" => [
			"label" => "Value",
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

	protected static $_table_name = 'users_metadatum';

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
