<h2>Listing Person_posts</h2>
<br>

<?php if ($person_posts): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Person id</th>
					<th>Post id</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($person_posts as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->person_id; ?></td>
						<td><?php echo $item->post_id; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/person/post/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/person/post/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/person/post/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Person_posts.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/person/post/create', 'Add new Person post', array('class' => 'btn btn-success')); ?>
</p>
