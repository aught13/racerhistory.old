<h2>Listing Sessions</h2>
<br>

<?php if ($sessions): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Session id</th>
					<th>Previous id</th>
					<th>User agent</th>
					<th>Ip hash</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Payload</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($sessions as $item): ?>
					<tr>
						<td><?php echo $item->session_id; ?></td>
						<td><?php echo $item->previous_id; ?></td>
						<td><?php echo $item->user_agent; ?></td>
						<td><?php echo $item->ip_hash; ?></td>
						<td><?php echo $item->created; ?></td>
						<td><?php echo $item->updated; ?></td>
						<td><?php echo $item->payload; ?></td>

						<td>
							<?php echo Html::anchor('admin/session/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/session/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/session/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Sessions.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/session/create', 'Add new Session', array('class' => 'btn btn-success')); ?>
</p>
