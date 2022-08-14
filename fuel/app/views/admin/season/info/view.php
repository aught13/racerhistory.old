<h2>Viewing #<?php echo $season_info->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $season_info->id; ?></dd>
	<br>
	<dt>Season</dt>
	<dd><?php echo $season_info->season; ?></dd>
	<br>
	<dt>Fin</dt>
	<dd><?php echo $season_info->fin; ?></dd>
	<br>
	<dt>Notes</dt>
	<dd><?php echo $season_info->notes; ?></dd>
	<br>
	<dt>Img</dt>
	<dd><?php echo $season_info->img; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $season_info->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $season_info->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/season/info/edit/'.$season_info->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/season/info', 'Back', array('class' => 'btn btn-default')); ?>
</div>
