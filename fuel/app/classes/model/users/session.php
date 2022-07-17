<?php

class Model_Users_Session extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"client_id" => [
			"label" => "Client id",
			"data_type" => "varchar",
			"default" => "",
		],
		"redirect_uri" => [
			"label" => "Redirect uri",
			"data_type" => "varchar",
			"default" => "",
		],
		"type_id" => [
			"label" => "Type id",
			"data_type" => "varchar",
		],
		"type" => [
			"label" => "Type",
			"data_type" => "enum",
			"default" => "user",
			"options" => ["user","auto"],
		],
		"code" => [
			"label" => "Code",
			"data_type" => "text",
		],
		"access_token" => [
			"label" => "Access token",
			"data_type" => "varchar",
			"default" => "",
		],
		"stage" => [
			"label" => "Stage",
			"data_type" => "enum",
			"default" => "request",
			"options" => ["request","granted"],
		],
		"first_requested" => [
			"label" => "First requested",
			"data_type" => "int",
		],
		"last_updated" => [
			"label" => "Last updated",
			"data_type" => "int",
		],
		"limited_access" => [
			"label" => "Limited access",
			"data_type" => "tinyint",
			"default" => "0",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_session';

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
