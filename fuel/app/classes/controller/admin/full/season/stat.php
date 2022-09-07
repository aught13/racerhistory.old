<?php
class Controller_Admin_Full_Season_Stat extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Full_Season_Stat::query();

		$pagination = Pagination::forge('full_season_stats_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['full_season_stats'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Full_season_stats";
		$this->template->content = View::forge('admin/full/season/stat/index', $data);
	}

	public function action_view($id = null)
	{
		$data['full_season_stat'] = Model_Full_Season_Stat::find($id);

		$this->template->title = "Full_season_stat";
		$this->template->content = View::forge('admin/full/season/stat/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Full_Season_Stat::validate('create');

			if ($val->run())
			{
				$full_season_stat = Model_Full_Season_Stat::forge([
					'id' => Input::post('id'),
					'person_id' => Input::post('person_id'),
					'season_id' => Input::post('season_id'),
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

				if ($full_season_stat and $full_season_stat->save())
				{
					Session::set_flash('success', e('Added full_season_stat #'.$full_season_stat->id.'.'));

					Response::redirect('admin/full/season/stat');
				}

				else
				{
					Session::set_flash('error', e('Could not save full_season_stat.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Full_Season_Stats";
		$this->template->content = View::forge('admin/full/season/stat/create');

	}

	public function action_edit($id = null)
	{
		$full_season_stat = Model_Full_Season_Stat::find($id);
		$val = Model_Full_Season_Stat::validate('edit');

		if ($val->run())
		{
			$full_season_stat->id = Input::post('id');
			$full_season_stat->person_id = Input::post('person_id');
			$full_season_stat->season_id = Input::post('season_id');
			$full_season_stat->GP = Input::post('GP');
			$full_season_stat->GS = Input::post('GS');
			$full_season_stat->MIN = Input::post('MIN');
			$full_season_stat->FGM = Input::post('FGM');
			$full_season_stat->FGA = Input::post('FGA');
			$full_season_stat->FGP = Input::post('FGP');
			$full_season_stat->TPM = Input::post('TPM');
			$full_season_stat->TPA = Input::post('TPA');
			$full_season_stat->TPP = Input::post('TPP');
			$full_season_stat->FTM = Input::post('FTM');
			$full_season_stat->FTA = Input::post('FTA');
			$full_season_stat->FTP = Input::post('FTP');
			$full_season_stat->ORB = Input::post('ORB');
			$full_season_stat->DRB = Input::post('DRB');
			$full_season_stat->RB = Input::post('RB');
			$full_season_stat->PF = Input::post('PF');
			$full_season_stat->AST = Input::post('AST');
			$full_season_stat->TRN = Input::post('TRN');
			$full_season_stat->ATR = Input::post('ATR');
			$full_season_stat->BLK = Input::post('BLK');
			$full_season_stat->STL = Input::post('STL');
			$full_season_stat->PTS = Input::post('PTS');

			if ($full_season_stat->save())
			{
				Session::set_flash('success', e('Updated full_season_stat #' . $id));

				Response::redirect('admin/full/season/stat');
			}

			else
			{
				Session::set_flash('error', e('Could not update full_season_stat #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$full_season_stat->id = $val->validated('id');
				$full_season_stat->person_id = $val->validated('person_id');
				$full_season_stat->season_id = $val->validated('season_id');
				$full_season_stat->GP = $val->validated('GP');
				$full_season_stat->GS = $val->validated('GS');
				$full_season_stat->MIN = $val->validated('MIN');
				$full_season_stat->FGM = $val->validated('FGM');
				$full_season_stat->FGA = $val->validated('FGA');
				$full_season_stat->FGP = $val->validated('FGP');
				$full_season_stat->TPM = $val->validated('TPM');
				$full_season_stat->TPA = $val->validated('TPA');
				$full_season_stat->TPP = $val->validated('TPP');
				$full_season_stat->FTM = $val->validated('FTM');
				$full_season_stat->FTA = $val->validated('FTA');
				$full_season_stat->FTP = $val->validated('FTP');
				$full_season_stat->ORB = $val->validated('ORB');
				$full_season_stat->DRB = $val->validated('DRB');
				$full_season_stat->RB = $val->validated('RB');
				$full_season_stat->PF = $val->validated('PF');
				$full_season_stat->AST = $val->validated('AST');
				$full_season_stat->TRN = $val->validated('TRN');
				$full_season_stat->ATR = $val->validated('ATR');
				$full_season_stat->BLK = $val->validated('BLK');
				$full_season_stat->STL = $val->validated('STL');
				$full_season_stat->PTS = $val->validated('PTS');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('full_season_stat', $full_season_stat, false);
		}

		$this->template->title = "Full_season_stats";
		$this->template->content = View::forge('admin/full/season/stat/edit');

	}

	public function action_delete($id = null)
	{
		if ($full_season_stat = Model_Full_Season_Stat::find($id))
		{
			$full_season_stat->delete();

			Session::set_flash('success', e('Deleted full_season_stat #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete full_season_stat #'.$id));
		}

		Response::redirect('admin/full/season/stat');

	}

}
