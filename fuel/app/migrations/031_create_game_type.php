<?php

namespace Fuel\Migrations;

class Create_game_type
{
	public function up()
	{
		\DBUtil::create_table('game_type', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_type_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'post' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'conf' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('game_type');
	}
}