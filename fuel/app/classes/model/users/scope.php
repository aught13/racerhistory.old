<?php

class Model_Users_Scope extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"scope" => [
			"label" => "Scope",
			"data_type" => "varchar",
			"default" => "",
		],
		"name" => [
			"label" => "Name",
			"data_type" => "varchar",
			"default" => "",
		],
		"description" => [
			"label" => "Description",
			"data_type" => "varchar",
			"default" => "",
		],
	];

	protected static $_observers = [
	];

	protected static $_table_name = 'users_scope';

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
