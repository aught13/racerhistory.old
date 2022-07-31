<?php
namespace Model\Full\Season;

class Stat extends \Orm\Model
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

	
        protected static $_table_name = 'full_season_stats';

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
                'model_to' => '\Model\Person',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
            'season_info' => [
                'key_from' => 'season_id',
                'model_to' => '\Model\Season\Info',
                'key_to' => 'season',
                'cascade_save' => true,
                'cascade_delete' => false,
            ]
            
	];
        
                
}
