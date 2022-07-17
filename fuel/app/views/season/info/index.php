<h2>Listing <span class='muted'>Season_infos</span></h2>
<br>
<?php if ($season_infos): ?>
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
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($season_infos as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->season; ?></td>
			<td><?php echo $item->fin; ?></td>
			<td><?php echo $item->notes; ?></td>
			<td><?php echo $item->img; ?></td>
			<td><?php echo $item->submitted_date; ?></td>
			<td><?php echo $item->updated_date; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('season/info/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/info/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/info/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Season_infos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('season/info/create', 'Add new Season info', array('class' => 'btn btn-success')); ?>

</p>
