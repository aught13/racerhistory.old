<?php
class Controller_Admin_Game_Datum extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Game_Datum::query();

		$pagination = Pagination::forge('game_data_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['game_data'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Game_data";
		$this->template->content = View::forge('admin/game/datum/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game_datum'] = Model_Game_Datum::find($id);

		$this->template->title = "Game_datum";
		$this->template->content = View::forge('admin/game/datum/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Game_Datum::validate('create');

			if ($val->run())
			{
				$game_datum = Model_Game_Datum::forge([
					'id' => Input::post('id'),
					'game_id' => Input::post('game_id'),
					'data_key' => Input::post('data_key'),
					'data_value' => Input::post('data_value'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($game_datum and $game_datum->save())
				{
					Session::set_flash('success', e('Added game_datum #'.$game_datum->id.'.'));

					Response::redirect('admin/game/datum');
				}

				else
				{
					Session::set_flash('error', e('Could not save game_datum.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Game_Data";
		$this->template->content = View::forge('admin/game/datum/create');

	}

	public function action_edit($id = null)
	{
		$game_datum = Model_Game_Datum::find($id);
		$val = Model_Game_Datum::validate('edit');

		if ($val->run())
		{
			$game_datum->id = Input::post('id');
			$game_datum->game_id = Input::post('game_id');
			$game_datum->data_key = Input::post('data_key');
			$game_datum->data_value = Input::post('data_value');
			$game_datum->submitted_date = Input::post('submitted_date');
			$game_datum->updated_date = Input::post('updated_date');

			if ($game_datum->save())
			{
				Session::set_flash('success', e('Updated game_datum #' . $id));

				Response::redirect('admin/game/datum');
			}

			else
			{
				Session::set_flash('error', e('Could not update game_datum #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game_datum->id = $val->validated('id');
				$game_datum->game_id = $val->validated('game_id');
				$game_datum->data_key = $val->validated('data_key');
				$game_datum->data_value = $val->validated('data_value');
				$game_datum->submitted_date = $val->validated('submitted_date');
				$game_datum->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game_datum', $game_datum, false);
		}

		$this->template->title = "Game_data";
		$this->template->content = View::forge('admin/game/datum/edit');

	}

	public function action_delete($id = null)
	{
		if ($game_datum = Model_Game_Datum::find($id))
		{
			$game_datum->delete();

			Session::set_flash('success', e('Deleted game_datum #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game_datum #'.$id));
		}

		Response::redirect('admin/game/datum');

	}

}
