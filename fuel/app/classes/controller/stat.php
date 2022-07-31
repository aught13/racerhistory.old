<?php
namespace Controller;

class Stat extends \Controller\Base
{

	public function action_index()
	{

		$data['player_season_stats'] = \Model\Full\Season\Stat::find('all', [
                    'related' => ['person', 'season_info'],
                    'order_by' => ['PTS'=> 'desc'],
                ]);
		$this->template->title = "Single Season Stats";
		$this->template->content = \View::forge('stat/index', $data);
                $this->template->sidenav = \View::forge('stat/sidenav');

	}

        public function action_sort($sort = null, $direction = null) 
        {
                is_null($sort) and \Fuel\Core\Response::redirect('stat');
                is_null($direction) and \Fuel\Core\Response::redirect('stat');
            	$data['player_season_stats'] = \Model\Player\Season\Stat::find('all', [
                    'related' => ['person'],
                    'order_by' => [$sort=>$direction],
                ]);
                $data['sort'] = $sort;
                $data['direction'] = $direction;
		$this->template->title = "Individual Season Stats";
		$this->template->content = \View::forge('stat/index', $data);
                $this->template->sidenav = \View::forge('stat/sidenav');
        }
        
        public function action_career()
	{

		$data['player_season_stats'] = \Model\Player\Career\Stat::find('all', [
                    'related' => ['person'],
                    'order_by' => ['PTS'=> 'desc'],
                    ]);
                $data['flag'] = "career";
		$this->template->title = "Career Stats";
		$this->template->content = \View::forge('stat/index', $data);
                $this->template->sidenav = \View::forge('stat/sidenav');

	}

}
