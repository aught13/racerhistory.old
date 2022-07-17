<h2>Viewing <span class='muted'>#<?php echo $game_type->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game_type->id; ?></p>
<p>
	<strong>Game type name:</strong>
	<?php echo $game_type->game_type_name; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $game_type->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $game_type->updated_date; ?></p>

<?php echo Html::anchor('game/type/edit/'.$game_type->id, 'Edit'); ?> |
<?php echo Html::anchor('game/type', 'Back'); ?>