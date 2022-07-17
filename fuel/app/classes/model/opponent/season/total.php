<?php
use Orm\Model;

class Model_Opponent_Season_Total extends Model
{
	protected static $_properties = [
		'id',
		'id',
		'season_id',
		'G',
		'MP',
		'FGM',
		'FGA',
		'TPM',
		'TPA',
		'FTM',
		'FTA',
		'ORB',
		'DRB',
		'TRB',
		'PF',
		'AST',
		'TRN',
		'BLK',
		'STL',
		'PTS',
		'submitted_date',
		'updated_date',
		'created_at',
		'updated_at',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => [
			'events' => ['before_insert'],
			'mysql_timestamp' => false,
		],
		'Orm\Observer_UpdatedAt' => [
			'events' => ['before_save'],
			'mysql_timestamp' => false,
		],
	];

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('season_id', 'Season Id', 'required|valid_string[numeric]');
		$val->add_field('G', 'G', 'required|valid_string[numeric]');
		$val->add_field('MP', 'MP', 'required|valid_string[numeric]');
		$val->add_field('FGM', 'FGM', 'required|valid_string[numeric]');
		$val->add_field('FGA', 'FGA', 'required|valid_string[numeric]');
		$val->add_field('TPM', 'TPM', 'required|valid_string[numeric]');
		$val->add_field('TPA', 'TPA', 'required|valid_string[numeric]');
		$val->add_field('FTM', 'FTM', 'required|valid_string[numeric]');
		$val->add_field('FTA', 'FTA', 'required|valid_string[numeric]');
		$val->add_field('ORB', 'ORB', 'required|valid_string[numeric]');
		$val->add_field('DRB', 'DRB', 'required|valid_string[numeric]');
		$val->add_field('TRB', 'TRB', 'required|valid_string[numeric]');
		$val->add_field('PF', 'PF', 'required|valid_string[numeric]');
		$val->add_field('AST', 'AST', 'required|valid_string[numeric]');
		$val->add_field('TRN', 'TRN', 'required|valid_string[numeric]');
		$val->add_field('BLK', 'BLK', 'required|valid_string[numeric]');
		$val->add_field('STL', 'STL', 'required|valid_string[numeric]');
		$val->add_field('PTS', 'PTS', 'required|valid_string[numeric]');
		$val->add_field('submitted_date', 'Submitted Date', 'required|max_length[]');
		$val->add_field('updated_date', 'Updated Date', 'required|max_length[]');

		return $val;
	}

}
