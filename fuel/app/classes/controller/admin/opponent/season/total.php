<?php
class Controller_Admin_Opponent_Season_Total extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Opponent_Season_Total::query();

		$pagination = Pagination::forge('opponent_season_totals_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['opponent_season_totals'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Opponent_season_totals";
		$this->template->content = View::forge('admin/opponent/season/total/index', $data);
	}

	public function action_view($id = null)
	{
		$data['opponent_season_total'] = Model_Opponent_Season_Total::find($id);

		$this->template->title = "Opponent_season_total";
		$this->template->content = View::forge('admin/opponent/season/total/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Opponent_Season_Total::validate('create');

			if ($val->run())
			{
				$opponent_season_total = Model_Opponent_Season_Total::forge([
					'id' => Input::post('id'),
					'season_id' => Input::post('season_id'),
					'G' => Input::post('G'),
					'MP' => Input::post('MP'),
					'FGM' => Input::post('FGM'),
					'FGA' => Input::post('FGA'),
					'TPM' => Input::post('TPM'),
					'TPA' => Input::post('TPA'),
					'FTM' => Input::post('FTM'),
					'FTA' => Input::post('FTA'),
					'ORB' => Input::post('ORB'),
					'DRB' => Input::post('DRB'),
					'TRB' => Input::post('TRB'),
					'PF' => Input::post('PF'),
					'AST' => Input::post('AST'),
					'TRN' => Input::post('TRN'),
					'BLK' => Input::post('BLK'),
					'STL' => Input::post('STL'),
					'PTS' => Input::post('PTS'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($opponent_season_total and $opponent_season_total->save())
				{
					Session::set_flash('success', e('Added opponent_season_total #'.$opponent_season_total->id.'.'));

					Response::redirect('admin/opponent/season/total');
				}

				else
				{
					Session::set_flash('error', e('Could not save opponent_season_total.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Opponent_Season_Totals";
		$this->template->content = View::forge('admin/opponent/season/total/create');

	}

	public function action_edit($id = null)
	{
		$opponent_season_total = Model_Opponent_Season_Total::find($id);
		$val = Model_Opponent_Season_Total::validate('edit');

		if ($val->run())
		{
			$opponent_season_total->id = Input::post('id');
			$opponent_season_total->season_id = Input::post('season_id');
			$opponent_season_total->G = Input::post('G');
			$opponent_season_total->MP = Input::post('MP');
			$opponent_season_total->FGM = Input::post('FGM');
			$opponent_season_total->FGA = Input::post('FGA');
			$opponent_season_total->TPM = Input::post('TPM');
			$opponent_season_total->TPA = Input::post('TPA');
			$opponent_season_total->FTM = Input::post('FTM');
			$opponent_season_total->FTA = Input::post('FTA');
			$opponent_season_total->ORB = Input::post('ORB');
			$opponent_season_total->DRB = Input::post('DRB');
			$opponent_season_total->TRB = Input::post('TRB');
			$opponent_season_total->PF = Input::post('PF');
			$opponent_season_total->AST = Input::post('AST');
			$opponent_season_total->TRN = Input::post('TRN');
			$opponent_season_total->BLK = Input::post('BLK');
			$opponent_season_total->STL = Input::post('STL');
			$opponent_season_total->PTS = Input::post('PTS');
			$opponent_season_total->submitted_date = Input::post('submitted_date');
			$opponent_season_total->updated_date = Input::post('updated_date');

			if ($opponent_season_total->save())
			{
				Session::set_flash('success', e('Updated opponent_season_total #' . $id));

				Response::redirect('admin/opponent/season/total');
			}

			else
			{
				Session::set_flash('error', e('Could not update opponent_season_total #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$opponent_season_total->id = $val->validated('id');
				$opponent_season_total->season_id = $val->validated('season_id');
				$opponent_season_total->G = $val->validated('G');
				$opponent_season_total->MP = $val->validated('MP');
				$opponent_season_total->FGM = $val->validated('FGM');
				$opponent_season_total->FGA = $val->validated('FGA');
				$opponent_season_total->TPM = $val->validated('TPM');
				$opponent_season_total->TPA = $val->validated('TPA');
				$opponent_season_total->FTM = $val->validated('FTM');
				$opponent_season_total->FTA = $val->validated('FTA');
				$opponent_season_total->ORB = $val->validated('ORB');
				$opponent_season_total->DRB = $val->validated('DRB');
				$opponent_season_total->TRB = $val->validated('TRB');
				$opponent_season_total->PF = $val->validated('PF');
				$opponent_season_total->AST = $val->validated('AST');
				$opponent_season_total->TRN = $val->validated('TRN');
				$opponent_season_total->BLK = $val->validated('BLK');
				$opponent_season_total->STL = $val->validated('STL');
				$opponent_season_total->PTS = $val->validated('PTS');
				$opponent_season_total->submitted_date = $val->validated('submitted_date');
				$opponent_season_total->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('opponent_season_total', $opponent_season_total, false);
		}

		$this->template->title = "Opponent_season_totals";
		$this->template->content = View::forge('admin/opponent/season/total/edit');

	}

	public function action_delete($id = null)
	{
		if ($opponent_season_total = Model_Opponent_Season_Total::find($id))
		{
			$opponent_season_total->delete();

			Session::set_flash('success', e('Deleted opponent_season_total #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete opponent_season_total #'.$id));
		}

		Response::redirect('admin/opponent/season/total');

	}

}
