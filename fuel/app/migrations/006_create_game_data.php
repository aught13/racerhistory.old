<?php

namespace Fuel\Migrations;

class Create_game_data
{
	public function up()
	{
		\DBUtil::create_table('game_data', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'data_key' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'data_value' => array('type' => 'mediumint', 'null' => true, 'constraint' => 8, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE INDEX game_id ON game_data(`game_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX game_id ON game_data')->execute();

		\DBUtil::drop_table('game_data');
	}
}