<?php

namespace Fuel\Migrations;

class Create_season_total_stats
{
	public function up()
	{
		\DBUtil::create_table('season_total_stats', array(
			'id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
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
			'BLK' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'STL' => array('type' => 'decimal', 'null' => true, 'constraint' => '33,0'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('season_total_stats');
	}
}