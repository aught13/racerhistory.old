<?php
class Controller_Admin_Player_Season_Stat extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Player_Season_Stat::query();

		$pagination = Pagination::forge('player_season_stats_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['player_season_stats'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Player_season_stats";
		$this->template->content = View::forge('admin/player/season/stat/index', $data);
	}

	public function action_view($id = null)
	{
		$data['player_season_stat'] = Model_Player_Season_Stat::find($id);

		$this->template->title = "Player_season_stat";
		$this->template->content = View::forge('admin/player/season/stat/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Player_Season_Stat::validate('create');

			if ($val->run())
			{
				$player_season_stat = Model_Player_Season_Stat::forge([
					'id' => Input::post('id'),
					'person_id' => Input::post('person_id'),
					'season_id' => Input::post('season_id'),
					'GP' => Input::post('GP'),
					'GS' => Input::post('GS'),
					'MIN' => Input::post('MIN'),
					'FGM' => Input::post('FGM'),
					'FGA' => Input::post('FGA'),
					'TPM' => Input::post('TPM'),
					'TPA' => Input::post('TPA'),
					'FTM' => Input::post('FTM'),
					'FTA' => Input::post('FTA'),
					'ORB' => Input::post('ORB'),
					'DRB' => Input::post('DRB'),
					'RB' => Input::post('RB'),
					'AST' => Input::post('AST'),
					'STL' => Input::post('STL'),
					'BLK' => Input::post('BLK'),
					'TRN' => Input::post('TRN'),
					'PF' => Input::post('PF'),
					'PTS' => Input::post('PTS'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($player_season_stat and $player_season_stat->save())
				{
					Session::set_flash('success', e('Added player_season_stat #'.$player_season_stat->id.'.'));

					Response::redirect('admin/player/season/stat');
				}

				else
				{
					Session::set_flash('error', e('Could not save player_season_stat.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Player_Season_Stats";
		$this->template->content = View::forge('admin/player/season/stat/create');

	}

	public function action_edit($id = null)
	{
		$player_season_stat = Model_Player_Season_Stat::find($id);
		$val = Model_Player_Season_Stat::validate('edit');

		if ($val->run())
		{
			$player_season_stat->id = Input::post('id');
			$player_season_stat->person_id = Input::post('person_id');
			$player_season_stat->season_id = Input::post('season_id');
			$player_season_stat->GP = Input::post('GP');
			$player_season_stat->GS = Input::post('GS');
			$player_season_stat->MIN = Input::post('MIN');
			$player_season_stat->FGM = Input::post('FGM');
			$player_season_stat->FGA = Input::post('FGA');
			$player_season_stat->TPM = Input::post('TPM');
			$player_season_stat->TPA = Input::post('TPA');
			$player_season_stat->FTM = Input::post('FTM');
			$player_season_stat->FTA = Input::post('FTA');
			$player_season_stat->ORB = Input::post('ORB');
			$player_season_stat->DRB = Input::post('DRB');
			$player_season_stat->RB = Input::post('RB');
			$player_season_stat->AST = Input::post('AST');
			$player_season_stat->STL = Input::post('STL');
			$player_season_stat->BLK = Input::post('BLK');
			$player_season_stat->TRN = Input::post('TRN');
			$player_season_stat->PF = Input::post('PF');
			$player_season_stat->PTS = Input::post('PTS');
			$player_season_stat->submitted_date = Input::post('submitted_date');
			$player_season_stat->updated_date = Input::post('updated_date');

			if ($player_season_stat->save())
			{
				Session::set_flash('success', e('Updated player_season_stat #' . $id));

				Response::redirect('admin/player/season/stat');
			}

			else
			{
				Session::set_flash('error', e('Could not update player_season_stat #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$player_season_stat->id = $val->validated('id');
				$player_season_stat->person_id = $val->validated('person_id');
				$player_season_stat->season_id = $val->validated('season_id');
				$player_season_stat->GP = $val->validated('GP');
				$player_season_stat->GS = $val->validated('GS');
				$player_season_stat->MIN = $val->validated('MIN');
				$player_season_stat->FGM = $val->validated('FGM');
				$player_season_stat->FGA = $val->validated('FGA');
				$player_season_stat->TPM = $val->validated('TPM');
				$player_season_stat->TPA = $val->validated('TPA');
				$player_season_stat->FTM = $val->validated('FTM');
				$player_season_stat->FTA = $val->validated('FTA');
				$player_season_stat->ORB = $val->validated('ORB');
				$player_season_stat->DRB = $val->validated('DRB');
				$player_season_stat->RB = $val->validated('RB');
				$player_season_stat->AST = $val->validated('AST');
				$player_season_stat->STL = $val->validated('STL');
				$player_season_stat->BLK = $val->validated('BLK');
				$player_season_stat->TRN = $val->validated('TRN');
				$player_season_stat->PF = $val->validated('PF');
				$player_season_stat->PTS = $val->validated('PTS');
				$player_season_stat->submitted_date = $val->validated('submitted_date');
				$player_season_stat->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('player_season_stat', $player_season_stat, false);
		}

		$this->template->title = "Player_season_stats";
		$this->template->content = View::forge('admin/player/season/stat/edit');

	}

	public function action_delete($id = null)
	{
		if ($player_season_stat = Model_Player_Season_Stat::find($id))
		{
			$player_season_stat->delete();

			Session::set_flash('success', e('Deleted player_season_stat #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete player_season_stat #'.$id));
		}

		Response::redirect('admin/player/season/stat');

	}

}
