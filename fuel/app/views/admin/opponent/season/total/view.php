<h2>Viewing #<?php echo $opponent_season_total->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $opponent_season_total->id; ?></dd>
	<br>
	<dt>Season id</dt>
	<dd><?php echo $opponent_season_total->season_id; ?></dd>
	<br>
	<dt>G</dt>
	<dd><?php echo $opponent_season_total->G; ?></dd>
	<br>
	<dt>MP</dt>
	<dd><?php echo $opponent_season_total->MP; ?></dd>
	<br>
	<dt>FGM</dt>
	<dd><?php echo $opponent_season_total->FGM; ?></dd>
	<br>
	<dt>FGA</dt>
	<dd><?php echo $opponent_season_total->FGA; ?></dd>
	<br>
	<dt>TPM</dt>
	<dd><?php echo $opponent_season_total->TPM; ?></dd>
	<br>
	<dt>TPA</dt>
	<dd><?php echo $opponent_season_total->TPA; ?></dd>
	<br>
	<dt>FTM</dt>
	<dd><?php echo $opponent_season_total->FTM; ?></dd>
	<br>
	<dt>FTA</dt>
	<dd><?php echo $opponent_season_total->FTA; ?></dd>
	<br>
	<dt>ORB</dt>
	<dd><?php echo $opponent_season_total->ORB; ?></dd>
	<br>
	<dt>DRB</dt>
	<dd><?php echo $opponent_season_total->DRB; ?></dd>
	<br>
	<dt>TRB</dt>
	<dd><?php echo $opponent_season_total->TRB; ?></dd>
	<br>
	<dt>PF</dt>
	<dd><?php echo $opponent_season_total->PF; ?></dd>
	<br>
	<dt>AST</dt>
	<dd><?php echo $opponent_season_total->AST; ?></dd>
	<br>
	<dt>TRN</dt>
	<dd><?php echo $opponent_season_total->TRN; ?></dd>
	<br>
	<dt>BLK</dt>
	<dd><?php echo $opponent_season_total->BLK; ?></dd>
	<br>
	<dt>STL</dt>
	<dd><?php echo $opponent_season_total->STL; ?></dd>
	<br>
	<dt>PTS</dt>
	<dd><?php echo $opponent_season_total->PTS; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $opponent_season_total->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $opponent_season_total->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/opponent/season/total/edit/'.$opponent_season_total->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/opponent/season/total', 'Back', array('class' => 'btn btn-default')); ?>
</div>
