<h2>Listing Season_total_stats</h2>
<br>

<?php if ($season_total_stats): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Season id</th>
					<th>MIN</th>
					<th>FGM</th>
					<th>FGA</th>
					<th>FGP</th>
					<th>TPM</th>
					<th>TPA</th>
					<th>TPP</th>
					<th>FTM</th>
					<th>FTA</th>
					<th>FTP</th>
					<th>ORB</th>
					<th>DRB</th>
					<th>RB</th>
					<th>PF</th>
					<th>AST</th>
					<th>TRN</th>
					<th>BLK</th>
					<th>STL</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($season_total_stats as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->season_id; ?></td>
						<td><?php echo $item->MIN; ?></td>
						<td><?php echo $item->FGM; ?></td>
						<td><?php echo $item->FGA; ?></td>
						<td><?php echo $item->FGP; ?></td>
						<td><?php echo $item->TPM; ?></td>
						<td><?php echo $item->TPA; ?></td>
						<td><?php echo $item->TPP; ?></td>
						<td><?php echo $item->FTM; ?></td>
						<td><?php echo $item->FTA; ?></td>
						<td><?php echo $item->FTP; ?></td>
						<td><?php echo $item->ORB; ?></td>
						<td><?php echo $item->DRB; ?></td>
						<td><?php echo $item->RB; ?></td>
						<td><?php echo $item->PF; ?></td>
						<td><?php echo $item->AST; ?></td>
						<td><?php echo $item->TRN; ?></td>
						<td><?php echo $item->BLK; ?></td>
						<td><?php echo $item->STL; ?></td>

						<td>
							<?php echo Html::anchor('admin/season/total/stat/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/season/total/stat/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/season/total/stat/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Season_total_stats.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/season/total/stat/create', 'Add new Season total stat', array('class' => 'btn btn-success')); ?>
</p>
