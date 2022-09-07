<?php
class Controller_Admin_Site_Info extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Site_Info::query();

		$pagination = Pagination::forge('site_infos_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['site_infos'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Site_infos";
		$this->template->content = View::forge('admin/site/info/index', $data);
	}

	public function action_view($id = null)
	{
		$data['site_info'] = Model_Site_Info::find($id);

		$this->template->title = "Site_info";
		$this->template->content = View::forge('admin/site/info/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Site_Info::validate('create');

			if ($val->run())
			{
				$site_info = Model_Site_Info::forge([
					'id' => Input::post('id'),
					'site_id' => Input::post('site_id'),
					'info_key' => Input::post('info_key'),
					'info_value' => Input::post('info_value'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($site_info and $site_info->save())
				{
					Session::set_flash('success', e('Added site_info #'.$site_info->id.'.'));

					Response::redirect('admin/site/info');
				}

				else
				{
					Session::set_flash('error', e('Could not save site_info.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Site_Infos";
		$this->template->content = View::forge('admin/site/info/create');

	}

	public function action_edit($id = null)
	{
		$site_info = Model_Site_Info::find($id);
		$val = Model_Site_Info::validate('edit');

		if ($val->run())
		{
			$site_info->id = Input::post('id');
			$site_info->site_id = Input::post('site_id');
			$site_info->info_key = Input::post('info_key');
			$site_info->info_value = Input::post('info_value');
			$site_info->submitted_date = Input::post('submitted_date');
			$site_info->updated_date = Input::post('updated_date');

			if ($site_info->save())
			{
				Session::set_flash('success', e('Updated site_info #' . $id));

				Response::redirect('admin/site/info');
			}

			else
			{
				Session::set_flash('error', e('Could not update site_info #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$site_info->id = $val->validated('id');
				$site_info->site_id = $val->validated('site_id');
				$site_info->info_key = $val->validated('info_key');
				$site_info->info_value = $val->validated('info_value');
				$site_info->submitted_date = $val->validated('submitted_date');
				$site_info->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('site_info', $site_info, false);
		}

		$this->template->title = "Site_infos";
		$this->template->content = View::forge('admin/site/info/edit');

	}

	public function action_delete($id = null)
	{
		if ($site_info = Model_Site_Info::find($id))
		{
			$site_info->delete();

			Session::set_flash('success', e('Deleted site_info #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete site_info #'.$id));
		}

		Response::redirect('admin/site/info');

	}

}
