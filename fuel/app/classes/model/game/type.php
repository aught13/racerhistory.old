<?php

class Model_Game_Type extends \Orm\Model
{
    protected static $_properties = [
        'id',
        'game_type_name' => [
            'data_type' => 'varchar',
            'label' => 'Game Type',
            'validation' => ['required', 'max_length' => [162]]
        ],
        'post' => [
            'data_type' => 'int',
            'label' => 'Postseason?',
            'form' => [
                'type' => 'radio',
                'options' => [
                    1 => 'Yes',
                    0 => 'No'
                ]
            ],
            'validation' => ['required']
        ],
        'conf' => [
            'data_type' => 'int',
            'label' => 'Conference?',
            'form' => [
                'type' => 'radio',
                'options' => [
                    1 => 'Yes',
                    0 => 'No'
                ]
            ],
            'validation' => ['required']
        ],
        'created_at' => [
            'data_type' => 'timestamp',
            'label' => 'Created',
            'form' => ['type' => false]
        ],
        'updated_at' => [
            'data_type' => 'timestamp',
            'label' => 'Updated',
            'form' => ['type' => false]
        ],
    ];    

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'],'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'],'mysql_timestamp' => true],
        'Orm\Observer_Validation' => ['events' => ['before_insert', 'before_save']]
    ];
    

    public static function validate($factory)
    {
            $val = Validation::forge($factory);
            $val->add_field('game_type_name', 'Game Type Name', 'required|max_length[162]');
            

            return $val;
    }

    protected static $_table_name = 'game_type';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'game' => [
            'key_from' => 'id',
            'model_to' => 'Model_Game',
            'key_to' => 'game_type_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ]
    ];

    protected static $_many_many = [];

    protected static $_has_one = [];

    protected static $_belongs_to = [];
        
    public static function menuTypes() 
    {
        $query = DB::select('id', 'game_type_name','post' ,'conf')->from('game_type')->order_by('id', 'desc')->as_assoc()->execute();
        $types = [];
        foreach ($query as $result) {
            if ($result['post'] == 1) {
                $post = "Postseason";
            } else {
                $post = "";
            }
            if ($result['conf'] == 1) {
                $conf = 'Conference';
            } else {
                $conf = '';
            }
            $types[$result['id']] = $result['game_type_name']." ".$post." ".$conf;
        }
        $types['NEW'] = 'NEW';


        return $types;
    }
}
