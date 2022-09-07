<?php
class Controller_Admin_Season_Total_Stat extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Season_Total_Stat::query();

		$pagination = Pagination::forge('season_total_stats_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['season_total_stats'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Season_total_stats";
		$this->template->content = View::forge('admin/season/total/stat/index', $data);
	}

	public function action_view($id = null)
	{
		$data['season_total_stat'] = Model_Season_Total_Stat::find($id);

		$this->template->title = "Season_total_stat";
		$this->template->content = View::forge('admin/season/total/stat/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Season_Total_Stat::validate('create');

			if ($val->run())
			{
				$season_total_stat = Model_Season_Total_Stat::forge([
					'id' => Input::post('id'),
					'season_id' => Input::post('season_id'),
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
					'BLK' => Input::post('BLK'),
					'STL' => Input::post('STL'),
				]);

				if ($season_total_stat and $season_total_stat->save())
				{
					Session::set_flash('success', e('Added season_total_stat #'.$season_total_stat->id.'.'));

					Response::redirect('admin/season/total/stat');
				}

				else
				{
					Session::set_flash('error', e('Could not save season_total_stat.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Season_Total_Stats";
		$this->template->content = View::forge('admin/season/total/stat/create');

	}

	public function action_edit($id = null)
	{
		$season_total_stat = Model_Season_Total_Stat::find($id);
		$val = Model_Season_Total_Stat::validate('edit');

		if ($val->run())
		{
			$season_total_stat->id = Input::post('id');
			$season_total_stat->season_id = Input::post('season_id');
			$season_total_stat->MIN = Input::post('MIN');
			$season_total_stat->FGM = Input::post('FGM');
			$season_total_stat->FGA = Input::post('FGA');
			$season_total_stat->FGP = Input::post('FGP');
			$season_total_stat->TPM = Input::post('TPM');
			$season_total_stat->TPA = Input::post('TPA');
			$season_total_stat->TPP = Input::post('TPP');
			$season_total_stat->FTM = Input::post('FTM');
			$season_total_stat->FTA = Input::post('FTA');
			$season_total_stat->FTP = Input::post('FTP');
			$season_total_stat->ORB = Input::post('ORB');
			$season_total_stat->DRB = Input::post('DRB');
			$season_total_stat->RB = Input::post('RB');
			$season_total_stat->PF = Input::post('PF');
			$season_total_stat->AST = Input::post('AST');
			$season_total_stat->TRN = Input::post('TRN');
			$season_total_stat->BLK = Input::post('BLK');
			$season_total_stat->STL = Input::post('STL');

			if ($season_total_stat->save())
			{
				Session::set_flash('success', e('Updated season_total_stat #' . $id));

				Response::redirect('admin/season/total/stat');
			}

			else
			{
				Session::set_flash('error', e('Could not update season_total_stat #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$season_total_stat->id = $val->validated('id');
				$season_total_stat->season_id = $val->validated('season_id');
				$season_total_stat->MIN = $val->validated('MIN');
				$season_total_stat->FGM = $val->validated('FGM');
				$season_total_stat->FGA = $val->validated('FGA');
				$season_total_stat->FGP = $val->validated('FGP');
				$season_total_stat->TPM = $val->validated('TPM');
				$season_total_stat->TPA = $val->validated('TPA');
				$season_total_stat->TPP = $val->validated('TPP');
				$season_total_stat->FTM = $val->validated('FTM');
				$season_total_stat->FTA = $val->validated('FTA');
				$season_total_stat->FTP = $val->validated('FTP');
				$season_total_stat->ORB = $val->validated('ORB');
				$season_total_stat->DRB = $val->validated('DRB');
				$season_total_stat->RB = $val->validated('RB');
				$season_total_stat->PF = $val->validated('PF');
				$season_total_stat->AST = $val->validated('AST');
				$season_total_stat->TRN = $val->validated('TRN');
				$season_total_stat->BLK = $val->validated('BLK');
				$season_total_stat->STL = $val->validated('STL');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('season_total_stat', $season_total_stat, false);
		}

		$this->template->title = "Season_total_stats";
		$this->template->content = View::forge('admin/season/total/stat/edit');

	}

	public function action_delete($id = null)
	{
		if ($season_total_stat = Model_Season_Total_Stat::find($id))
		{
			$season_total_stat->delete();

			Session::set_flash('success', e('Deleted season_total_stat #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete season_total_stat #'.$id));
		}

		Response::redirect('admin/season/total/stat');

	}

}
