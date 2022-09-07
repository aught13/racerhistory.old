<h2>Listing Sites</h2>
<br>

<?php if ($sites): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Site name</th>
					<th>Site state</th>
					<th>Site arena</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($sites as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->site_name; ?></td>
						<td><?php echo $item->site_state; ?></td>
						<td><?php echo $item->site_arena; ?></td>
						<td><?php echo $item->created_at; ?></td>
						<td><?php echo $item->updated_at; ?></td>

						<td>
							<?php echo Html::anchor('admin/site/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/site/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/site/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Sites.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/site/create', 'Add new Site', array('class' => 'btn btn-success')); ?>
</p>
