<h2>Listing Career_per_games</h2>
<br>

<?php if ($career_per_games): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Person id</th>
					<th>Seasons</th>
					<th>Start</th>
					<th>Finish</th>
					<th>GP</th>
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
					<th>PTS</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($career_per_games as $item): ?>
					<tr>
						<td><?php echo $item->person_id; ?></td>
						<td><?php echo $item->seasons; ?></td>
						<td><?php echo $item->start; ?></td>
						<td><?php echo $item->finish; ?></td>
						<td><?php echo $item->GP; ?></td>
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
						<td><?php echo $item->PTS; ?></td>

						<td>
							<?php echo Html::anchor('admin/career/per/game/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/career/per/game/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/career/per/game/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Career_per_games.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/career/per/game/create', 'Add new Career per game', array('class' => 'btn btn-success')); ?>
</p>
