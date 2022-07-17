<?php

class Model_Users_Sessionscope extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"session_id" => [
			"label" => "Session id",
			"data_type" => "int",
		],
		"access_token" => [
			"label" => "Access token",
			"data_type" => "varchar",
			"default" => "",
		],
		"scope" => [
			"label" => "Scope",
			"data_type" => "varchar",
			"default" => "",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_sessionscope';

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
