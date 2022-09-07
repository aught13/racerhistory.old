<h2>Listing Person_infos</h2>
<br>

<?php if ($person_infos): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Person id</th>
					<th>Info key</th>
					<th>Info value</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($person_infos as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->person_id; ?></td>
						<td><?php echo $item->info_key; ?></td>
						<td><?php echo $item->info_value; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/person/info/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/person/info/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/person/info/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Person_infos.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/person/info/create', 'Add new Person info', array('class' => 'btn btn-success')); ?>
</p>
