<h2>Viewing #<?php echo $season_post->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $season_post->id; ?></dd>
	<br>
	<dt>Season id</dt>
	<dd><?php echo $season_post->season_id; ?></dd>
	<br>
	<dt>Post id</dt>
	<dd><?php echo $season_post->post_id; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $season_post->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $season_post->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/season/post/edit/'.$season_post->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/season/post', 'Back', array('class' => 'btn btn-default')); ?>
</div>
