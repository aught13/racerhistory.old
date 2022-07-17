<?php

namespace Fuel\Migrations;

class Create_users_user_role
{
	public function up()
	{
		\DBUtil::create_table('users_user_role', array(
			'user_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'role_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
		), array('user_id', 'role_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_user_role');
	}
}