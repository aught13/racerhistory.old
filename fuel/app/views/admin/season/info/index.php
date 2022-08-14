<h2>Listing Season_infos</h2>
<br>

<?php if ($season_infos): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Season</th>
					<th>Fin</th>
					<th>Notes</th>
					<th>Img</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($season_infos as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->season; ?></td>
						<td><?php echo $item->fin; ?></td>
						<td><?php echo $item->notes; ?></td>
						<td><?php echo $item->img; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/season/info/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/season/info/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/season/info/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Season_infos.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/season/info/create', 'Add new Season info', array('class' => 'btn btn-success')); ?>
</p>
