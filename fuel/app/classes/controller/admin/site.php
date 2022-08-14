<?php
class Controller_Admin_Site extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Site::query();

		$pagination = Pagination::forge('sites_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['sites'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Sites";
		$this->template->content = View::forge('admin/site/index', $data);
	}

	public function action_view($id = null)
	{
		$data['site'] = Model_Site::find($id);

		$this->template->title = "Site";
		$this->template->content = View::forge('admin/site/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Site::validate('create');

			if ($val->run())
			{
				$site = Model_Site::forge([
					'id' => Input::post('id'),
					'site_name' => Input::post('site_name'),
					'site_state' => Input::post('site_state'),
					'site_arena' => Input::post('site_arena'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($site and $site->save())
				{
					Session::set_flash('success', e('Added site #'.$site->id.'.'));

					Response::redirect('admin/site');
				}

				else
				{
					Session::set_flash('error', e('Could not save site.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('admin/site/create');

	}

	public function action_edit($id = null)
	{
		$site = Model_Site::find($id);
		$val = Model_Site::validate('edit');

		if ($val->run())
		{
			$site->id = Input::post('id');
			$site->site_name = Input::post('site_name');
			$site->site_state = Input::post('site_state');
			$site->site_arena = Input::post('site_arena');
			$site->submitted_date = Input::post('submitted_date');
			$site->updated_date = Input::post('updated_date');

			if ($site->save())
			{
				Session::set_flash('success', e('Updated site #' . $id));

				Response::redirect('admin/site');
			}

			else
			{
				Session::set_flash('error', e('Could not update site #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$site->id = $val->validated('id');
				$site->site_name = $val->validated('site_name');
				$site->site_state = $val->validated('site_state');
				$site->site_arena = $val->validated('site_arena');
				$site->submitted_date = $val->validated('submitted_date');
				$site->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('site', $site, false);
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('admin/site/edit');

	}

	public function action_delete($id = null)
	{
		if ($site = Model_Site::find($id))
		{
			$site->delete();

			Session::set_flash('success', e('Deleted site #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete site #'.$id));
		}

		Response::redirect('admin/site');

	}

}
