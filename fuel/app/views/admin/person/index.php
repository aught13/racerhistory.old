<h2>Listing People</h2>
<br>

<?php if ($people): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>First</th>
					<th>Last</th>
					<th>Nick</th>
					<th>Photo</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($people as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->first; ?></td>
						<td><?php echo $item->last; ?></td>
						<td><?php echo $item->nick; ?></td>
						<td><?php echo $item->photo; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/person/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/person/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/person/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No People.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/person/create', 'Add new Person', array('class' => 'btn btn-success')); ?>
</p>
