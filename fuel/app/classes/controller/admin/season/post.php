<?php
class Controller_Admin_Season_Post extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Season_Post::query();

		$pagination = Pagination::forge('season_posts_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['season_posts'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Season_posts";
		$this->template->content = View::forge('admin/season/post/index', $data);
	}

	public function action_view($id = null)
	{
		$data['season_post'] = Model_Season_Post::find($id);

		$this->template->title = "Season_post";
		$this->template->content = View::forge('admin/season/post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Season_Post::validate('create');

			if ($val->run())
			{
				$season_post = Model_Season_Post::forge([
					'id' => Input::post('id'),
					'season_id' => Input::post('season_id'),
					'post_id' => Input::post('post_id'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($season_post and $season_post->save())
				{
					Session::set_flash('success', e('Added season_post #'.$season_post->id.'.'));

					Response::redirect('admin/season/post');
				}

				else
				{
					Session::set_flash('error', e('Could not save season_post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Season_Posts";
		$this->template->content = View::forge('admin/season/post/create');

	}

	public function action_edit($id = null)
	{
		$season_post = Model_Season_Post::find($id);
		$val = Model_Season_Post::validate('edit');

		if ($val->run())
		{
			$season_post->id = Input::post('id');
			$season_post->season_id = Input::post('season_id');
			$season_post->post_id = Input::post('post_id');
			$season_post->submitted_date = Input::post('submitted_date');
			$season_post->updated_date = Input::post('updated_date');

			if ($season_post->save())
			{
				Session::set_flash('success', e('Updated season_post #' . $id));

				Response::redirect('admin/season/post');
			}

			else
			{
				Session::set_flash('error', e('Could not update season_post #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$season_post->id = $val->validated('id');
				$season_post->season_id = $val->validated('season_id');
				$season_post->post_id = $val->validated('post_id');
				$season_post->submitted_date = $val->validated('submitted_date');
				$season_post->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('season_post', $season_post, false);
		}

		$this->template->title = "Season_posts";
		$this->template->content = View::forge('admin/season/post/edit');

	}

	public function action_delete($id = null)
	{
		if ($season_post = Model_Season_Post::find($id))
		{
			$season_post->delete();

			Session::set_flash('success', e('Deleted season_post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete season_post #'.$id));
		}

		Response::redirect('admin/season/post');

	}

}
