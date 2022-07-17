<?php

namespace Fuel\Migrations;

class Create_player_season_stats
{
	public function up()
	{
		\DBUtil::create_table('player_season_stats', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'person_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GP' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'MIN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'RB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'AST' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'STL' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'BLK' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PF' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE INDEX person_id ON player_season_stats(`person_id`)')->execute();
		\DB::query('CREATE INDEX season_id ON player_season_stats(`season_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX person_id ON player_season_stats')->execute();
		\DB::query('DROP INDEX season_id ON player_season_stats')->execute();

		\DBUtil::drop_table('player_season_stats');
	}
}