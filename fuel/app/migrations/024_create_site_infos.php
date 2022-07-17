<?php

namespace Fuel\Migrations;

class Create_site_infos
{
	public function up()
	{
		\DBUtil::create_table('site_infos', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'site_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'info_key' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'info_value' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX site_id_2 ON site_infos(`site_id`, `info_key`)')->execute();
		\DB::query('CREATE INDEX site_id ON site_infos(`site_id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX site_id_2 ON site_infos')->execute();
		\DB::query('DROP INDEX site_id ON site_infos')->execute();

		\DBUtil::drop_table('site_infos');
	}
}