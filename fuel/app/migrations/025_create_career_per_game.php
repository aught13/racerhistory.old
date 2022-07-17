<?php

namespace Fuel\Migrations;

class Create_career_per_game
{
	public function up()
	{
		\DBUtil::create_table('career_per_game', array(
			'person_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'seasons' => array('default' => '0', 'type' => 'bigint', 'null' => false, 'constraint' => 21),
			'start' => array('type' => 'bigint', 'null' => true, 'constraint' => 12, 'unsigned' => true),
			'finish' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GP' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'MIN' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FGM' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FGA' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FGP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'TPM' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'TPA' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'TPP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FTM' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FTA' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'FTP' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'ORB' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'DRB' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'RB' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'PF' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'AST' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'TRN' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'BLK' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'STL' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
			'PTS' => array('type' => 'decimal', 'null' => true, 'constraint' => '37,4'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('career_per_game');
	}
}