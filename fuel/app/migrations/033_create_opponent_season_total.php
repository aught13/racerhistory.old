<?php

namespace Fuel\Migrations;

class Create_opponent_season_total
{
	public function up()
	{
		\DBUtil::create_table('opponent_season_total', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'G' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'MP' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'FGM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FGA' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'TPM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TPA' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FTM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FTA' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TRB' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'PF' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'AST' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'BLK' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'STL' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		), array('id'));

		\DB::query('CREATE INDEX season_id ON opponent_season_total(`season_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX season_id ON opponent_season_total')->execute();

		\DBUtil::drop_table('opponent_season_total');
	}
}