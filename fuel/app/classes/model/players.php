<?php

class Model_Players extends \Model
{

    public static function validate_search($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('name', 'Name', 'valid_string|max_length[162]');
        $val->add_field('year', 'Year', 'valid_string[numeric]|numeric_min[1926]|numeric_max[3000]');
        return $val;
    }
    
    public static function search_name($param) {
        $query = DB::query("
                    SELECT 	
                    p.id,p.first,p.nick,p.last,
                    (Min(s.season_id)-1) AS strt,
                    Max(s.season_id) 	AS cend
                    FROM player_season_stats AS s
                    INNER JOIN person AS p ON p.id = s.person_id
                    GROUP BY p.id
                    HAVING p.last LIKE '%".$param."%'
                    OR p.first LIKE '%".$param."%' order by cend DESC");
        $result = $query->as_object()->execute();
        if (DB::count_last_query() > 0) {
            return  $result;  
        } else {
            return null;
        }
    }
    
    public static function search_year($param) {
        $query = DB::query("SELECT 	
                    p.id, p.first, p.last, p.nick, s.season_id as cend, s.season_id-1 as strt
                    FROM player_season_stats AS s
                    INNER JOIN person AS p ON p.id = s.person_id
                    HAVING s.season_id = ".$param."
                    ORDER BY s.GP DESC , s.Pts DESC" );
        $result = $query->as_object()->execute();
        if (DB::count_last_query() > 0) {
            return  $result;  
        } else {
            return null;
        }
              
    }
    
    public static function view_player($param) {
        $data = Model_Person::find($param, [
            'related' => [
                'person_post' => [
                    'related' => [
                        'post',
                        ],
                    'order_by' => [
                        'submitted_date' => 'desc'
                        ],
                    ], 
                ],
            ]);
        return $data;
    }
}
