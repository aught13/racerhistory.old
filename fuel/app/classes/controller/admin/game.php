<?php

namespace Controller\Admin;

class Game extends \Controller\Admin {

    private $error = [];
    private $fields = [];
    private $form_fields = [
        'season' => [
            'label' => 'Season',
            'form' => ['type' => 'select', 'style' => 'width: 100px;border: none;'],
            'validation' => ['required', 'numeric_between' => [1800, 2800]],
        ],
        'game_date' => [
            'label' => 'Date & Time',
            'form' => ['type' => 'datetime-local'],
            'validation' => ['required'],
        ],
        'game_type_id' => [
            'label' => 'Game Type',
            'form' => ['type' => 'select', 'style' => 'width: 250px;border: none;'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'opponent_id' => [
            'label' => 'Opponent',
            'form' => ['type' => 'select', 'style' => 'width: 200px;border: none;'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'site_id' => [
            'label' => 'Site',
            'form' => ['type' => 'select', 'style' => 'width: 150px;border: none;'],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'hrn' => [
            'label' => 'Home, Road, or Neutral Site',
            'form' => [
                'type' => 'select',
                'options' => [
                    1 => 'Home',
                    2 => 'Road',
                    3 => 'Neutral',
                ],
                'style' => 'width: 100px;border: none;',
            ],
            'validation' => ['required', 'valid_string' => ['numeric']],
        ],
        'post' => [
            'label' => 'Postseason Game?',
            'form' => [
                'type' => 'radio',
                'options' => [
                    1 => 'Y',
                    0 => 'N',
                ],
                'class' => 'w3-radio',
            ],
        ],
        'periods' => [
            'label' => 'Periods',
            'form' => [
                'type' => 'radio',
                'options' => [
                    2 => '2',
                    4 => '4',
                ],
                'class' => 'w3-radio',
                'value' => 2,
            ],
            'default' => 2,
            'validation' => ['required'],
        ],
        'pts_mur' => [
            'data_type' => 'number',
            'form' => ['style' => 'width: 50px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'pts_opp' => [
            'data_type' => 'number',
            'form' => ['style' => 'width: 50px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'overtime' => [
            'data_type' => 'number',
            'form' => ['style' => 'width: 25px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'notes' => [
            'label' => 'notes',
            'form' => ['type' => 'text', 'style' => 'width: 400px;'],
            'validation' => ['valid_string' => [['alpha', 'numeric', 'spaces', 'punctuation', 'dashes']]],
        ],
        'attendance' => [
            'label' => 'Attendance',
            'form' => ['style' => 'width: 75px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'ref1' => [
            'label' => 'Referee',
            'form' => ['style' => 'width: 200px;'],
            'validation' => ['match_pattern' => ['/^([A-Z][a-z]+\s[A-Z][a-z]+){1}|^([A-Z][a-z]+){1}/']],
        ],
        'ref2' => [
            'label' => 'Referee',
            'form' => ['style' => 'width: 200px;'],
            'validation' => ['match_pattern' => ['/^([A-Z][a-z]+\s[A-Z][a-z]+){1}|^([A-Z][a-z]+){1}/']],
        ],
        'ref3' => [
            'label' => 'Referee',
            'form' => ['style' => 'width: 200px;'],
            'validation' => ['match_pattern' => ['/^([A-Z][a-z]+\s[A-Z][a-z]+){1}|^([A-Z][a-z]+){1}/']],
        ],
        'mur_rank' => [
            'data_type' => 'number',
            'form' => ['style' => 'width: 25px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
        'opp_rank' => [
            'data_type' => 'number',
            'form' => ['style' => 'width: 25px;'],
            'validation' => ['valid_string' => ['numeric']],
        ],
    ];

    public function before() {
        parent::before();
        if (!\Auth::check()) {
            \Response::redirect('/');
        }
    }

    public function action_create($season = null) {
        $fieldset = \Fieldset::forge('game');
        $fieldset = parent::set_fields($this->form_fields, $fieldset);
        $fieldset->repopulate();
        $form = $fieldset->form();
        $new = $this->createNew($fieldset->validation()->input(), $form);
        $seasons = \Model\Team\Season::menuSeasons();
        $types = \Model\Game\Type::menuTypes();
        $opponent = \Model\Opponent::menuOpponent();
        $sites = \Model\Site::menuSites();
        (!$season ? $new->field('season')->set_options($seasons) : $new->field('season')->set_options([$season => $season]));
        $new->field('game_type_id')->set_options($types);
        $new->field('opponent_id')->set_options($opponent);
        $new->field('site_id')->set_options($sites);
        $new->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);
        if ($fieldset->validation()->run() == true) {
            $game = new \Model\Game();
            $this->fields = $fieldset->validated();
            $this->metaValidation($this->fields, $game);
            $game->set($this->fields);
            try {
                $game->save();
                if (!$this->error) {
                    \Session::set_flash('error', e($this->error));
                }
                \Session::set_flash('success', 'Game Saved');

                \Response::redirect('admin/game/edit/' . $game->id);
            } catch (Orm\ValidationFailed $e) {
                \Session::set_flash('error', e($e->getMessage()));
                \Response::redirect('admin/game/edit/' . $game->id, true);
            }
        } else {
            \Session::set_flash('error', e($fieldset->validation()->error()));
        }
        $this->template->title = "New Game";
        $this->template->content = \View::forge('admin/game/create', ['form' => $new], false);
    }

    public function action_edit($id = null) {

        if ($id == null) {
            \Session::set_flash('error', e('Select a game to edit!'));

            \Response::redirect('admin/game');
        } else {
            $game = \Model\Game::find($id, ['realted' => ['game_meta']]);
        }

        $fieldset = \Fieldset::forge('game');

        $fieldset = parent::set_fields($this->form_fields, $fieldset);

        if (\Input::method() == 'POST') {
            $fieldset->repopulate();
        } else {
            $fieldset->populate($game);
        }
        $form = $fieldset->form();
        $new = $this->createNew($fieldset->validation()->input(), $form);
        $seasons = \Model\Team\Season::menuSeasons();
        $types = \Model\Game\Type::menuTypes();
        $opponent = \Model\Opponent::menuOpponent();
        $sites = \Model\Site::menuSites();

        $new->field('season')->set_options($seasons);
        $new->field('game_type_id')->set_options($types);
        $new->field('opponent_id')->set_options($opponent);
        $new->field('site_id')->set_options($sites);

        $new->add('submit', '', ['type' => 'submit', 'value' => 'Save', 'class' => 'w3-button']);

        if ($fieldset->validation()->run() == true) {

            $this->fields = $fieldset->validated();
            $this->metaValidation($this->fields, $game);

            $game->set($this->fields);

            try {
                $game->save();

                if (!$this->error) {
                    \Session::set_flash('error', e($this->error));
                }
                \Session::set_flash('success', 'Game Saved');

                \Response::redirect('admin/game/edit/' . $game->id);
            } catch (Orm\ValidationFailed $e) {
                \Session::set_flash('error', e($e->getMessage()));

                \Response::redirect('admin/game/edit/' . $game->id, true);
            }
        } else {

            \Session::set_flash('error', e($fieldset->validation()->error()));
        }

        $this->template->title = "Edit Game";
        $this->template->content = \View::forge('admin/game/edit', ['form' => $new, 'game' => $game->id], false);
    }

    public function action_delete($id = null) {
        if ($game = \Model\Game::find($id)) {
            $game->delete();

            \Session::set_flash('success', e('Deleted game #' . $id));
        } else {
            \Session::set_flash('error', e('Could not delete game #' . $id));
        }

        \Response::redirect_back('', 'refresh');
    }

    private function createNew($param, $form) {
        foreach ($param as $key => $value) {
            if ($value == "NEW") {
                if ($key == "season") {
                    $newfieldset->add_model('model\season\info');
                } else {
                    $trim = str_replace("_id", "", $key);
                    $model = '\\model\\' . $trim;
                    $fieldset = \Fuel\Core\Fieldset::forge($trim)->add_model('model\\' . $trim)->repopulate();

                    if ($fieldset->validation()->run() == true) {
                        $fields = $fieldset->validated();

                        $new = new $model;

                        foreach ($fields as $field => $value) {
                            $new->$field = $value;
                        }

                        if ($new and $new->save()) {
                            \Session::set_flash('success', e('Added game type #' . $new->id . '.'));

                            $form->field($key)->set_value($new->id);
                            $form->add('new', '', ['type' => 'hidden', 'value' => 'true']);
                        }
                    } else {
                        $form->add($fieldset);
                    }
                }
            }
        }

        return $form;
    }

    private function gameValidation($param) {
        $pass = true;
        if ($param ['w'] == 1) {
            $this->fields ['l'] = 0;
        } elseif (($param ['w'] == 1) && ($param ['pts_opp'] > $param ['pts_mur'])) {
            $pass = false;
            $this->error[] = 'W equals 1 but Murray score less than Opponent';
        } elseif ($param ['w'] == 0) {
            $this->fields ['l'] = 1;
        } elseif (($param ['l'] == 1) && ($param ['pts_opp'] < $param ['pts_mur'])) {
            $pass = false;
            $this->error[] = 'L equals 1 but Murray score greater than Opponent';
        }
        return $pass;
    }

    /**
     * metaValidation()
     * 
     * Set only meta values that have a value set, remove values that have been unset
     * Set the W/L flags based off of points
     * 
     * @param array fields
     * @param object($game)
     */
    private function metaValidation($param, $game) {

        foreach ($param as $key => $value) {
            if (empty($value)) {
                if ($key != 'post') {
                unset($this->fields [$key]);
                (isset($game->$key) ? \Model\Game\Meta::query()->where(['game_id' => $game->id, 'info_key' => $key])->delete() : '');
                }
            }
        }
        // Set the w l Flags
        if ($param ['pts_opp'] > $param ['pts_mur']) {
            $this->fields ['l'] = 1;
            $this->fields ['w'] = 0;
        } elseif ($param ['pts_opp'] < $param ['pts_mur']) {
            $this->fields ['l'] = 0;
            $this->fields ['w'] = 1;
        } elseif (empty($param['pts_mur'])) {
            $this->fields ['l'] = 0;
            $this->fields ['w'] = 0;
            $this->fields ['pts_mur'] = null;
            $this->fields ['pts_opp'] = null;
        }
        //We don't want to add the submit value
        unset($this->fields['submit']);
        unset($this->fields ['periods']);
    }

}
