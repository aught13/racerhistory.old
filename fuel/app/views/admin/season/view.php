<h2>Viewing #<?php echo $season_info->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Season</dt>
	<dd><?php echo $season_info->identifier ; ?></dd>
	<br>
	<dt>Start</dt>
	<dd><?php echo $season_info->start; ?></dd>
	<br>
	<dt>End</dt>
	<dd><?php echo $season_info->end; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $season_info->created_at; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $season_info->updated_at; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/season/edit/'.$season_info->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/season', 'Back', array('class' => 'btn btn-default')); ?>
</div>
