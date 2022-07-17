<?php

namespace Fuel\Migrations;

class Create_season_info
{
	public function up()
	{
		\DBUtil::create_table('season_info', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'team' => array('default' => 'mbb', 'type' => 'varchar', 'null' => false, 'constraint' => 3),
			'season' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'semester' => array('default' => '2', 'type' => 'int', 'null' => true, 'constraint' => 11),
			'fin' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'last' => array('type' => 'varchar', 'null' => true, 'constraint' => 128),
			'notes' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'img' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX season ON season_info(`season`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX season ON season_info')->execute();

		\DBUtil::drop_table('season_info');
	}
}