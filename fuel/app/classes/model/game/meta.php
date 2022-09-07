<?php
namespace Model\Game;

class Meta extends \Orm\Model
{
	protected static $_properties = [
		'id',
		'game_id',
		'info_key',
		'info_value',
		'submitted_date',
		'updated_date',
	];
        protected static $_to_array_exclude = [
                'submitted_date',
		'updated_date',	// exclude these columns from being exported
        ];
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('game_id', 'Game Id', 'required|valid_string[numeric]');
		$val->add_field('info_key', 'Info Key', 'required|max_length[162]');
		$val->add_field('info_value', 'Info Value', 'required|max_length[240]');
		$val->add_field('submitted_date', 'Submitted Date', 'required|max_length[]');
		$val->add_field('updated_date', 'Updated Date', 'required|max_length[]');

		return $val;
	}
        
        protected static $_table_name = 'game_meta';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
            'game' => [
                'key_from' => 'game_id',
                'model_to' => '\Model\Game',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => true,
            ]
	];

}
