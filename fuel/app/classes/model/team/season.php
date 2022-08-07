<?php
namespace Model\Team;

class Season extends \Orm\Model
{
	protected static $_properties = [
		'id',
                'team_id',
                'season_identifier',
		'fin',
                'last',
		'notes',
		'img',
		'submitted_date',
		'updated_date',
	];

        protected static $_table_name = 'team_season';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
            'player_season_stats' => [
                'key_from' => 'season_identifier',
                'model_to' => '\Model\Player\Season\Stat',
                'key_to' => 'season_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
            'game' => [
                'key_from' => 'season_identifier',
                'model_to' => '\Model\Game',
                'key_to' => 'season',
                'cascade_save' => true,
                'cascade_delete' => false,
            ]
	];

	protected static $_many_many = [
	];

	protected static $_has_one = [            
            'season_total_stats' => [
                'key_from' => 'season_identifier',
                'model_to' => '\Model\Season\Total\Stat',
                'key_to' => 'season_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
	];

	protected static $_belongs_to = [
	];
        
        public static function menuSeasons() 
        {
            $query = \DB::select('season','id')->from('season_info')->order_by('season', 'desc')->as_assoc()->execute();
            $seasons = [];
            foreach ($query as $result) {
                $seasons[$result['season']] = $result['season']." ".\Inflector::ordinalize($result['id']);
            }
            $seasons['NEW'] = 'NEW';
            
            
            return $seasons;
        }
}
