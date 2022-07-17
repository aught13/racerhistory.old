<?php

namespace Fuel\Migrations;

class Create_user
{
	public function up()
	{
		\DBUtil::create_table('user', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'username' => array('type' => 'varchar', 'null' => false, 'constraint' => 50),
			'password' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'group_id' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'email' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'last_login' => array('type' => 'varchar', 'null' => false, 'constraint' => 25),
			'previous_login' => array('default' => '0', 'type' => 'varchar', 'null' => false, 'constraint' => 25),
			'login_hash' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX username ON user(`username`, `email`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX username ON user')->execute();

		\DBUtil::drop_table('user');
	}
}