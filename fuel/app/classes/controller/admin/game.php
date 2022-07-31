<?php
namespace Controller\Admin;

class Game extends \Controller\Admin
{

	public function action_index()
	{
		$query = \Model\Game::query()->related(['game_type', 'opponent', 'site'])->order_by('game_date', 'desc');

		$pagination = \Pagination::forge('games_pagination', [
			'total_items' => $query->count(),
			'uri_segment' => 'page',
                        'show_first'  => 'true',
                        'show_last'   => 'true'
		]);

		$data['games'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Games";
		$this->template->content = \View::forge('admin/game/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game'] = \Model\Game::find($id);

		$this->template->title   = "Game";
		$this->template->content = \View::forge('admin/game/view', $data);

	}

	public function action_create()
	{
            $fieldset = \Fuel\Core\Fieldset::forge('game')->add_model('model\game')->repopulate();

            $form     = $fieldset->form();
            $new      = $this->createNew($fieldset->validation()->input(), $form);
            
            
            $seasons  = \Model\Season\Info::menuSeasons();
            $types    = \Model\Game\Type::menuTypes();
            $opponent = \Model\Opponent::menuOpponent();
            $sites    = \Model\Site::menuSites();
            
            $new->field('season')->set_options($seasons);
            $new->field('game_type_id')->set_options($types);
            $new->field('opponent_id')->set_options($opponent);
            $new->field('site_id')->set_options($sites);
            $new->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);
            
             
            if($fieldset->validation()->run() == true)
            {
                $fields = $fieldset->validated();
                
                if($this->gameValidation($fields) == true)
                {

                    $game = new \Model\Game;
                    $game->season       = $fields['season'];
                    $game->game_date    = $fields['game_date'];
                    $game->game_type_id = $fields['game_type_id'];
                    $game->opponent_id  = $fields['opponent_id'];
                    $game->site_id      = $fields['site_id'];
                    $game->hrn          = $fields['hrn'];
                    $game->post         = $fields['post'];
                    $game->w            = $fields['w'];
                    $game->l            = $fields['l'];                    
                    $game->pts_mur      = $fields['pts_mur'];
                    $game->pts_opp      = $fields['pts_opp'];

                }

                if ((isset($game)) && ($game->save()))
                {
                    \Session::set_flash('success', e('Added game #'.$game->id.'.'));

                    \Response::redirect('admin/game/edit/'.$game->id);
                }
                else
                {
                \Session::set_flash('error', e('Could not save game.'));                    
                }
                
            }
            else
            {
                \Session::set_flash('error', e($fieldset->validation()->error()));
                
            }
            
            $this->template->title = "New Game";
            $this->template->set('content', $new->build(), false); 
        }


	public function action_edit($id = null)
	{

            if ($id == null)
            {
                \Session::set_flash('error', e('Select a game to edit!'));

                \Response::redirect('admin/game');
            }
            else
            {
                $game     = \Model\Game::find($id, ['realted' => ['game_meta']]);
                $fieldset = \Fuel\Core\Fieldset::forge()->add_model('model\game');
            }
            
            $fieldset->add_before('mur_rank', 'Murray Rank', [], [], 'opponent_id');
            $fieldset->add_after('opp_rank', 'Opponent Rank', [], [], 'mur_rank');
            
            if (\Input::method() == 'POST')
            {
                $fieldset->repopulate();
            }
            else 
            {
            $fieldset->populate($game);
            }
            $form     = $fieldset->form();
            $new      = $this->createNew($fieldset->validation()->input(), $form);
            $seasons  = \Model\Season\Info::menuSeasons();
            $types    = \Model\Game\Type::menuTypes();
            $opponent = \Model\Opponent::menuOpponent();
            $sites    = \Model\Site::menuSites();
            
            $new->field('season')->set_options($seasons);
            $new->field('game_type_id')->set_options($types);
            $new->field('opponent_id')->set_options($opponent);
            $new->field('site_id')->set_options($sites);

            $new->add('submit', '', ['type' => 'submit', 'value' => 'Save', 'class' => 'btn medium primary']);
            
             
            if($fieldset->validation()->run() == true)
            {
                
                $fields = $fieldset->validated();
                $fields = $this->metaValidation($fields);
                
                $game->season       = $fields['season'];
                $game->game_date    = $fields['game_date'];
                $game->game_type_id = $fields['game_type_id'];
                $game->opponent_id  = $fields['opponent_id'];
                $game->site_id      = $fields['site_id'];
                $game->hrn          = $fields['hrn'];
                $game->post         = $fields['post'];
                $game->w            = $fields['w'];
                $game->l            = $fields['l'];
                $game->pts_mur      = $fields['pts_mur'];
                $game->pts_opp      = $fields['pts_opp'];
                $game->mur_rank     = $fields['mur_rank'];
                $game->opp_rank     = $fields['opp_rank'];

                if ($game->save())
                {
                    
                    \Session::set_flash('success', e('Saved game #'.$game->id.'.'));

                    \Response::redirect('admin/game/edit/'.$game->id);
                }
                else
                {
                    \Session::set_flash('error', e('Could not save game.'));

                    \Response::redirect('admin/game/edit/'.$game->id,true);                    
                }
            }

            else
            {
              
                    \Session::set_flash('error', e($fieldset->validation()->error()));
            }
            
            $this->template->title = "Edit Game";
            $this->template->set('content', $new->build(), false); 
        }

	public function action_delete($id = null)
	{
		if ($game = \Model\Game::find($id))
		{
			$game->delete();

			\Session::set_flash('success', e('Deleted game #'.$id));
		}

		else
		{
			\Session::set_flash('error', e('Could not delete game #'.$id));
		}

		\Response::redirect('admin/game');

	}
        
        private function createNew($param , $form) 
        {
            foreach ($param as $key => $value) {
                if ($value == "NEW")
                {
                    if ($key == "season")
                    {
                        $newfieldset->add_model('model\season\info');
                    }
                    else
                    {
                        $trim     = str_replace("_id", "", $key);
                        $model    = '\\model\\'.$trim;
                        $fieldset = \Fuel\Core\Fieldset::forge($trim)->add_model('model\\'.$trim)->repopulate();
                        
                        if($fieldset->validation()->run() == true)
                        {
                            $fields = $fieldset->validated();

                            $new = new $model;

                            foreach ($fields as $field => $value) 
                            {
                                $new->$field = $value;
                            }

                            if ($new and $new->save())
                            {
                                \Session::set_flash('success', e('Added game type #'.$new->id.'.'));

                                $form->field($key)->set_value($new->id);
                                $form->add('new' , '' , ['type' => 'hidden', 'value' => 'true']);
                            }
                        }
                        else
                        {                        
                        $form->add($fieldset);
                        }
                    }
                }
            }
            
            return $form;
        }
        
        private function gameValidation($param) 
        {
            $pass = true;
            if (($param ['w'] == 1) && ($param ['l'] == 1))
            {
                $pass = false;
            }   
            elseif (($param ['w'] == 1) && ($param ['pts_opp'] > $param ['pts_mur'])) 
            {
                $pass = false;
            }   
            elseif (($param ['l'] == 0) && ($param ['w'] == 0) ) 
            {
                $pass = false;
            }   
            elseif (($param ['l'] == 1) && ($param ['pts_opp'] < $param ['pts_mur']))
            {
                $pass = false;
            }
            return $pass;
        }
        
        private function metaValidation($param) 
        {
            if ((!is_numeric($param ['mur_rank'])) || ($param ['mur_rank'] < 0))
            {
                $param ['mur_rank'] = null;
            }
            if ((!is_numeric($param ['opp_rank'])) || ($param ['opp_rank'] < 0))
            {
                $param ['opp_rank'] = null;
            }
            
            return $param;
        }
}

