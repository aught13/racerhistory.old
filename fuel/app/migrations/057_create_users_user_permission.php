<?php

namespace Fuel\Migrations;

class Create_users_user_permission
{
	public function up()
	{
		\DBUtil::create_table('users_user_permission', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'user_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'perms_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'actions' => array('type' => 'text', 'null' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_user_permission');
	}
}