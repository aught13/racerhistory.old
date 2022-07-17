<?php

namespace Fuel\Migrations;

class Create_game_info
{
	public function up()
	{
		\DBUtil::create_table('game_info', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'info_key' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'info_value' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		), array('id'));

		\DB::query('CREATE INDEX game_id ON game_info(`game_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX game_id ON game_info')->execute();

		\DBUtil::drop_table('game_info');
	}
}