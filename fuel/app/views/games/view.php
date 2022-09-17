<meta name="description"
      content="<?= $game->season; ?>,<?= $game->opponent->opponent_name; ?>,<?= $game->site->site_name; ?>, <?= $game->game_date; ?> - Murray State Basketball" />
<meta name="keywords"
      content="<?= $game->season; ?>,<?= $game->opponent->opponent_name; ?>,<?= $game->site->site_name; ?>, <?= $game->game_date; ?>,Murray,Racers,Basketball,NCAA" />

<div class="w3-row">    
    <div class="w3-col w3-container m7 l8 w3-auto">
        <div class="w3-xxlarge w3-center"><?= $game->season - 1; ?>-<?= $game->season; ?> Men's Basketball</div>
        <div class="w3-center"><?= ($game->game_type_id == '17' ? "" : "<span>" . $game->game_type->game_type_name . "</span>"); ?></div>
        <div class="w3-xlarge w3-row w3-topbar w3-bottombar">
            <table class="w3-table w3-centered">
                <tbody style="line-height: .5;">
                    <tr>
                        <td><?= (isset($game->mur_rank) ? '#' . $game->mur_rank . ' ' : ''); ?>MURRAY ST</td>               
                        <td><?= (($game->hrn == 1) || ($game->hrn == 3) ? 'VS' : '@'); ?></td>
                        <td><?= (isset($game->opp_rank) ? '#' . $game->opp_rank . ' ' : ''); ?><?= strtoupper($game->opponent->opponent_name) ?></td>
                    </tr>
                    <tr>
                        <td <?= ((isset($game->w) && $game->w == 1) ? 'style= "font-weight: bold;"' : '');?>><?= $game->pts_mur ?></td>
                        <td></td>
                        <td <?= ((isset($game->l) && $game->l == 1) ? 'style= "font-weight: bold;"' : '');?>><?= $game->pts_opp ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="w3-col w3-container m5 l4 w3-leftbar w3-left w3-large">
        <table class="w3-table w3-bordered">
            <thead></thead>
            <tbody>
                <tr><td>DATE - <?= date_format(date_create($game->game_date), 'm/d/Y'); ?></td></tr>
                <tr><td>TIME - <?= (date_format(date_create($game->game_date), 'G') > 0 ? date_format(date_create($game->game_date), 'g:i A') : ""); ?></td></tr>
                <tr><td>ATTENDANCE - <?= (isset($game->attendance) ? $game->attendance : ""); ?></td></tr>
                <tr><td>SITE - <?= (isset($game->site->site_arena) ? $game->site->site_arena . " " . $game->site->site_name . ", " . $game->site->site_state : $game->site->site_name . ", " . $game->site->site_state); ?></td></tr>
                <tr><td>REFEREES - <?= (isset($game->ref1) ? $game->ref1 : ""); ?><?= (isset($game->ref2) ? ", " . $game->ref2 : ""); ?><?= (isset($game->ref3) ? ", " . $game->ref3 : ""); ?></td></tr>
            </tbody>
        </table>
    </div>
    <div>
        
    </div>
</div>
<div class="w3-row">
    <?php if ($game->game_post): ?>
        <p>
            <?php foreach ($game->game_post as $post): ?>
                <span><?= $post->post->title; ?></span>
            <div class="w3-row" style="overflow: scroll"><?= $post->post->text; ?></div>

        <?php endforeach ?>
    </p>
<?php endif; ?>
<span>
    <?= ((\Session::get('nav')) ? \Html::anchor('seasons/view/' . \Session::get('nav'), "Back", []) : \Html::anchor('games', "Back", [])); ?>
</span>
</div>


<!--<div class="btn-group">
<?php // echo \Html::anchor('admin/game/edit/'.$game->id, 'Edit', array('class' => 'btn btn-warning')); ?>
<?php // echo \Html::anchor('admin/game', 'Back', array('class' => 'btn btn-default')); ?>
</div>-->
