<h2>Viewing #<?php echo $opponent->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $opponent->id; ?></dd>
	<br>
	<dt>Opponent name</dt>
	<dd><?php echo $opponent->opponent_name; ?></dd>
	<br>
	<dt>Opponent mascot</dt>
	<dd><?php echo $opponent->opponent_mascot; ?></dd>
	<br>
	<dt>Opponent current</dt>
	<dd><?php echo $opponent->opponent_current; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $opponent->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $opponent->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/opponent/edit/'.$opponent->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/opponent', 'Back', array('class' => 'btn btn-default')); ?>
</div>
