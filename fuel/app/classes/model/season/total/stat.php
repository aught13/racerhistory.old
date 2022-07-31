<?php
namespace Model\Season\Total;

class Stat extends \Orm\Model
{
	protected static $_properties = [
                'id',
		'season_id',
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
		'BLK',
		'STL',
	];

        protected static $_table_name = 'season_total_stats';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
            'season_info' => [
                'key_from' => 'season_id',
                'model_to' => 'Model_Season_Info',
                'key_to' => 'season',
                'cascade_save' => false,
                'cascade_delete' => false,
            ]
            
	];
        
}
