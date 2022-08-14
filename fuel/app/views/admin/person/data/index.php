<h2>Listing Person_data</h2>
<br>

<?php if ($person_data): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Person id</th>
					<th>Data key</th>
					<th>Data value</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($person_data as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->person_id; ?></td>
						<td><?php echo $item->data_key; ?></td>
						<td><?php echo $item->data_value; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/person/datum/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/person/datum/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/person/datum/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Person_data.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/person/datum/create', 'Add new Person datum', array('class' => 'btn btn-success')); ?>
</p>
