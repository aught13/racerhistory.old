<h2>Viewing #<?php echo $person_post->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $person_post->id; ?></dd>
	<br>
	<dt>Person id</dt>
	<dd><?php echo $person_post->person_id; ?></dd>
	<br>
	<dt>Post id</dt>
	<dd><?php echo $person_post->post_id; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $person_post->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $person_post->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/person/post/edit/'.$person_post->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/person/post', 'Back', array('class' => 'btn btn-default')); ?>
</div>
