<?php

namespace Fuel\Migrations;

class Create_users_role_permissions
{
	public function up()
	{
		\DBUtil::create_table('users_role_permissions', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'role_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'perms_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'actions' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_role_permissions');
	}
}