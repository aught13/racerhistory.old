<?php
class Controller_Admin_Team extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Team::query();

		$pagination = Pagination::forge('teams_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		]);

		$data['teams'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Teams";
		$this->template->content = View::forge('admin/team/index', $data);
	}

	public function action_view($id = null)
	{
		$data['team'] = Model_Team::find($id);

		$this->template->title = "Team";
		$this->template->content = View::forge('admin/team/view', $data);

	}

	public function action_create()
	{
            // Create the fieldset, add the model, repopulate values if needed
            $fieldset = \Fuel\Core\Fieldset::forge('team')->add_model('Model_team');
            $fieldset->populate('Model_team', true);

            // Generate the form
            $form     = $fieldset->form();
            
            // Add a submit button
            $form->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);

            //check for posted values and run validation
            if (Input::method() == 'POST')
            {     
                //check validation create and save model if sucessful, display errors on fail
                if($fieldset->validation()->run() == true)
                {
                    $team = new \Model_Team;
                    
                    $team->team_name = $fieldset->validated('team_name');
                    $team->team_description = $fieldset->validated('team_description');
                    $team->abbr = $fieldset->validated('abbr');
                    $team->gender = $fieldset->validated('gender');

                    //Save the model to the database redirect to edit entry upon success
                    if ($team and $team->save())
                    {
                            Session::set_flash('success', e('Added team #'.$team->id.'.'));

                            Response::redirect('admin/team/edit/'.$team->id);
                    }

                    else
                    {
                            Session::set_flash('error', e('Could not save team.'));
                    }
                }
                else
                {
                        Session::set_flash('error', $fieldset->show_errors());
                }
            }

            //send form to template
            $this->template->title = "New Team";
            $this->template->set('content', $form->build(), false); 

	}

	public function action_edit($id = null)
	{
		$team = Model_Team::find($id);
		$val = Model_Team::validate('edit');

		if ($val->run())
		{
			$team->id = $form->validated('id');
			$team->team_name = $form->validated('team_name');
			$team->team_description = $form->validated('team_description');
			$team->abbr = $form->validated('abbr');
			$team->gender = $form->validated('gender');

			if ($team->save())
			{
				Session::set_flash('success', e('Updated team #' . $id));

				Response::redirect('admin/team');
			}

			else
			{
				Session::set_flash('error', e('Could not update team #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$team->id = $val->validated('id');
				$team->team_name = $val->validated('team_name');
				$team->team_description = $val->validated('team_description');
				$team->abbr = $val->validated('abbr');
				$team->gender = $val->validated('gender');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('team', $team, false);
		}

		$this->template->title = "Teams";
		$this->template->content = View::forge('admin/team/edit');

	}

	public function action_delete($id = null)
	{
		if ($team = Model_Team::find($id))
		{
			$team->delete();

			Session::set_flash('success', e('Deleted team #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete team #'.$id));
		}

		Response::redirect('admin/team');

	}

}
