<h2>Listing Season_posts</h2>
<br>

<?php if ($season_posts): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Season id</th>
					<th>Post id</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($season_posts as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->season_id; ?></td>
						<td><?php echo $item->post_id; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/season/post/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/season/post/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/season/post/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Season_posts.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/season/post/create', 'Add new Season post', array('class' => 'btn btn-success')); ?>
</p>
