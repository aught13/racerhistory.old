<?php

namespace Fuel\Migrations;

class Create_users_group_role
{
	public function up()
	{
		\DBUtil::create_table('users_group_role', array(
			'group_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'role_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
		), array('group_id', 'role_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_group_role');
	}
}