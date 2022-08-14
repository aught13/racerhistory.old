<h2>Viewing #<?php echo $game_post->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game_post->id; ?></dd>
	<br>
	<dt>Game id</dt>
	<dd><?php echo $game_post->game_id; ?></dd>
	<br>
	<dt>Post id</dt>
	<dd><?php echo $game_post->post_id; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $game_post->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $game_post->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/post/edit/'.$game_post->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game/post', 'Back', array('class' => 'btn btn-default')); ?>
</div>
