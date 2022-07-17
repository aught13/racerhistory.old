<h2>Viewing #<?php echo $session->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Session id</dt>
	<dd><?php echo $session->session_id; ?></dd>
	<br>
	<dt>Previous id</dt>
	<dd><?php echo $session->previous_id; ?></dd>
	<br>
	<dt>User agent</dt>
	<dd><?php echo $session->user_agent; ?></dd>
	<br>
	<dt>Ip hash</dt>
	<dd><?php echo $session->ip_hash; ?></dd>
	<br>
	<dt>Created</dt>
	<dd><?php echo $session->created; ?></dd>
	<br>
	<dt>Updated</dt>
	<dd><?php echo $session->updated; ?></dd>
	<br>
	<dt>Payload</dt>
	<dd><?php echo $session->payload; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/session/edit/'.$session->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/session', 'Back', array('class' => 'btn btn-default')); ?>
</div>
