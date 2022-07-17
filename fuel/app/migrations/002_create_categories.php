<?php

namespace Fuel\Migrations;

class Create_categories
{
	public function up()
	{
		\DBUtil::create_table('categories', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'category_name' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'category_description' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('categories');
	}
}