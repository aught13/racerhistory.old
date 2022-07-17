<h2>Listing <span class='muted'>Season_posts</span></h2>
<br>
<?php if ($season_posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Season id</th>
			<th>Post id</th>
			<th>Submitted date</th>
			<th>Updated date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($season_posts as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->season_id; ?></td>
			<td><?php echo $item->post_id; ?></td>
			<td><?php echo $item->submitted_date; ?></td>
			<td><?php echo $item->updated_date; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('season/post/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/post/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/post/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Season_posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('season/post/create', 'Add new Season post', array('class' => 'btn btn-success')); ?>

</p>
