<?php
namespace Model;

class Game extends \Orm\Model

{
    protected static $_properties = [
        'id',
        'season' => [
            'data_type' => 'number',
            'label' => 'Season',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'numeric_between' => [1000, 9999]],
        ],
        'game_date' => [
            'data_type' => 'datetime',
            'label' => 'Date & Time',
            'form' => ['type' => 'datetime-local', 'class' => 'form-control'],
            'validation' => ['required'],
        ],
        'game_type_id' => [
            'data_type' => 'number',
            'label' => 'Game Type',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'opponent_id' => [
            'data_type' => 'number',
            'label' => 'Opponent',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'site_id' => [
            'data_type' => 'number',
            'label' => 'Site',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'hrn' => [
            'data_type' => 'number',
            'label' => 'Home, Road, or Neutral Site',
            'form' => [
                'type' => 'select',
                'options' => [
                    1 => 'Home',
                    2 => 'Road',
                    3 => 'Neutral',
                ],
                'class' => 'form-control',
            ],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'post' => [
            'data_type' => 'number',
            'label' => 'Postseason Game?',
            'form' => [
                'type' => 'radio',
                'options' => [
                    1 => 'Yes',
                    0 => 'No',
                ],
            ],
            'validation' => ['required'],
        ],
        'w' => [
            'data_type' => 'number',
            'validation' => ['required', 'numeric_between' => [0, 1]],
        ],
        'l' => [
            'data_type' => 'number',
            'validation' => ['required', 'numeric_between' => [0, 1]],
        ],
        'pts_mur' => [
            'data_type' => 'number',
            'label' => 'Final Murray',
            'form' => ['type' => 'number'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'pts_opp' => [
            'data_type' => 'number',
            'label' => 'Final Opponent',
            'form' => ['type' => 'number'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'created_at' => [
            'data_type' => 'timestamp',
            'label' => 'Created',
            'form' => ['type' => false],
        ],
        'updated_at' => [
            'data_type' => 'timestamp',
            'label' => 'Updated',
            'form' => ['type' => false],
        ],
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
        'Orm\Observer_Validation' => ['events' => ['before_insert', 'before_save']],
    ];

    // public static function validate($factory)
    // {
    //     $val = Validation::forge($factory);
    //     $val->add_field('id', 'Id', 'valid_string[numeric]');
    //     $val->add_field('season', 'Season', 'required|valid_string[numeric]');
    //     $val->add_field('game_date', 'Game Date', 'required');
    //     $val->add_field('game_type_id', 'Game Type Id', 'valid_string[numeric]');
    //     $val->add_field('opponent_id', 'Opponent Id', 'required|valid_string[numeric]');
    //     $val->add_field('site_id', 'Site Id', 'required|valid_string[numeric]');
    //     $val->add_field('hrn', 'Hrn', 'required|valid_string[numeric]');
    //     $val->add_field('post', 'Post', 'required|valid_string[numeric]');
    //     $val->add_field('w', 'W', 'required|valid_string[numeric]');
    //     $val->add_field('l', 'L', 'required|valid_string[numeric]');
    //     $val->add_field('pts_mur', 'Pts Mur', 'required|valid_string[numeric]');
    //     $val->add_field('pts_opp', 'Pts Opp', 'required|valid_string[numeric]');

    //     return $val;
    // }

    protected static $_table_name = 'game';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'game_meta' => [
            'key_from' => 'id',
            'model_to' => '\Model\Game\Meta',
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