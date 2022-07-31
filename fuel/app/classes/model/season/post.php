<?php
namespace Model\Season;

class Post extends \Orm\Model
{
	protected static $_properties = [
		'id',
		'id',
		'season_id',
		'post_id',
		'submitted_date',
		'updated_date',

	];


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('season_id', 'Season Id', 'required|valid_string[numeric]');
		$val->add_field('post_id', 'Post Id', 'required|valid_string[numeric]');

		return $val;
	}
        
        protected static $_table_name = 'season_post';

	protected static $_primary_key = ['id'];

	protected static $_has_one = [
            'post' => [
                'key_from' => 'post_id',
                'model_to' => '\Model\\Post',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => true,
               ]
        ];

	protected static $_belongs_to = [
            'season_info' => [
                'key_from' => 'season_id',
                'model_to' => '\Model\Season\Info',
                'key_to' => 'season',
                'cascade_save' => true,
                'cascade_delete' => false,
               ]
];

}
