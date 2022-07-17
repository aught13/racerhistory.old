<h2>Viewing <span class='muted'>#<?php echo $opponent_season_total->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $opponent_season_total->id; ?></p>
<p>
	<strong>Season id:</strong>
	<?php echo $opponent_season_total->season_id; ?></p>
<p>
	<strong>G:</strong>
	<?php echo $opponent_season_total->G; ?></p>
<p>
	<strong>MP:</strong>
	<?php echo $opponent_season_total->MP; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $opponent_season_total->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $opponent_season_total->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $opponent_season_total->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $opponent_season_total->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $opponent_season_total->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $opponent_season_total->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $opponent_season_total->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $opponent_season_total->DRB; ?></p>
<p>
	<strong>TRB:</strong>
	<?php echo $opponent_season_total->TRB; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $opponent_season_total->PF; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $opponent_season_total->AST; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $opponent_season_total->TRN; ?></p>
<p>
	<strong>BLK:</strong>
	<?php echo $opponent_season_total->BLK; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $opponent_season_total->STL; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $opponent_season_total->PTS; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $opponent_season_total->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $opponent_season_total->updated_date; ?></p>

<?php echo Html::anchor('opponent/season/total/edit/'.$opponent_season_total->id, 'Edit'); ?> |
<?php echo Html::anchor('opponent/season/total', 'Back'); ?>