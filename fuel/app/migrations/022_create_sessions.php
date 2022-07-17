<?php

namespace Fuel\Migrations;

class Create_sessions
{
	public function up()
	{
		\DBUtil::create_table('sessions', array(
			'session_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 40),
			'previous_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 40),
			'user_agent' => array('type' => 'text', 'null' => false),
			'ip_hash' => array('default' => '', 'type' => 'char', 'null' => false, 'constraint' => 32),
			'created' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 10, 'unsigned' => true),
			'updated' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 10, 'unsigned' => true),
			'payload' => array('type' => 'longtext', 'null' => false),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('session_id'));

		\DB::query('CREATE UNIQUE INDEX PREVIOUS ON sessions(`previous_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX PREVIOUS ON sessions')->execute();

		\DBUtil::drop_table('sessions');
	}
}