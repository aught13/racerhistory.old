<?php

class Model_Users_Client extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"name" => [
			"label" => "Name",
			"data_type" => "varchar",
			"default" => "",
		],
		"client_id" => [
			"label" => "Client id",
			"data_type" => "varchar",
			"default" => "",
		],
		"client_secret" => [
			"label" => "Client secret",
			"data_type" => "varchar",
			"default" => "",
		],
		"redirect_uri" => [
			"label" => "Redirect uri",
			"data_type" => "varchar",
			"default" => "",
		],
		"auto_approve" => [
			"label" => "Auto approve",
			"data_type" => "tinyint",
			"default" => "0",
		],
		"autonomous" => [
			"label" => "Autonomous",
			"data_type" => "tinyint",
			"default" => "0",
		],
		"status" => [
			"label" => "Status",
			"data_type" => "enum",
			"default" => "development",
			"options" => ["development","pending","approved","rejected"],
		],
		"suspended" => [
			"label" => "Suspended",
			"data_type" => "tinyint",
			"default" => "0",
		],
		"notes" => [
			"label" => "Notes",
			"data_type" => "tinytext",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_client';

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
