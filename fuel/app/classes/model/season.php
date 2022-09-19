<?php

/*
 * Racerhistory.com software package
 * Patrick Foltz
 */

/**
 * Model Seasons
 * 
 * Model for season information
 *
 * @author Patrick Foltz
 */

namespace Model;

class Season extends \Orm\Model {

    protected static $_properties = [
        'id',
        'identifier' => [
            'data_type' => 'number',
            'label' => 'Season',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'numeric_between' => [1000, 9999]],
        ],
        'start' => [
            'data_type' => 'number',
            'label' => 'Season',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'numeric_between' => [1000, 9999]],
        ],
        'end' => [
            'data_type' => 'number',
            'label' => 'Season',
            'form' => ['type' => 'select', 'class' => 'form-control'],
            'validation' => ['required', 'numeric_between' => [1000, 9999]],
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
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
    ];
    
    public static function validate($factory)
    {
            $val = \Validation::forge($factory);
            $val->add_field('identifier', 'Identifier ', 'required|valid_string[numeric]');
            $val->add_field('start', 'Year Start', 'required|valid_string[numeric]');
            $val->add_field('end', 'Year End', 'required|valid_string[numeric]');

            return $val;
    }
        
    protected static $_table_name = 'seasons';
    protected static $_primary_key = ['id'];
    protected static $_has_many = [
        'team_season' => [
                'key_from' => 'identifier',
                'model_to' => '\Model\Team\Season',
                'key_to' => 'season_identifier',
                'cascade_save' => true,
                'cascade_delete' => false,
            ],
    ];
    protected static $_many_many = [];
    protected static $_has_one = [];
    protected static $_belongs_to = [];

    public static function menuSeasons() {
        $query = \DB::select('season_identifier', 'id')->from('team_season')->order_by('season_identifier', 'desc')->as_assoc()->execute();
        $seasons = [];
        foreach ($query as $result) {
            $seasons[$result['season_identifier']] = $result['season_identifier'] . " " . \Inflector::ordinalize($result['id']);
        }
        $seasons['NEW'] = 'NEW';

        return $seasons;
    }

    /**
     * Get W-L records for a season
     * 
     * @param int $param season id to be used in selecting an individual season if set
     * @return Model\Team\Season
     */
    public static function get_season_record($param = null) {
        if (isset($param)) {
            $query = \DB::query(
                            'SELECT f.id, a.season, f.fin, a.wins, a.losses, e.homew, e.homel, b.roadw, b.roadl, c.neuw, c.neul, d.confw, d.confl 
                    FROM ( 
                    (SELECT `season`, sum(`w`) as wins, sum(`L`) as losses FROM `games` Group by `season`) as a 
                    LEFT JOIN 
                    (SELECT `season` as se, SUM(`w`) as homew, SUM(`l`) as homel FROM `games` WHERE `hrn`=1 GROUP BY `season`) as e 
                    ON e.se = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sb, SUM(`w`) as roadw, SUM(`l`) as roadl FROM `games` WHERE `hrn`=2 GROUP BY `season`) as b 
                    ON b.sb = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sc, SUM(`w`) as neuw, SUM(`l`) as neul FROM `games` WHERE `hrn`=3 GROUP BY `season`) as c 
                    ON c.sc = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sd, SUM(`w`) as confw, SUM(`l`) as confl FROM `games` WHERE `game_type_id`=1 GROUP BY `season`) as d 
                    ON d.sd = a.season 
                    LEFT JOIN 
                    (SELECT `season_identifier` as sf, `id`, `fin` FROM `team_season`) as f ON f.sf = a.season )WHERE `season`=' . $param
            );
        } else {
            $query = \DB::query(
                            'SELECT f.id, a.season, f.fin, a.wins, a.losses, e.homew, e.homel, b.roadw, b.roadl, c.neuw, c.neul, d.confw, d.confl 
                    FROM ( 
                    (SELECT `season`, sum(`w`) as wins, sum(`L`) as losses FROM `games` Group by `season`) as a 
                    LEFT JOIN 
                    (SELECT `season` as se, SUM(`w`) as homew, SUM(`l`) as homel FROM `games` WHERE `hrn`=1 GROUP BY `season`) as e 
                    ON e.se = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sb, SUM(`w`) as roadw, SUM(`l`) as roadl FROM `games` WHERE `hrn`=2 GROUP BY `season`) as b 
                    ON b.sb = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sc, SUM(`w`) as neuw, SUM(`l`) as neul FROM `games` WHERE `hrn`=3 GROUP BY `season`) as c 
                    ON c.sc = a.season 
                    LEFT JOIN 
                    (SELECT `season` as sd, SUM(`w`) as confw, SUM(`l`) as confl FROM `games` WHERE `game_type_id`=1 GROUP BY `season`) as d 
                    ON d.sd = a.season 
                    LEFT JOIN 
                    (SELECT `season_identifier` as sf, `id`, `fin` FROM `team_season`) as f ON f.sf = a.season ) ORDER BY `season` DESC'
            );
        }
        $result = $query->as_object('\Model\Team\Season')->execute();
        return $result;
    }

    /**
     * Fetch all season_info and player_season_stats for a single season 
     * and return as a single object
     * 
     * @param int $season season id to be searched
     * @return \Model\Team\Season
     */
    public static function get_season_info($season = null) {
        $data = \Model\Team\Season::find('first', [
                    'where' => [['season_identifier', $season]],
                    'related' => [
                        'team_season_post' => [
                            'related' => [
                                'post',
                                ],
                            'order_by' => [
                                'submitted_date' => 'desc'
                                ],
                            ],
                        'player_season_stats' => [
                            'related' => [
                                'person'
                            ],
                            'order_by' => [
                                'PTS' => 'desc'
                            ],
                        ],
                        'season_total_stats',
                    ],
        ]);
        return $data;
    }

    /**
     * Fetch max and min seasons from season_info for navigation
     * and return as a single object
     * 
     * @param int $season season id to be searched
     * @return Model_Season_Info
     */
    public static function get_from() {
        $query = \DB::select(\DB::expr('MIN(season_identifier) as fr'))->from('team_season')->as_assoc()->execute();
        foreach ($query as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $from = $value2;
            }
        }
        return $from;
    }

    public static function get_till() {
        $query = \DB::select(\DB::expr('MAX(season_identifier) as till'))->from('team_season')->as_assoc()->execute();
        foreach ($query as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $till = $value2;
            }
        }
        return $till;
    }

}
