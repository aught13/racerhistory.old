<h2>Listing Game_types</h2>
<br>

<?php if ($game_types): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Game type name</th>
					<th>Post</th>
					<th>Conf</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($game_types as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->game_type_name; ?></td>
						<td><?php echo $item->post; ?></td>
						<td><?php echo $item->conf; ?></td>
						<td><?php echo $item->created_at; ?></td>
						<td><?php echo $item->updated_at; ?></td>

						<td>
							<?php echo Html::anchor('admin/game/type/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/game/type/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/game/type/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Game_types.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/game/type/create', 'Add new Game type', array('class' => 'btn btn-success')); ?>
</p>
