<?php

class Model_Users_Provider extends \Orm\Model
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
		"provider" => [
			"label" => "Provider",
			"data_type" => "varchar",
		],
		"uid" => [
			"label" => "Uid",
			"data_type" => "varchar",
		],
		"secret" => [
			"label" => "Secret",
			"data_type" => "varchar",
		],
		"access_token" => [
			"label" => "Access token",
			"data_type" => "varchar",
		],
		"expires" => [
			"label" => "Expires",
			"data_type" => "int",
			"default" => "0",
		],
		"refresh_token" => [
			"label" => "Refresh token",
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

	protected static $_table_name = 'users_provider';

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
