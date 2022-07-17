<?php

namespace Fuel\Migrations;

class Create_users_scope
{
	public function up()
	{
		\DBUtil::create_table('users_scope', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'name' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'description' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 255),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX scope ON users_scope(`scope`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX scope ON users_scope')->execute();

		\DBUtil::drop_table('users_scope');
	}
}