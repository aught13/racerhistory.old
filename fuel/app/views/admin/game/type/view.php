<h2>Viewing #<?php echo $game_type->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game_type->id; ?></dd>
	<br>
	<dt>Game type name</dt>
	<dd><?php echo $game_type->game_type_name; ?></dd>
	<br>
	<dt>Post</dt>
	<dd><?php echo $game_type->post; ?></dd>
	<br>
	<dt>Conf</dt>
	<dd><?php echo $game_type->conf; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $game_type->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $game_type->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/type/edit/'.$game_type->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-default')); ?>
</div>
