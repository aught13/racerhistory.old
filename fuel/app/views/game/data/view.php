<h2>Viewing <span class='muted'>#<?php echo $game_datum->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game_datum->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $game_datum->game_id; ?></p>
<p>
	<strong>Data key:</strong>
	<?php echo $game_datum->data_key; ?></p>
<p>
	<strong>Data value:</strong>
	<?php echo $game_datum->data_value; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $game_datum->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $game_datum->updated_date; ?></p>

<?php echo Html::anchor('game/datum/edit/'.$game_datum->id, 'Edit'); ?> |
<?php echo Html::anchor('game/datum', 'Back'); ?>