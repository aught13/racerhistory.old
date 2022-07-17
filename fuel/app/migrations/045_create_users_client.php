<?php

namespace Fuel\Migrations;

class Create_users_client
{
	public function up()
	{
		\DBUtil::create_table('users_client', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 32),
			'client_id' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 32),
			'client_secret' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 32),
			'redirect_uri' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 255),
			'auto_approve' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'autonomous' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'status' => array('default' => 'development', 'type' => 'enum', 'null' => false, 'constraint' => '"development","pending","approved","rejected"'),
			'suspended' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'notes' => array('type' => 'tinytext', 'null' => false, 'constraint' => 255),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX client_id ON users_client(`client_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX client_id ON users_client')->execute();

		\DBUtil::drop_table('users_client');
	}
}