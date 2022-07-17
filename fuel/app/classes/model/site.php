<?php

class Model_Site extends \Orm\Model

{
    public static $_properties = [
        "id",
        "site_name" => [
            "label" => "City",
            "data_type" => "varchar",
            "validation" => [
                "required",
                "trim",
                "valid_string" => [['spaces', 'alpha']],
                "max_length" => [162],
            ],
            "form" => [
                "type" => "text",
            ],
            "default" => "New City",
        ],
        "site_state" => [
            "label" => "State",
            "data_type" => "varchar",
            "validation" => [
                "required",
                "trim",
                "valid_string" => ['alpha'],
                "max_length" => [162],
            ],
            "form" => [
                "type" => "text",
            ],
            "default" => "State",
        ],
        "site_arena" => [
            "label" => "Arena Name",
            "data_type" => "varchar",
            "validation" => [
                "trim",
                "valid_string" => [['alpha', 'spaces']],
                "max_length" => [162],
            ],
            "form" => [
                "type" => "text",
            ],
            "default" => null,
        ],
        "created_at" => [
            "label" => "Submitted date",
            "data_type" => "timestamp",
            "form" => [
                "type" => false,
            ],
        ],
        "updated_at" => [
            "label" => "Updated date",
            "data_type" => "timestamp",
            "form" => [
                "type" => false,
            ],
        ],
    ];

//    public static function validate($factory)
//    {
//        $val = Validation::forge($factory);
//        $val->add_field('site_name', 'City', 'required|trim|valid_string[alpha,spaces]|max_length[162]');
//        $val->add_field('site_state', 'State', 'required|trim|valid_string[alpha]|max_length[162]');
//                $val->add_field('site_arena', 'Arena Name', '|trim|valid_string[alpha,spaces]|max_length[162]');

//        return $val;
//    }

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
        'Orm\Observer_Validation' => ['events' => ['before_insert', 'before_save']],
    ];

    protected static $_table_name = 'site';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
        'game' => [
            'key_from' => 'id',
            'model_to' => 'Model_Game',
            'key_to' => 'site_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ],
    ];

    protected static $_many_many = [];

    protected static $_has_one = [];

    protected static $_belongs_to = [];

    public static function menuSites()
    {
        $query = DB::select('id', 'site_name', 'site_state', 'site_arena')->from('site')->order_by('id', 'desc')->as_assoc()->execute();
        $types = [];
        foreach ($query as $result) {
            $types[$result['id']] = $result['site_name'] . ", " . $result['site_state'] . " - " . $result['site_arena'];
        }
        $types['NEW'] = 'new';

        return $types;
    }
}