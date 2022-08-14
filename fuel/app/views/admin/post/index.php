<h2>Listing Posts</h2>
<br>

<?php if ($posts): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Text</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($posts as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->title; ?></td>
                                                <td id="bbcode-text"><?php echo $item->text; ?></td>
						<td><?php echo $item->created_at; ?></td>
						<td><?php echo $item->updated_at; ?></td>

						<td>
							<?php echo Html::anchor('admin/post/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/post/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/post/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Posts.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/post/create', 'Add new Post', array('class' => 'btn btn-success')); ?>
</p>
