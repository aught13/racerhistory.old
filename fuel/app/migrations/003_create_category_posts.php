<?php

namespace Fuel\Migrations;

class Create_category_posts
{
	public function up()
	{
		\DBUtil::create_table('category_posts', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'category_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'post_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('category_posts');
	}
}