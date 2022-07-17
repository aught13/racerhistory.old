<?php

class Model_Team extends \Orm\Model
{
    protected static $_properties = [
        "id", 
        "team_name" => [
            "label" => "Team name",
            "data_type" => "varchar",                        
            "validation" => [
                "required",
                "trim",
                "valid_string" => [['spaces', 'alpha', 'singlequotes']],
                "max_length" => [162],
            ],
            "form" => [
                "type" => "text",
            ],
            "default" => "New Team",
        ],
        "team_description" => [
            "label" => "Team description",
            "data_type" => "varchar",                       
            "validation" => [
                "trim",
                "valid_string" => [['spaces', 'alpha', 'singlequotes']],
                "max_length" => [240],
            ],
            "form" => [
                "type" => "text",
            ],
            "default" => "Brief description of team",
        ],
        "abbr" => [
            "label" => "Abbr",
            "data_type" => "varchar",                       
            "validation" => [
                "trim",
                "valid_string" => [['alpha', 'uppercase',]],
                "max_length" => [5],
            ],            
            "form" => [
                "type" => "text",
            ],
            "default" => "Team ABBR eg WBB",
        ],
        "gender" => [
            "label" => "Gender",
            "data_type" => "varchar",                                          
            "validation" => [
                "match_pattern" => ['/[MFNC]/'],
                "exact_length" => [1],
            ],            
            "form" => [
                "type" => "text",
            ],
            "default" => "M-Male F-Female N-Neutral C-Coed",
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

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'],'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'],'mysql_timestamp' => true],
        'Orm\Observer_Validation' => ['events' => ['before_insert', 'before_save']]
    ];

    protected static $_table_name = 'teams';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [
    ];

    protected static $_many_many = [
    ];

    protected static $_has_one = [
    ];

    protected static $_belongs_to = [
    ];

}
