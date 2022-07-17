<h2>Listing <span class='muted'>Site_infos</span></h2>
<br>
<?php if ($site_infos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Site id</th>
			<th>Info key</th>
			<th>Info value</th>
			<th>Submitted date</th>
			<th>Updated date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($site_infos as $item): ?>		<tr>

			<td><?php echo $item->ID; ?></td>
			<td><?php echo $item->site_id; ?></td>
			<td><?php echo $item->info_key; ?></td>
			<td><?php echo $item->info_value; ?></td>
			<td><?php echo $item->submitted_date; ?></td>
			<td><?php echo $item->updated_date; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('site/info/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('site/info/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('site/info/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Site_infos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('site/info/create', 'Add new Site info', array('class' => 'btn btn-success')); ?>

</p>
