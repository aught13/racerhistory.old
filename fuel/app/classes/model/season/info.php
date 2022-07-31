<?php
namespace Model\Season;

class Info extends \Orm\Model
{
	protected static $_properties = [
		'id',
                'season',
		'fin',
		'notes',
		'img',
		'submitted_date',
		'updated_date',
	];


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('season', 'Season', 'required|valid_string[numeric]');
		$val->add_field('fin', 'Fin', 'max_length[162]');
		$val->add_field('notes', 'Notes', 'max_length[162]');
		$val->add_field('img', 'Img', 'max_length[162]');

		return $val;
	}


        protected static $_table_name = 'season_info';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
            'player_season_stats' => [
                'key_from' => 'season',
                'model_to' => '\Model\Player\Season\Stat',
                'key_to' => 'season_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
            'full_season_stats' => [
                'key_from' => 'season',
                'model_to' => '\Model\Full\Season\Stat',
                'key_to' => 'season_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
            'game' => [
                'key_from' => 'season',
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
                'key_from' => 'season',
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
                $seasons[$result['season']] = $result['season']." ".Inflector::ordinalize($result['id']);
            }
            $seasons['NEW'] = 'NEW';
            
            
            return $seasons;
        }
}
