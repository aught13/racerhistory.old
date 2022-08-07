<?php
namespace Controller;

class Games extends \Controller\Base
{

    public function action_index()
    {
        $query = \Model\Game::query()->related(['game_type', 'opponent', 'site'])->order_by('game_date', 'desc');

        $data['games'] = $query->get();

        $this->template->title   = "Games";
        $this->template->content = \View::forge('games/index', $data);
    }

    public function action_view($id = null)
    {
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
