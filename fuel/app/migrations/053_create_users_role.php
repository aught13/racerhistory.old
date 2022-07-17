<?php

namespace Fuel\Migrations;

class Create_users_role
{
	public function up()
	{
		\DBUtil::create_table('users_role', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'filter' => array('default' => '', 'type' => 'enum', 'null' => false, 'constraint' => '"","A","D","R"'),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_role');
	}
}