<h2>Listing People</h2>
<br>

<?php if ($people): ?>
	<div class="w3-responsive">
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>First</th>
					<th>Last</th>
					<th>Nick</th>
                                        <th>Display</th>
					<th>Photo</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($people as $item): ?>
					<tr>
						<td><?php echo $item->first; ?></td>
						<td><?php echo $item->last; ?></td>
						<td><?php echo $item->nick; ?></td>
						<td><?php echo $item->display; ?></td>
						<td><?php echo $item->photo; ?></td>

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
