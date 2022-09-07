<?php
/**
 * FuelPhp Seasons controller for racerhistory.com
 * 
 * @author Patrick Foltz
 * @todo add functionality for old links with action_get() method
 */
namespace Controller;

class Seasons extends \Controller\Base
{

    /**
     * /seasons/index controller 
     * 
     * Retrieve basic season information and records for all seasons, send them 
     * to, and generate the view template 
     */
    
    public function action_index() {
        $record = \Model\Season::get_season_record();
        $this->template->title = "Seasons";
        $this->template->content = \View::forge('seasons/index', ['record' => $record]);
    }

    /**
     * /seasons/view/(id) controller
     * 
     * Retrieve all season information, records, games, roster, and stats for an
     *  individual season, send them to, and generate the view template 
     * 
     * @param int $id Season Id to be searched by
     */
    public function action_view($id = null) {
        is_null($id) and \Response::redirect('seasons');
        
        if ( ! $data = \Model\Season::get_season_info($id)) 
        {
            \Session::set_flash('error', 'Could not find season_info #'.$id);
            \Response::redirect('seasons');
        }
        if ( ! $record = \Model\Season::get_season_record($id)) {
            \Session::set_flash('error', 'Could not find season');
            \Response::redirect('seasons');
        }
        if ( ! $games = \Model\Game::Season_Games($id)) {
            \Session::set_flash('error', 'Could not find games');
            \Response::redirect('seasons');
        }
        \Session::set('nav', $id);
        $nav['from'] = intval(\Model\Season::get_from());
        $nav['till'] = intval(\Model\Season::get_till());
        $nav['season'] = intval($id);
        $this->template->title = "";
        $this->template->sidenav = \View::forge('seasons/sidenav', $nav);
        $this->template->content = \View::forge('seasons/view', ['record' => $record , 'season_info' => $data, 'games' => $games]);
    }

}
