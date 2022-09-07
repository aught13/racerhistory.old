<?php

namespace Controller;

class Players extends \Controller\Base {

    public function action_index() {
        //TODO add functionality for old links
        if (\Input::method() == 'POST' && !empty(\Input::post('name')) || !empty(\Input::post('year'))) {
            $val = \Model\Players::validate_search('search');
            if ($val->run()) {
                if (!empty($val->validated('name'))) {
                    if (!$data['result'] = \Model\Players::search_name($val->validated('name'))) {
                        \Session::set_flash('error', 'Oops!  Unfortunately, we did not find anything that matched your search.  Please try again.');
                        \Response::redirect('players');
                    }
                }
                if (!empty($val->validated('year'))) {
                    if (!$data['result'] = \Model\Players::search_year($val->validated('year'))) {
                        \Session::set_flash('error', 'Oops!  Unfortunately, we did not find anything that matched your search.  Please try again.');
                        \Response::redirect('players');
                    }
                }
                $this->template->title = "Results";
                $this->template->content = \View::forge('players/index', $data);
            } else {
                \Session::set_flash('error', 'Invalid Search');
                \Response::redirect('players');
            }
        } else {


            $this->template->title = "Search Players";
            $this->template->content = \View::forge('players/index');
        }
    }

    public function action_view($id = null) {
        is_null($id) and \Response::redirect('players');
        if (!$data = \Model\Players::view_player($id)) {
            \Session::set_flash('error', 'Could not find person');
        }
        if (!$data2['player_season_stats'] = \Model\Statistics::get_plr_season($id)) {
            \Session::set_flash('error', 'Could not find Stats');
        }
        if (!$data2['player_career_stats'] = \Model\Statistics::get_plr_career($id)) {
            \Session::set_flash('error', 'Could not find Stats');
        }
        $this->template->title = "";
        $this->template->content = \View::forge('players/view', ['person' => $data], false);
        $this->template->content2 = \View::forge('stats/player', ['stats' => $data2]);
        $this->template->content3 = \View::forge('players/bio', ['story' => $data], false);
    }

}
