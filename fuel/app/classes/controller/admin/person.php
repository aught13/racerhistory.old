<?php
namespace Controller\Admin;

class Person extends \Controller\Admin
{

	public function action_index()
	{
		$query = \Model\Person::query();

		$pagination = Pagination::forge('people_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['people'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "People";
		$this->template->content = View::forge('admin/person/index', $data);
	}

	public function action_view($id = null)
	{
		$data['person'] = Model\Person::find($id);

		$this->template->title = "Person";
		$this->template->content = View::forge('admin/person/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model\Person::validate('create');

			if ($val->run())
			{
				$person = Model\Person::forge([
					'id' => Input::post('id'),
					'first' => Input::post('first'),
					'last' => Input::post('last'),
					'nick' => Input::post('nick'),
					'photo' => Input::post('photo'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($person and $person->save())
				{
					Session::set_flash('success', e('Added person #'.$person->id.'.'));

					Response::redirect('admin/person');
				}

				else
				{
					Session::set_flash('error', e('Could not save person.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "People";
		$this->template->content = View::forge('admin/person/create');

	}

	public function action_edit($id = null)
	{
		$person = Model\Person::find($id);
		$val = Model\Person::validate('edit');

		if ($val->run())
		{
			$person->id = Input::post('id');
			$person->first = Input::post('first');
			$person->last = Input::post('last');
			$person->nick = Input::post('nick');
			$person->photo = Input::post('photo');
			$person->submitted_date = Input::post('submitted_date');
			$person->updated_date = Input::post('updated_date');

			if ($person->save())
			{
				Session::set_flash('success', e('Updated person #' . $id));

				Response::redirect('admin/person');
			}

			else
			{
				Session::set_flash('error', e('Could not update person #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$person->id = $val->validated('id');
				$person->first = $val->validated('first');
				$person->last = $val->validated('last');
				$person->nick = $val->validated('nick');
				$person->photo = $val->validated('photo');
				$person->submitted_date = $val->validated('submitted_date');
				$person->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('person', $person, false);
		}

		$this->template->title = "People";
		$this->template->content = View::forge('admin/person/edit');

	}

	public function action_delete($id = null)
	{
		if ($person = Model_Person::find($id))
		{
			$person->delete();

			Session::set_flash('success', e('Deleted person #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete person #'.$id));
		}

		Response::redirect('admin/person');

	}

}
