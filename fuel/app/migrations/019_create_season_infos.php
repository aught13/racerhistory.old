<?php

namespace Fuel\Migrations;

class Create_season_infos
{
	public function up()
	{
		\DBUtil::create_table('season_infos', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'season' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'fin' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'notes' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'img' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX season ON season_infos(`season`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX season ON season_infos')->execute();

		\DBUtil::drop_table('season_infos');
	}
}