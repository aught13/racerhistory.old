<h2>Viewing #<?php echo $season_total_stat->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $season_total_stat->id; ?></dd>
	<br>
	<dt>Season id</dt>
	<dd><?php echo $season_total_stat->season_id; ?></dd>
	<br>
	<dt>MIN</dt>
	<dd><?php echo $season_total_stat->MIN; ?></dd>
	<br>
	<dt>FGM</dt>
	<dd><?php echo $season_total_stat->FGM; ?></dd>
	<br>
	<dt>FGA</dt>
	<dd><?php echo $season_total_stat->FGA; ?></dd>
	<br>
	<dt>FGP</dt>
	<dd><?php echo $season_total_stat->FGP; ?></dd>
	<br>
	<dt>TPM</dt>
	<dd><?php echo $season_total_stat->TPM; ?></dd>
	<br>
	<dt>TPA</dt>
	<dd><?php echo $season_total_stat->TPA; ?></dd>
	<br>
	<dt>TPP</dt>
	<dd><?php echo $season_total_stat->TPP; ?></dd>
	<br>
	<dt>FTM</dt>
	<dd><?php echo $season_total_stat->FTM; ?></dd>
	<br>
	<dt>FTA</dt>
	<dd><?php echo $season_total_stat->FTA; ?></dd>
	<br>
	<dt>FTP</dt>
	<dd><?php echo $season_total_stat->FTP; ?></dd>
	<br>
	<dt>ORB</dt>
	<dd><?php echo $season_total_stat->ORB; ?></dd>
	<br>
	<dt>DRB</dt>
	<dd><?php echo $season_total_stat->DRB; ?></dd>
	<br>
	<dt>RB</dt>
	<dd><?php echo $season_total_stat->RB; ?></dd>
	<br>
	<dt>PF</dt>
	<dd><?php echo $season_total_stat->PF; ?></dd>
	<br>
	<dt>AST</dt>
	<dd><?php echo $season_total_stat->AST; ?></dd>
	<br>
	<dt>TRN</dt>
	<dd><?php echo $season_total_stat->TRN; ?></dd>
	<br>
	<dt>BLK</dt>
	<dd><?php echo $season_total_stat->BLK; ?></dd>
	<br>
	<dt>STL</dt>
	<dd><?php echo $season_total_stat->STL; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/season/total/stat/edit/'.$season_total_stat->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/season/total/stat', 'Back', array('class' => 'btn btn-default')); ?>
</div>
