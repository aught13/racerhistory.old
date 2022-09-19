<?php

/**
 * Ajax controller for racerhistory.com
 * 
 * @author Patrick Foltz
 * 
 */

namespace Controller;

/**
 * 
 * @author patrick
 */
class ajax extends \Controller\Base
{   
    public function post_games()
    {
        $data = \Model\Game::query()->related(['game_type', 'opponent', 'site'])->order_by('game_date', 'ASC')->get();
        
        $i=1;

        foreach ($data as $item) {
            
            $response[] = [
                'num'       => $i,
                'season'    => $item->season,
                'date'      => date_format(date_create($item->game_date), 'Y-m-d'),
                'mur_rk'    => (isset($item->mur_rank) ? $item->mur_rank : ''),
                'opponent'  => $item->opponent->opponent_name,
                'opp_rk'    => (isset($item->opp_rank) ? $item->opp_rank : ''),
                'location'  => $item->site->site_name.', '.$item->site->site_state,
                'court'     => ($item->hrn == 1 ? 'Home' : ($item->hrn == 2 ? 'Road' : 'Neutral')),
                'post'      => ($item->post == 0 ? 'N' : 'Y'),
                'wl'        => ($item->w == 1 ? 'W' : ($item->l == 1 ? 'L' : '')),
                'pts_mur'   => $item->pts_mur,
                'pts_opp'   => $item->pts_opp,
                'ot'        => (isset($item->overtime) ? ($item->overtime > 1 ? " ".$item->overtime."OT" : " OT") : "" ),
                'type'      => $item->game_type->game_type_name,
                'link'      => \Html::anchor('games/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm'))
            ];
            
        $i++;
            
        }
        
        return $this->response($response, $http_code=200);
    }
}
