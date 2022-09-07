<?php
class Controller_Admin_Game_Type extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Game_Type::query();

		$pagination = Pagination::forge('game_types_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['game_types'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Game_types";
		$this->template->content = View::forge('admin/game/type/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game_type'] = Model_Game_Type::find($id);

		$this->template->title = "Game_type";
		$this->template->content = View::forge('admin/game/type/view', $data);

	}

	public function action_create()
	{
            $fieldset = \Fuel\Core\Fieldset::forge()->add_model('Model_game_type')->repopulate();
            $form     = $fieldset->form();
            $form->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);
            
            if($fieldset->validation()->run() == true)
            {
                $fields = $fieldset->validated();

                $game_type = new Model_Game_Type;
                $game_type->game_type_name = $fields['game_type_name'];
                $game_type->post           = $fields['post'];
                $game_type->conf           = $fields['conf'];
                if ($game_type and $game_type->save())
                {
                    Session::set_flash('success', e('Added game #'.$game_type->id.'.'));

                    Response::redirect('admin/game/edit/'.$game_type->id);
                }
                else
                {
                Session::set_flash('error', e('Could not save game.'));                    
                }
            }

		$this->template->title   = "Game Types";
		$this->template->set('content' , $form->build() , false);

	}

	public function action_edit($id = null)
	{
		$game_type = Model_Game_Type::find($id);
		$val = Model_Game_Type::validate('edit');

		if ($val->run())
		{
			$game_type->id = Input::post('id');
			$game_type->game_type_name = Input::post('game_type_name');
			$game_type->post = Input::post('post');
			$game_type->conf = Input::post('conf');
			$game_type->submitted_date = Input::post('submitted_date');
			$game_type->updated_date = Input::post('updated_date');

			if ($game_type->save())
			{
				Session::set_flash('success', e('Updated game_type #' . $id));

				Response::redirect('admin/game/type');
			}

			else
			{
				Session::set_flash('error', e('Could not update game_type #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game_type->id = $val->validated('id');
				$game_type->game_type_name = $val->validated('game_type_name');
				$game_type->post = $val->validated('post');
				$game_type->conf = $val->validated('conf');
				$game_type->submitted_date = $val->validated('submitted_date');
				$game_type->updated_date = $val->validated('updated_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game_type', $game_type, false);
		}

		$this->template->title = "Game_types";
		$this->template->content = View::forge('admin/game/type/edit');

	}

	public function action_delete($id = null)
	{
		if ($game_type = Model_Game_Type::find($id))
		{
			$game_type->delete();

			Session::set_flash('success', e('Deleted game_type #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game_type #'.$id));
		}

		Response::redirect('admin/game/type');

	}

}
