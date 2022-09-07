<h2>Viewing #<?php echo $game_datum->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game_datum->id; ?></dd>
	<br>
	<dt>Game id</dt>
	<dd><?php echo $game_datum->game_id; ?></dd>
	<br>
	<dt>Data key</dt>
	<dd><?php echo $game_datum->data_key; ?></dd>
	<br>
	<dt>Data value</dt>
	<dd><?php echo $game_datum->data_value; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $game_datum->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $game_datum->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/datum/edit/'.$game_datum->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game/datum', 'Back', array('class' => 'btn btn-default')); ?>
</div>
