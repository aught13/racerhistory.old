<h2>Viewing #<?php echo $person->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $person->id; ?></dd>
	<br>
	<dt>First</dt>
	<dd><?php echo $person->first; ?></dd>
	<br>
	<dt>Last</dt>
	<dd><?php echo $person->last; ?></dd>
	<br>
	<dt>Nick</dt>
	<dd><?php echo $person->nick; ?></dd>
	<br>
	<dt>Photo</dt>
	<dd><?php echo $person->photo; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $person->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $person->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/person/edit/'.$person->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/person', 'Back', array('class' => 'btn btn-default')); ?>
</div>
