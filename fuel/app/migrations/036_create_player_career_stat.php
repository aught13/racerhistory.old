<?php

namespace Fuel\Migrations;

class Create_player_career_stat
{
	public function up()
	{
		\DBUtil::create_table('player_career_stat', array(
			'id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'person_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'seasons' => array('default' => '0', 'type' => 'bigint', 'null' => false, 'constraint' => 21),
			'start' => array('type' => 'bigint', 'null' => true, 'constraint' => 12, 'unsigned' => true),
			'finish' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GP' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'GS' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'MIN' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'FGM' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'FGA' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'FGP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'TPM' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'TPA' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'TPP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FTM' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'FTA' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'FTP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'ORB' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'DRB' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'RB' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'PF' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'AST' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'TRN' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'ATR' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'BLK' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'STL' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'PTS' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('player_career_stat');
	}
}