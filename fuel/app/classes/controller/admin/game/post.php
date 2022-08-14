<?php
class Controller_Admin_Game_Post extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Game_Post::query();

		$pagination = Pagination::forge('game_posts_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['game_posts'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Game_posts";
		$this->template->content = View::forge('admin/game/post/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game_post'] = Model_Game_Post::find($id);

		$this->template->title = "Game_post";
		$this->template->content = View::forge('admin/game/post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Game_Post::validate('create');

			if ($val->run())
			{
				$game_post = Model_Game_Post::forge([
					'id' => Input::post('id'),
					'game_id' => Input::post('game_id'),
					'post_id' => Input::post('post_id'),
					'submitted_date' => Input::post('submitted_date'),
					'updated_date' => Input::post('updated_date'),
				]);

				if ($game_post and $game_post->save())
				{
					Session::set_flash('success', e('Added game_post #'.$game_post->id.'.'));

					Response::redirect('admin/game/post');
				}

				else
				{
					Session::set_flash('error', e('Could not save game_post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Game_Posts";
		$this->template->content = View::forge('admin/game/post/create');

	}

	public function action_edit($id = null)
	{
		$game_post = Model_Game_Post::find($id);
		$val = Model_Game_Post::validate('edit');

		if ($val->run())
		{
			$game_post->id = Input::post('id');
			$game_post->game_id = Input::post('game_id');
			$game_post->post_id = Input::post('post_id');
			$game_post->submitted_date = Input::post('submitted_date');
			$game_post->updated_date = Input::post('updated_date');

			if ($game_post->save())
			{
				Session::set_flash('success', e('Updated game_post #' . $id));

				Response::redirect('admin/game/post');
			}

			else
			{
				Session::set_flash('error', e('Could not update game_post #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game_post->id = $val->validated('id');
				$game_post->game_id = $val->validated('game_id');
				$game_post->post_id = $val->validated('post_id');
				$game_post->submitted_date = $val->validated('submitted_date');
				$game_post->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game_post', $game_post, false);
		}

		$this->template->title = "Game_posts";
		$this->template->content = View::forge('admin/game/post/edit');

	}

	public function action_delete($id = null)
	{
		if ($game_post = Model_Game_Post::find($id))
		{
			$game_post->delete();

			Session::set_flash('success', e('Deleted game_post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game_post #'.$id));
		}

		Response::redirect('admin/game/post');

	}

}
