<?php
class Controller_Admin_Player_Career_Stat extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Player_Career_Stat::query();

		$pagination = Pagination::forge('player_career_stats_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['player_career_stats'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Player_career_stats";
		$this->template->content = View::forge('admin/player/career/stat/index', $data);
	}

	public function action_view($id = null)
	{
		$data['player_career_stat'] = Model_Player_Career_Stat::find($id);

		$this->template->title = "Player_career_stat";
		$this->template->content = View::forge('admin/player/career/stat/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Player_Career_Stat::validate('create');

			if ($val->run())
			{
				$player_career_stat = Model_Player_Career_Stat::forge([
					'id' => Input::post('id'),
					'person_id' => Input::post('person_id'),
					'seasons' => Input::post('seasons'),
					'start' => Input::post('start'),
					'finish' => Input::post('finish'),
					'GP' => Input::post('GP'),
					'GS' => Input::post('GS'),
					'MIN' => Input::post('MIN'),
					'FGM' => Input::post('FGM'),
					'FGA' => Input::post('FGA'),
					'FGP' => Input::post('FGP'),
					'TPM' => Input::post('TPM'),
					'TPA' => Input::post('TPA'),
					'TPP' => Input::post('TPP'),
					'FTM' => Input::post('FTM'),
					'FTA' => Input::post('FTA'),
					'FTP' => Input::post('FTP'),
					'ORB' => Input::post('ORB'),
					'DRB' => Input::post('DRB'),
					'RB' => Input::post('RB'),
					'PF' => Input::post('PF'),
					'AST' => Input::post('AST'),
					'TRN' => Input::post('TRN'),
					'ATR' => Input::post('ATR'),
					'BLK' => Input::post('BLK'),
					'STL' => Input::post('STL'),
					'PTS' => Input::post('PTS'),
				]);

				if ($player_career_stat and $player_career_stat->save())
				{
					Session::set_flash('success', e('Added player_career_stat #'.$player_career_stat->id.'.'));

					Response::redirect('admin/player/career/stat');
				}

				else
				{
					Session::set_flash('error', e('Could not save player_career_stat.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Player_Career_Stats";
		$this->template->content = View::forge('admin/player/career/stat/create');

	}

	public function action_edit($id = null)
	{
		$player_career_stat = Model_Player_Career_Stat::find($id);
		$val = Model_Player_Career_Stat::validate('edit');

		if ($val->run())
		{
			$player_career_stat->id = Input::post('id');
			$player_career_stat->person_id = Input::post('person_id');
			$player_career_stat->seasons = Input::post('seasons');
			$player_career_stat->start = Input::post('start');
			$player_career_stat->finish = Input::post('finish');
			$player_career_stat->GP = Input::post('GP');
			$player_career_stat->GS = Input::post('GS');
			$player_career_stat->MIN = Input::post('MIN');
			$player_career_stat->FGM = Input::post('FGM');
			$player_career_stat->FGA = Input::post('FGA');
			$player_career_stat->FGP = Input::post('FGP');
			$player_career_stat->TPM = Input::post('TPM');
			$player_career_stat->TPA = Input::post('TPA');
			$player_career_stat->TPP = Input::post('TPP');
			$player_career_stat->FTM = Input::post('FTM');
			$player_career_stat->FTA = Input::post('FTA');
			$player_career_stat->FTP = Input::post('FTP');
			$player_career_stat->ORB = Input::post('ORB');
			$player_career_stat->DRB = Input::post('DRB');
			$player_career_stat->RB = Input::post('RB');
			$player_career_stat->PF = Input::post('PF');
			$player_career_stat->AST = Input::post('AST');
			$player_career_stat->TRN = Input::post('TRN');
			$player_career_stat->ATR = Input::post('ATR');
			$player_career_stat->BLK = Input::post('BLK');
			$player_career_stat->STL = Input::post('STL');
			$player_career_stat->PTS = Input::post('PTS');

			if ($player_career_stat->save())
			{
				Session::set_flash('success', e('Updated player_career_stat #' . $id));

				Response::redirect('admin/player/career/stat');
			}

			else
			{
				Session::set_flash('error', e('Could not update player_career_stat #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$player_career_stat->id = $val->validated('id');
				$player_career_stat->person_id = $val->validated('person_id');
				$player_career_stat->seasons = $val->validated('seasons');
				$player_career_stat->start = $val->validated('start');
				$player_career_stat->finish = $val->validated('finish');
				$player_career_stat->GP = $val->validated('GP');
				$player_career_stat->GS = $val->validated('GS');
				$player_career_stat->MIN = $val->validated('MIN');
				$player_career_stat->FGM = $val->validated('FGM');
				$player_career_stat->FGA = $val->validated('FGA');
				$player_career_stat->FGP = $val->validated('FGP');
				$player_career_stat->TPM = $val->validated('TPM');
				$player_career_stat->TPA = $val->validated('TPA');
				$player_career_stat->TPP = $val->validated('TPP');
				$player_career_stat->FTM = $val->validated('FTM');
				$player_career_stat->FTA = $val->validated('FTA');
				$player_career_stat->FTP = $val->validated('FTP');
				$player_career_stat->ORB = $val->validated('ORB');
				$player_career_stat->DRB = $val->validated('DRB');
				$player_career_stat->RB = $val->validated('RB');
				$player_career_stat->PF = $val->validated('PF');
				$player_career_stat->AST = $val->validated('AST');
				$player_career_stat->TRN = $val->validated('TRN');
				$player_career_stat->ATR = $val->validated('ATR');
				$player_career_stat->BLK = $val->validated('BLK');
				$player_career_stat->STL = $val->validated('STL');
				$player_career_stat->PTS = $val->validated('PTS');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('player_career_stat', $player_career_stat, false);
		}

		$this->template->title = "Player_career_stats";
		$this->template->content = View::forge('admin/player/career/stat/edit');

	}

	public function action_delete($id = null)
	{
		if ($player_career_stat = Model_Player_Career_Stat::find($id))
		{
			$player_career_stat->delete();

			Session::set_flash('success', e('Deleted player_career_stat #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete player_career_stat #'.$id));
		}

		Response::redirect('admin/player/career/stat');

	}

}
