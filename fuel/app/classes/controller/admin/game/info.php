<?php
class Controller_Admin_Game_Info extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Game_Info::query();

		$pagination = Pagination::forge('game_infos_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['game_infos'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Game_infos";
		$this->template->content = View::forge('admin/game/info/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game_info'] = Model_Game_Info::find($id);

		$this->template->title = "Game_info";
		$this->template->content = View::forge('admin/game/info/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Game_Info::validate('create');

			if ($val->run())
			{
				$game_info = Model_Game_Info::forge([
					'id' => Input::post('id'),
					'game_id' => Input::post('game_id'),
					'info_key' => Input::post('info_key'),
					'info_value' => Input::post('info_value'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($game_info and $game_info->save())
				{
					Session::set_flash('success', e('Added game_info #'.$game_info->id.'.'));

					Response::redirect('admin/game/info');
				}

				else
				{
					Session::set_flash('error', e('Could not save game_info.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Game_Infos";
		$this->template->content = View::forge('admin/game/info/create');

	}

	public function action_edit($id = null)
	{
		$game_info = Model_Game_Info::find($id);
		$val = Model_Game_Info::validate('edit');

		if ($val->run())
		{
			$game_info->id = Input::post('id');
			$game_info->game_id = Input::post('game_id');
			$game_info->info_key = Input::post('info_key');
			$game_info->info_value = Input::post('info_value');
			$game_info->submitted_date = Input::post('submitted_date');
			$game_info->updated_date = Input::post('updated_date');

			if ($game_info->save())
			{
				Session::set_flash('success', e('Updated game_info #' . $id));

				Response::redirect('admin/game/info');
			}

			else
			{
				Session::set_flash('error', e('Could not update game_info #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game_info->id = $val->validated('id');
				$game_info->game_id = $val->validated('game_id');
				$game_info->info_key = $val->validated('info_key');
				$game_info->info_value = $val->validated('info_value');
				$game_info->submitted_date = $val->validated('submitted_date');
				$game_info->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game_info', $game_info, false);
		}

		$this->template->title = "Game_infos";
		$this->template->content = View::forge('admin/game/info/edit');

	}

	public function action_delete($id = null)
	{
		if ($game_info = Model_Game_Info::find($id))
		{
			$game_info->delete();

			Session::set_flash('success', e('Deleted game_info #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game_info #'.$id));
		}

		Response::redirect('admin/game/info');

	}

}
