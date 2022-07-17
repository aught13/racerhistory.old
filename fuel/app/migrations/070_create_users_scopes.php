<?php

namespace Fuel\Migrations;

class Create_users_scopes
{
	public function up()
	{
		\DBUtil::create_table('users_scopes', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'name' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'description' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 255),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX scope ON users_scopes(`scope`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX scope ON users_scopes')->execute();

		\DBUtil::drop_table('users_scopes');
	}
}