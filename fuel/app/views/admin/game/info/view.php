<h2>Viewing #<?php echo $game_info->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game_info->id; ?></dd>
	<br>
	<dt>Game id</dt>
	<dd><?php echo $game_info->game_id; ?></dd>
	<br>
	<dt>Info key</dt>
	<dd><?php echo $game_info->info_key; ?></dd>
	<br>
	<dt>Info value</dt>
	<dd><?php echo $game_info->info_value; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $game_info->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $game_info->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/info/edit/'.$game_info->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game/info', 'Back', array('class' => 'btn btn-default')); ?>
</div>
