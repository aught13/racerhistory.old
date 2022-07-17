<?php

class Model_Post extends \Orm\Model
{
    protected static $_properties = [
        "id",
        "title" => [
            "label" => "Title",
            "data_type" => "varchar",
            "validation" => [
                "required",
                "valid_string" => [['spaces', 'alpha', 'numeric', 'punctuation', 'dashes', 'singlequotes']],
                "max_length" => [162],
            ],
            "form" => [
                "type" => "text",
            ],
        ],
        "text" => [
            "label" => "Text",
            "data_type" => "longtext",            
            "validation" => [
                "required",
                "match_pattern" => ["/^[^\{\}]+$/"]
            ],
            "form" => ["type" => "textarea", "style" => "width: 90%; height: 700px"],
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

    protected static $_table_name = 'post';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [];

    protected static $_many_many = [];

    protected static $_has_one = [];

    protected static $_belongs_to = [
        'person_post' => [
            'key_from' => 'post_id',
            'model_to' => 'Model_Person_Post',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => true,
       ],
        'game_post' => [
            'key_from' => 'id',
            'model_to' => 'Model_Game_Post',
            'key_to' => 'post_id',
            'cascade_save' => true,
            'cascade_delete' => true,
       ],
        'season_post' => [
            'key_from' => 'id',
            'model_to' => 'Model_Season_Post',
            'key_to' => 'post_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        ]
    ];
    

}
