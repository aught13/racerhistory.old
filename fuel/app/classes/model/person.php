<?php
namespace Model;

class Person extends \Orm\Model

{
    protected static $_properties = [
        'id',
        'first',
        'last',
        'nick',
        'photo',
        'submitted_date',
        'updated_date',
    ];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('id', 'Id', 'required|valid_string[numeric]');
        $val->add_field('first', 'First', 'required|max_length[162]');
        $val->add_field('last', 'Last', 'required|max_length[162]');
        $val->add_field('nick', 'Nick', 'max_length[162]');
        $val->add_field('photo', 'Photo', 'max_length[162]');

        return $val;
    }

    protected static $_table_name = 'persons';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'player_season_stats' => [
            'key_from' => 'id',
            'model_to' => '\Model\Player\Season\Stat',
            'key_to' => 'person_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],

        'person_post' => [
            'key_from' => 'id',
            'model_to' => '\Model\Person\Post',
            'key_to' => 'person_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
    ];

//    protected static $_eav = [
//        'person_metadata' => [            // we use the statistics relation to store the EAV data
//            'attribute' => 'key',        // the key column in the related table contains the attribute
//            'value' => 'value',            // the value column in the related table contains the value
//        ],
//    ];
    
    protected static $_many_many = [
    ];

    protected static $_has_one = [
    ];

    protected static $_belongs_to = [
    ];

    public static function image($id)
    {
        $image['photo'] = \DB::select('photo')->from('person')->where('id', '=', $id)->as_object()->execute();
        return $image;

    }

}