<h2>Listing Opponents</h2>
<br>

<?php if ($opponents): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Opponent name</th>
					<th>Opponent mascot</th>
					<th>Opponent current</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($opponents as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->opponent_name; ?></td>
						<td><?php echo $item->opponent_mascot; ?></td>
						<td><?php echo $item->opponent_current; ?></td>
						<td><?php echo $item->created_at; ?></td>
						<td><?php echo $item->updated_at; ?></td>

						<td>
							<?php echo Html::anchor('admin/opponent/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/opponent/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/opponent/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Opponents.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/opponent/create', 'Add new Opponent', array('class' => 'btn btn-success')); ?>
</p>
