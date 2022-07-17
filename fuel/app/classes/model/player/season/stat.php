<?php
class Model_Player_Season_Stat extends \Orm\Model
{
	protected static $_properties = [
                'id',
		'person_id',
		'season_id',
		'GP',
		'GS',
		'MIN',
		'FGM',
		'FGA',
		'TPM',
		'TPA',
		'FTM',
		'FTA',
		'ORB',
		'DRB',
		'RB',
		'PF',
		'AST',
		'TRN',
		'BLK',
		'STL',
		'PTS',
		'submitted_date',
		'updated_date',
	];

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('person_id', 'Person Id', 'required|valid_string[numeric]');
		$val->add_field('season_id', 'Season Id', 'required|valid_string[numeric]');
		$val->add_field('GP', 'GP', 'required|valid_string[numeric]');
		$val->add_field('GS', 'GS', 'required|valid_string[numeric]');
		$val->add_field('MIN', 'MIN', 'required|valid_string[numeric]');
		$val->add_field('FGM', 'FGM', 'required|valid_string[numeric]');
		$val->add_field('FGA', 'FGA', 'required|valid_string[numeric]');
		$val->add_field('TPM', 'TPM', 'required|valid_string[numeric]');
		$val->add_field('TPA', 'TPA', 'required|valid_string[numeric]');
		$val->add_field('FTM', 'FTM', 'required|valid_string[numeric]');
		$val->add_field('FTA', 'FTA', 'required|valid_string[numeric]');
		$val->add_field('ORB', 'ORB', 'required|valid_string[numeric]');
		$val->add_field('DRB', 'DRB', 'required|valid_string[numeric]');
		$val->add_field('RB', 'RB', 'required|valid_string[numeric]');
		$val->add_field('PF', 'PF', 'required|valid_string[numeric]');
		$val->add_field('AST', 'AST', 'required|valid_string[numeric]');
		$val->add_field('TRN', 'TRN', 'required|valid_string[numeric]');
		$val->add_field('BLK', 'BLK', 'required|valid_string[numeric]');
		$val->add_field('STL', 'STL', 'required|valid_string[numeric]');
		$val->add_field('PTS', 'PTS', 'required|valid_string[numeric]');
		$val->add_field('submitted_date', 'Submitted Date', 'required|max_length[]');
		$val->add_field('updated_date', 'Updated Date', 'required|max_length[]');

		return $val;
	}

        protected static $_table_name = 'player_season_stats';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
            'person' => [
                'key_from' => 'person_id',
                'model_to' => 'Model_Person',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
            'season_info' => [
                'key_from' => 'season_id',
                'model_to' => 'Model_Season_Info',
                'key_to' => 'season',
                'cascade_save' => true,
                'cascade_delete' => false,
            ]
            
	];
        
        public static function get_derived($param) 
        {
                $stats = DB::select()->execute()->as_array();
            
        }
        
}
