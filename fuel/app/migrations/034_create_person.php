<?php

namespace Fuel\Migrations;

class Create_person
{
	public function up()
	{
		\DBUtil::create_table('person', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'first' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'last' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'nick' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'photo' => array('type' => 'varchar', 'null' => true, 'constraint' => 150),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('person');
	}
}