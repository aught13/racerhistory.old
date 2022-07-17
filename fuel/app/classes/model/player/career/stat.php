<?php
class Model_Player_Career_Stat extends \Orm\Model
{
	protected static $_properties = [
                'id',
		'person_id',
		'seasons',
                'start',
                'finish',
		'GP',
		'GS',
		'MIN',
		'FGM',
		'FGA',
                'FGP',
		'TPM',
		'TPA',
                'TPP',
		'FTM',
		'FTA',
                'FTP',
		'ORB',
		'DRB',
		'RB',
		'PF',
		'AST',
		'TRN',
                'ATR',
		'BLK',
		'STL',
		'PTS',
	];

	
        protected static $_table_name = 'player_career_stats';

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
                ]
    ];
        
        public static function get_derived($param) 
        {
                $stats = DB::select()->execute()->as_array();
            
        }
        
}
