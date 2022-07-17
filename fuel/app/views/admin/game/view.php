<h2>Viewing #<?php echo $game->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game->id; ?></dd>
	<br>
	<dt>Season</dt>
	<dd><?php echo $game->season; ?></dd>
	<br>
	<dt>Game date</dt>
	<dd><?php echo $game->game_date; ?></dd>
	<br>
	<dt>Game type id</dt>
	<dd><?php echo $game->game_type_id; ?></dd>
	<br>
	<dt>Opponent id</dt>
	<dd><?php echo $game->opponent_id; ?></dd>
	<br>
	<dt>Site id</dt>
	<dd><?php echo $game->site_id; ?></dd>
	<br>
	<dt>Hrn</dt>
	<dd><?php echo $game->hrn; ?></dd>
	<br>
	<dt>Post</dt>
	<dd><?php echo $game->post; ?></dd>
	<br>
	<dt>W</dt>
	<dd><?php echo $game->w; ?></dd>
	<br>
	<dt>L</dt>
	<dd><?php echo $game->l; ?></dd>
	<br>
	<dt>Pts mur</dt>
	<dd><?php echo $game->pts_mur; ?></dd>
	<br>
	<dt>Pts opp</dt>
	<dd><?php echo $game->pts_opp; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $game->created_at; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $game->updated_at; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/edit/'.$game->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game', 'Back', array('class' => 'btn btn-default')); ?>
</div>
