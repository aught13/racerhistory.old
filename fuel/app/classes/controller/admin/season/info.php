<?php
class Controller_Admin_Season_Info extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Season_Info::query();

		$pagination = Pagination::forge('season_infos_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['season_infos'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Season_infos";
		$this->template->content = View::forge('admin/season/info/index', $data);
	}

	public function action_view($id = null)
	{
		$data['season_info'] = Model_Season_Info::find($id);

		$this->template->title = "Season_info";
		$this->template->content = View::forge('admin/season/info/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Season_Info::validate('create');

			if ($val->run())
			{
				$season_info = Model_Season_Info::forge([
					'id' => Input::post('id'),
					'season' => Input::post('season'),
					'fin' => Input::post('fin'),
					'notes' => Input::post('notes'),
					'img' => Input::post('img'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($season_info and $season_info->save())
				{
					Session::set_flash('success', e('Added season_info #'.$season_info->id.'.'));

					Response::redirect('admin/season/info');
				}

				else
				{
					Session::set_flash('error', e('Could not save season_info.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Season_Infos";
		$this->template->content = View::forge('admin/season/info/create');

	}

	public function action_edit($id = null)
	{
		$season_info = Model_Season_Info::find($id);
		$val = Model_Season_Info::validate('edit');

		if ($val->run())
		{
			$season_info->id = Input::post('id');
			$season_info->season = Input::post('season');
			$season_info->fin = Input::post('fin');
			$season_info->notes = Input::post('notes');
			$season_info->img = Input::post('img');
			$season_info->submitted_date = Input::post('submitted_date');
			$season_info->updated_date = Input::post('updated_date');

			if ($season_info->save())
			{
				Session::set_flash('success', e('Updated season_info #' . $id));

				Response::redirect('admin/season/info');
			}

			else
			{
				Session::set_flash('error', e('Could not update season_info #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$season_info->id = $val->validated('id');
				$season_info->season = $val->validated('season');
				$season_info->fin = $val->validated('fin');
				$season_info->notes = $val->validated('notes');
				$season_info->img = $val->validated('img');
				$season_info->submitted_date = $val->validated('submitted_date');
				$season_info->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('season_info', $season_info, false);
		}

		$this->template->title = "Season_infos";
		$this->template->content = View::forge('admin/season/info/edit');

	}

	public function action_delete($id = null)
	{
		if ($season_info = Model_Season_Info::find($id))
		{
			$season_info->delete();

			Session::set_flash('success', e('Deleted season_info #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete season_info #'.$id));
		}

		Response::redirect('admin/season/info');

	}

}
