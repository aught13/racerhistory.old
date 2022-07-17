<h2>Viewing <span class='muted'>#<?php echo $game->id; ?></span></h2>
<pre><?php print_r($game); ?></pre>
<p>
	<strong>Id:</strong>
	<?php echo $game->id; ?></p>
<p>
	<strong>Season:</strong>
	<?php echo $game->season; ?></p>
<p>
	<strong>Game date:</strong>
	<?php echo $game->game_date; ?></p>
<p>
	<strong>Game type id:</strong>
	<?php echo $game->game_type_id; ?></p>
<p>
	<strong>Opponent id:</strong>
	<?php echo $game->opponent_id; ?></p>
<p>
	<strong>Site id:</strong>
	<?php echo $game->site_id; ?></p>
<p>
	<strong>Hrn:</strong>
	<?php echo $game->hrn; ?></p>
<p>
	<strong>Post:</strong>
	<?php echo $game->post; ?></p>
<p>
	<strong>W:</strong>
	<?php echo $game->w; ?></p>
<p>
	<strong>L:</strong>
	<?php echo $game->l; ?></p>
<p>
	<strong>Pts mur:</strong>
	<?php echo $game->pts_mur; ?></p>
<p>
	<strong>Pts opp:</strong>
	<?php echo $game->pts_opp; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $game->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $game->updated_date; ?></p>

<?php echo Html::anchor('game/edit/'.$game->id, 'Edit'); ?> |
<?php echo Html::anchor('game', 'Back'); ?>