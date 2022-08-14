<?php
namespace Controller\Admin;

class Opponent extends \Controller\Admin
{

	public function action_index()
	{
		$query = \Model\Opponent::query();

		$pagination = \Pagination::forge('opponents_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['opponents'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Opponents";
		$this->template->content = \View::forge('admin/opponent/index', $data);
	}

	public function action_view($id = null)
	{
		$data['opponent'] = \Model\Opponent::find($id);

		$this->template->title = "Opponent";
		$this->template->content = \View::forge('admin/opponent/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Opponent::validate('create');

			if ($val->run())
			{
				$opponent = Model_Opponent::forge([
					'opponent_name' => Input::post('opponent_name'),
					'opponent_mascot' => Input::post('opponent_mascot'),
					'opponent_current' => Input::post('opponent_current'),
				]);

				if ($opponent and $opponent->save())
				{
					Session::set_flash('success', e('Added opponent #'.$opponent->id.'.'));

					Response::redirect('admin/opponent');
				}

				else
				{
					Session::set_flash('error', e('Could not save opponent.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Opponents";
		$this->template->content = View::forge('admin/opponent/create');

	}

	public function action_edit($id = null)
	{
		$opponent = \Model\Opponent::find($id);
		$val = \Model\Opponent::validate('edit');

		if ($val->run())
		{
			$opponent->id = \Input::post('id');
			$opponent->opponent_name = \Input::post('opponent_name');
			$opponent->opponent_mascot = \Input::post('opponent_mascot');
			$opponent->opponent_current = \Input::post('opponent_current');
			$opponent->submitted_date = \Input::post('submitted_date');
			$opponent->updated_date = \Input::post('updated_date');

			if ($opponent->save())
			{
				\Session::set_flash('success', e('Updated opponent #' . $id));

				\Response::redirect('admin/opponent');
			}

			else
			{
				\Session::set_flash('error', e('Could not update opponent #' . $id));
			}
		}

		else
		{
			if (\Input::method() == 'POST')
			{
				$opponent->id = $val->validated('id');
				$opponent->opponent_name = $val->validated('opponent_name');
				$opponent->opponent_mascot = $val->validated('opponent_mascot');
				$opponent->opponent_current = $val->validated('opponent_current');
				$opponent->submitted_date = $val->validated('submitted_date');
				$opponent->updated_date = $val->validated('updated_date');

				\Session::set_flash('error', $val->error());
			}

			$this->template->set_global('opponent', $opponent, false);
		}

		$this->template->title = "Opponents";
		$this->template->content = \View::forge('admin/opponent/edit');

	}

	public function action_delete($id = null)
	{
		if ($opponent = \Model_Opponent::find($id))
		{
			$opponent->delete();

			\Session::set_flash('success', e('Deleted opponent #'.$id));
		}

		else
		{
			\Session::set_flash('error', e('Could not delete opponent #'.$id));
		}

		\Response::redirect('admin/opponent');

	}

}
