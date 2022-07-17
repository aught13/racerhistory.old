<h2>Listing <span class='muted'>Games</span></h2>
<br>
<?php if ($games): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Season</th>
			<th>Game date</th>
			<th>Game type id</th>
			<th>Opponent id</th>
			<th>Site id</th>
			<th>Hrn</th>
			<th>Post</th>
			<th>W</th>
			<th>L</th>
			<th>Pts mur</th>
			<th>Pts opp</th>
			<th>Submitted date</th>
			<th>Updated date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($games as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->season; ?></td>
			<td><?php echo $item->game_date; ?></td>
			<td><?php echo $item->game_type_id; ?></td>
			<td><?php echo $item->opponent_id; ?></td>
			<td><?php echo $item->site_id; ?></td>
			<td><?php echo $item->hrn; ?></td>
			<td><?php echo $item->post; ?></td>
			<td><?php echo $item->w; ?></td>
			<td><?php echo $item->l; ?></td>
			<td><?php echo $item->pts_mur; ?></td>
			<td><?php echo $item->pts_opp; ?></td>
			<td><?php echo $item->submitted_date; ?></td>
			<td><?php echo $item->updated_date; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('game/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Games.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('game/create', 'Add new Game', array('class' => 'btn btn-success')); ?>

</p>
