<h2>Viewing <span class='muted'>#<?php echo $game_info->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game_info->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $game_info->game_id; ?></p>
<p>
	<strong>Info key:</strong>
	<?php echo $game_info->info_key; ?></p>
<p>
	<strong>Info value:</strong>
	<?php echo $game_info->info_value; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $game_info->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $game_info->updated_date; ?></p>

<?php echo Html::anchor('game/info/edit/'.$game_info->id, 'Edit'); ?> |
<?php echo Html::anchor('game/info', 'Back'); ?>