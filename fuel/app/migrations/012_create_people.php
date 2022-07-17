<?php

namespace Fuel\Migrations;

class Create_people
{
	public function up()
	{
		\DBUtil::create_table('people', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'first' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'last' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'nick' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'photo' => array('type' => 'varchar', 'null' => true, 'constraint' => 150),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('people');
	}
}