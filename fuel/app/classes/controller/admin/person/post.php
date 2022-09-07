<?php
class Controller_Admin_Person_Post extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Person_Post::query();

		$pagination = Pagination::forge('person_posts_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['person_posts'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Person_posts";
		$this->template->content = View::forge('admin/person/post/index', $data);
	}

	public function action_view($id = null)
	{
		$data['person_post'] = Model_Person_Post::find($id);

		$this->template->title = "Person_post";
		$this->template->content = View::forge('admin/person/post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Person_Post::validate('create');

			if ($val->run())
			{
				$person_post = Model_Person_Post::forge([
					'id' => Input::post('id'),
					'person_id' => Input::post('person_id'),
					'post_id' => Input::post('post_id'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($person_post and $person_post->save())
				{
					Session::set_flash('success', e('Added person_post #'.$person_post->id.'.'));

					Response::redirect('admin/person/post');
				}

				else
				{
					Session::set_flash('error', e('Could not save person_post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Person_Posts";
		$this->template->content = View::forge('admin/person/post/create');

	}

	public function action_edit($id = null)
	{
		$person_post = Model_Person_Post::find($id);
		$val = Model_Person_Post::validate('edit');

		if ($val->run())
		{
			$person_post->id = Input::post('id');
			$person_post->person_id = Input::post('person_id');
			$person_post->post_id = Input::post('post_id');
			$person_post->submitted_date = Input::post('submitted_date');
			$person_post->updated_date = Input::post('updated_date');

			if ($person_post->save())
			{
				Session::set_flash('success', e('Updated person_post #' . $id));

				Response::redirect('admin/person/post');
			}

			else
			{
				Session::set_flash('error', e('Could not update person_post #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$person_post->id = $val->validated('id');
				$person_post->person_id = $val->validated('person_id');
				$person_post->post_id = $val->validated('post_id');
				$person_post->submitted_date = $val->validated('submitted_date');
				$person_post->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('person_post', $person_post, false);
		}

		$this->template->title = "Person_posts";
		$this->template->content = View::forge('admin/person/post/edit');

	}

	public function action_delete($id = null)
	{
		if ($person_post = Model_Person_Post::find($id))
		{
			$person_post->delete();

			Session::set_flash('success', e('Deleted person_post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete person_post #'.$id));
		}

		Response::redirect('admin/person/post');

	}

}
