<?php

namespace Fuel\Migrations;

class Create_opponent
{
	public function up()
	{
		\DBUtil::create_table('opponent', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'opponent_name' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'opponent_mascot' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'opponent_current' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('opponent');
	}
}