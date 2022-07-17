<?php

class Model_Opponent extends \Orm\Model
{
	protected static $_properties = [
		"id" => [
			"label" => "Id",
			"data_type" => "int",
		],
		"opponent_name" => [
			"label" => "Opponent name",
			"data_type" => "varchar",
		],
		"opponent_mascot" => [
			"label" => "Opponent mascot",
			"data_type" => "varchar",
		],
		"opponent_current" => [
			"label" => "Opponent current",
			"data_type" => "int",
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

	protected static $_table_name = 'opponent';

	protected static $_primary_key = ['id'];

	protected static $_has_many = [
            'game' => [
                'key_from' => 'id',
                'model_to' => 'Model_Game',
                'key_to' => 'opponent_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            ]
        ];
        
	protected static $_many_many = [
	];

	protected static $_has_one = [
	];

	protected static $_belongs_to = [
	];
        
    public static function menuOpponent() 
    {
        $query = DB::select('id', 'opponent_name','opponent_mascot')->from('opponent')->order_by('opponent_name', 'desc')->as_assoc()->execute();
        $types = [];
        foreach ($query as $result) {
            $types[$result['id']] = $result['opponent_name']." ".$result['opponent_mascot'];
        }
        $types['NEW'] = 'NEW';


        return $types;
    }
        
}
