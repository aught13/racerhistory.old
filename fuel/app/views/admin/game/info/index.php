<h2>Listing Game_infos</h2>
<br>

<?php if ($game_infos): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Game id</th>
					<th>Info key</th>
					<th>Info value</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($game_infos as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->game_id; ?></td>
						<td><?php echo $item->info_key; ?></td>
						<td><?php echo $item->info_value; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/game/info/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/game/info/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/game/info/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Game_infos.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/game/info/create', 'Add new Game info', array('class' => 'btn btn-success')); ?>
</p>
