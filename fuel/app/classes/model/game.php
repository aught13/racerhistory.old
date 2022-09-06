<?php
namespace Model;

class Game extends \Orm\Model

{
    protected static $_properties = [
        'id',
        'season',
        'game_date',
        'game_type_id',
        'opponent_id',
        'site_id',
        'hrn',
        'post',
        'w',
        'l',
        'pts_mur',
        'pts_opp',
        'created_at',
        'updated_at',
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_update'], 'mysql_timestamp' => true],
    ];

    protected static $_table_name = 'games';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'game_meta' => [
            'key_from' => 'id',
            'model_to' => '\Model\Game\Meta',
            'key_to' => 'game_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        ],
        'game_post' => [
            'key_from' => 'id',
            'model_to' => '\Model\Game\Post',
            'key_to' => 'game_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
    ];
    protected static $_eav = [
        'game_meta' => [
            'attribute' => 'info_key', // the key column in the related table contains the attribute
            'value' => 'info_value', // the value column in the related table contains the value
        ],
    ];

    protected static $_many_many = [];

    protected static $_has_one = [];

    protected static $_belongs_to = [
        'game_type' => [
            'key_from' => 'game_type_id',
            'model_to' => '\Model\Game\Type',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
        'opponent' => [
            'key_from' => 'opponent_id',
            'model_to' => '\Model\Opponent',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
        'site' => [
            'key_from' => 'site_id',
            'model_to' => '\Model\Site',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
    ];

    public static function image($id)
    {
        $image['photo'] = \DB::select('photo')->from('person')->where('id', '=', $id)->as_object()->execute();
        return $image;

    }

    public static function season_games($param = null)
    {
        $games = \Model\Game::find('all', [
            'where' => [
                ['season', $param],
            ],
        ]);
        return $games;
    }

    public static function all_games()
    {
        $games = \Model\Game::find('all');
        return $games;

    }

    public static function get_game($param = null)
    {
        $game = \Model\Game::find('all', [
            'where' => [
                ['id', $param],
            ],
        ]);
        return $game;

    }

}