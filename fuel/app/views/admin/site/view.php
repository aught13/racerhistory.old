<h2>Viewing #<?php echo $site->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $site->id; ?></dd>
	<br>
	<dt>Site name</dt>
	<dd><?php echo $site->site_name; ?></dd>
	<br>
	<dt>Site state</dt>
	<dd><?php echo $site->site_state; ?></dd>
	<br>
	<dt>Site arena</dt>
	<dd><?php echo $site->site_arena; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $site->created_at; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $site->updated_at; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/site/edit/'.$site->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/site', 'Back', array('class' => 'btn btn-default')); ?>
</div>
