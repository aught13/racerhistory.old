<?php

namespace Fuel\Migrations;

class Create_users_sessionscope
{
	public function up()
	{
		\DBUtil::create_table('users_sessionscope', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'session_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'access_token' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 50),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
		), array('id'));

		\DB::query('CREATE INDEX session_id ON users_sessionscope(`session_id`)')->execute();
		\DB::query('CREATE INDEX access_token ON users_sessionscope(`access_token`)')->execute();
		\DB::query('CREATE INDEX scope ON users_sessionscope(`scope`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX session_id ON users_sessionscope')->execute();
		\DB::query('DROP INDEX access_token ON users_sessionscope')->execute();
		\DB::query('DROP INDEX scope ON users_sessionscope')->execute();

		\DBUtil::drop_table('users_sessionscope');
	}
}