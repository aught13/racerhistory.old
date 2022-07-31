<?php
namespace Model\Career\Per;

class Game extends \Orm\Model
{
	protected static $_properties = [
		'id',
		'person_id',
		'seasons',
		'start',
		'finish',
		'GP',
		'MIN',
		'FGM',
		'FGA',
		'FGP',
		'TPM',
		'TPA',
		'TPP',
		'FTM',
		'FTA',
		'FTP',
		'ORB',
		'DRB',
		'RB',
		'PF',
		'AST',
		'TRN',
		'BLK',
		'STL',
		'PTS',
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
		$val->add_field('person_id', 'Person Id', 'required|valid_string[numeric]');
		$val->add_field('seasons', 'Seasons', 'required|valid_string[numeric]');
		$val->add_field('start', 'Start', 'required|valid_string[numeric]');
		$val->add_field('finish', 'Finish', 'required|valid_string[numeric]');
		$val->add_field('GP', 'GP', 'required');
		$val->add_field('MIN', 'MIN', 'required');
		$val->add_field('FGM', 'FGM', 'required');
		$val->add_field('FGA', 'FGA', 'required');
		$val->add_field('FGP', 'FGP', 'required');
		$val->add_field('TPM', 'TPM', 'required');
		$val->add_field('TPA', 'TPA', 'required');
		$val->add_field('TPP', 'TPP', 'required');
		$val->add_field('FTM', 'FTM', 'required');
		$val->add_field('FTA', 'FTA', 'required');
		$val->add_field('FTP', 'FTP', 'required');
		$val->add_field('ORB', 'ORB', 'required');
		$val->add_field('DRB', 'DRB', 'required');
		$val->add_field('RB', 'RB', 'required');
		$val->add_field('PF', 'PF', 'required');
		$val->add_field('AST', 'AST', 'required');
		$val->add_field('TRN', 'TRN', 'required');
		$val->add_field('BLK', 'BLK', 'required');
		$val->add_field('STL', 'STL', 'required');
		$val->add_field('PTS', 'PTS', 'required');

		return $val;
	}

}
