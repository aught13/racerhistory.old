<h2>Viewing #<?php echo $team->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $team->id; ?></dd>
	<br>
	<dt>Team name</dt>
	<dd><?php echo $team->team_name; ?></dd>
	<br>
	<dt>Team description</dt>
	<dd><?php echo $team->team_description; ?></dd>
	<br>
	<dt>Abbr</dt>
	<dd><?php echo $team->abbr; ?></dd>
	<br>
	<dt>Gender</dt>
	<dd><?php echo $team->gender; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/team/edit/'.$team->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/team', 'Back', array('class' => 'btn btn-default')); ?>
</div>
