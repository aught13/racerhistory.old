<?php

namespace Fuel\Migrations;

class Create_game
{
	public function up()
	{
		\DBUtil::create_table('game', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'season' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'game_date' => array('type' => 'datetime', 'null' => true),
			'game_type_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'opponent_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'site_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'hrn' => array('type' => 'int', 'null' => false, 'constraint' => 1),
			'post' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'w' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'l' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'pts_mur' => array('type' => 'int', 'null' => false, 'constraint' => 3),
			'pts_opp' => array('type' => 'int', 'null' => false, 'constraint' => 3),
		), array('id'));

		\DB::query('CREATE INDEX season ON game(`season`)')->execute();
		\DB::query('CREATE INDEX game_type_id ON game(`game_type_id`)')->execute();
		\DB::query('CREATE INDEX opponent_id ON game(`opponent_id`)')->execute();
		\DB::query('CREATE INDEX site_id ON game(`site_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX season ON game')->execute();
		\DB::query('DROP INDEX game_type_id ON game')->execute();
		\DB::query('DROP INDEX opponent_id ON game')->execute();
		\DB::query('DROP INDEX site_id ON game')->execute();

		\DBUtil::drop_table('game');
	}
}