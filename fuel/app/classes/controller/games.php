<?php
namespace Controller;

class Games extends \Controller\Base
{

    public function action_index()
    {
        $this->template->title   = "Games";
        $this->template->content = \View::forge('games/index');
        \Session::set('nav', NULL);
    }

    public function action_view($id = null)
    {
        is_null($id) and \Response::redirect('games');
        $data['game'] = \Model\Game::find($id, [
            'related' => [
                'game_type',
                'opponent', 
                'site',
                'game_post' => [
                    'related' => [
                        'post'
                        ],
                    'order_by' => [
                        'submitted_date' => 'desc'
                        ]
                    ]
                ]
            ]);
        $this->template->title   = "Game";
        $this->template->content = \View::forge('games/view', $data, false);

    }
}
