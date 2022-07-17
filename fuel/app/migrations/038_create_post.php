<?php

namespace Fuel\Migrations;

class Create_post
{
	public function up()
	{
		\DBUtil::create_table('post', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'title' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'text' => array('type' => 'longtext', 'null' => true),
			'ref_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('post');
	}
}