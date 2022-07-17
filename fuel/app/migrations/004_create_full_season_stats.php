<?php

namespace Fuel\Migrations;

class Create_full_season_stats
{
	public function up()
	{
		\DBUtil::create_table('full_season_stats', array(
			'id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'person_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GP' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'MIN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGP' => array('type' => 'decimal', 'null' => true, 'constraint' => '15,4', 'unsigned' => true),
			'TPM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPP' => array('type' => 'decimal', 'null' => true, 'constraint' => '15,4', 'unsigned' => true),
			'FTM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTP' => array('type' => 'decimal', 'null' => true, 'constraint' => '15,4', 'unsigned' => true),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'RB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PF' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'AST' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'ATR' => array('type' => 'decimal', 'null' => true, 'constraint' => '15,4', 'unsigned' => true),
			'BLK' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'STL' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('full_season_stats');
	}
}