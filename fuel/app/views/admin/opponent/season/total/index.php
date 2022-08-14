<h2>Listing Opponent_season_totals</h2>
<br>

<?php if ($opponent_season_totals): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Season id</th>
					<th>G</th>
					<th>MP</th>
					<th>FGM</th>
					<th>FGA</th>
					<th>TPM</th>
					<th>TPA</th>
					<th>FTM</th>
					<th>FTA</th>
					<th>ORB</th>
					<th>DRB</th>
					<th>TRB</th>
					<th>PF</th>
					<th>AST</th>
					<th>TRN</th>
					<th>BLK</th>
					<th>STL</th>
					<th>PTS</th>
					<th>Submitted date</th>
					<th>Updated date</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($opponent_season_totals as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->season_id; ?></td>
						<td><?php echo $item->G; ?></td>
						<td><?php echo $item->MP; ?></td>
						<td><?php echo $item->FGM; ?></td>
						<td><?php echo $item->FGA; ?></td>
						<td><?php echo $item->TPM; ?></td>
						<td><?php echo $item->TPA; ?></td>
						<td><?php echo $item->FTM; ?></td>
						<td><?php echo $item->FTA; ?></td>
						<td><?php echo $item->ORB; ?></td>
						<td><?php echo $item->DRB; ?></td>
						<td><?php echo $item->TRB; ?></td>
						<td><?php echo $item->PF; ?></td>
						<td><?php echo $item->AST; ?></td>
						<td><?php echo $item->TRN; ?></td>
						<td><?php echo $item->BLK; ?></td>
						<td><?php echo $item->STL; ?></td>
						<td><?php echo $item->PTS; ?></td>
						<td><?php echo $item->submitted_date; ?></td>
						<td><?php echo $item->updated_date; ?></td>

						<td>
							<?php echo Html::anchor('admin/opponent/season/total/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/opponent/season/total/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/opponent/season/total/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Opponent_season_totals.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/opponent/season/total/create', 'Add new Opponent season total', array('class' => 'btn btn-success')); ?>
</p>
