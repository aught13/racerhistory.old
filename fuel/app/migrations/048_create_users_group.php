<?php

namespace Fuel\Migrations;

class Create_users_group
{
	public function up()
	{
		\DBUtil::create_table('users_group', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_group');
	}
}