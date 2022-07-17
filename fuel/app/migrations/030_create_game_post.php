<?php

namespace Fuel\Migrations;

class Create_game_post
{
	public function up()
	{
		\DBUtil::create_table('game_post', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'post_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('game_post');
	}
}