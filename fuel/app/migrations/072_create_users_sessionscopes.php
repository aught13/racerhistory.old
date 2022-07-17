<?php

namespace Fuel\Migrations;

class Create_users_sessionscopes
{
	public function up()
	{
		\DBUtil::create_table('users_sessionscopes', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'session_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'access_token' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 50),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE INDEX session_id ON users_sessionscopes(`session_id`)')->execute();
		\DB::query('CREATE INDEX access_token ON users_sessionscopes(`access_token`)')->execute();
		\DB::query('CREATE INDEX scope ON users_sessionscopes(`scope`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX session_id ON users_sessionscopes')->execute();
		\DB::query('DROP INDEX access_token ON users_sessionscopes')->execute();
		\DB::query('DROP INDEX scope ON users_sessionscopes')->execute();

		\DBUtil::drop_table('users_sessionscopes');
	}
}