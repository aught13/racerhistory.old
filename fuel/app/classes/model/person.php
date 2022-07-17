<?php

class Model_Person extends \Orm\Model

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

    protected static $_table_name = 'person';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'player_season_stats' => [
            'key_from' => 'id',
            'model_to' => 'Model_Player_Season_Stat',
            'key_to' => 'person_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
        'full_season_stats' => [
            'key_from' => 'id',
            'model_to' => 'Model_Full_Season_Stat',
            'key_to' => 'person_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
        //    'person_data' => array(
        //        'key_from' => 'id',
        //        'model_to' => 'Model_Person_Data',
        //        'key_to' => 'person_id',
        //        'cascade_save' => true,
        //        'cascade_delete' => false,
        //    ),
        //    'person_info' => array(
        //        'key_from' => 'id',
        //        'model_to' => 'Model_Person_Info',
        //        'key_to' => 'person_id',
        //        'cascade_save' => true,
        //        'cascade_delete' => false,
        //    ),
        'person_post' => [
            'key_from' => 'id',
            'model_to' => 'Model_Person_Post',
            'key_to' => 'person_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
    ];

    //    protected static $_eav = array(
    //            'person_data' => array(            // we use the statistics relation to store the EAV data
    //                'attribute' => 'data_key',        // the key column in the related table contains the attribute
    //                'value' => 'data_value',            // the value column in the related table contains the value
    //            ),
    //            'person_info' => array(            // we use the statistics relation to store the EAV data
    //                'attribute' => 'info_key',        // the key column in the related table contains the attribute
    //                'value' => 'info_value',            // the value column in the related table contains the value
    //            )
    //    );
    protected static $_many_many = [
    ];

    protected static $_has_one = [
    ];

    protected static $_belongs_to = [
    ];

    public static function image($id)
    {
        $image['photo'] = DB::select('photo')->from('person')->where('id', '=', $id)->as_object()->execute();
        return $image;

    }

}