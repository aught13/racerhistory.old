<?php

namespace Fuel\Migrations;

class Create_site
{
	public function up()
	{
		\DBUtil::create_table('site', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'site_name' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'site_state' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'site_arena' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('site');
	}
}