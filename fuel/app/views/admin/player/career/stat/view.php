<h2>Viewing #<?php echo $player_career_stat->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $player_career_stat->id; ?></dd>
	<br>
	<dt>Person id</dt>
	<dd><?php echo $player_career_stat->person_id; ?></dd>
	<br>
	<dt>Seasons</dt>
	<dd><?php echo $player_career_stat->seasons; ?></dd>
	<br>
	<dt>Start</dt>
	<dd><?php echo $player_career_stat->start; ?></dd>
	<br>
	<dt>Finish</dt>
	<dd><?php echo $player_career_stat->finish; ?></dd>
	<br>
	<dt>GP</dt>
	<dd><?php echo $player_career_stat->GP; ?></dd>
	<br>
	<dt>GS</dt>
	<dd><?php echo $player_career_stat->GS; ?></dd>
	<br>
	<dt>MIN</dt>
	<dd><?php echo $player_career_stat->MIN; ?></dd>
	<br>
	<dt>FGM</dt>
	<dd><?php echo $player_career_stat->FGM; ?></dd>
	<br>
	<dt>FGA</dt>
	<dd><?php echo $player_career_stat->FGA; ?></dd>
	<br>
	<dt>FGP</dt>
	<dd><?php echo $player_career_stat->FGP; ?></dd>
	<br>
	<dt>TPM</dt>
	<dd><?php echo $player_career_stat->TPM; ?></dd>
	<br>
	<dt>TPA</dt>
	<dd><?php echo $player_career_stat->TPA; ?></dd>
	<br>
	<dt>TPP</dt>
	<dd><?php echo $player_career_stat->TPP; ?></dd>
	<br>
	<dt>FTM</dt>
	<dd><?php echo $player_career_stat->FTM; ?></dd>
	<br>
	<dt>FTA</dt>
	<dd><?php echo $player_career_stat->FTA; ?></dd>
	<br>
	<dt>FTP</dt>
	<dd><?php echo $player_career_stat->FTP; ?></dd>
	<br>
	<dt>ORB</dt>
	<dd><?php echo $player_career_stat->ORB; ?></dd>
	<br>
	<dt>DRB</dt>
	<dd><?php echo $player_career_stat->DRB; ?></dd>
	<br>
	<dt>RB</dt>
	<dd><?php echo $player_career_stat->RB; ?></dd>
	<br>
	<dt>PF</dt>
	<dd><?php echo $player_career_stat->PF; ?></dd>
	<br>
	<dt>AST</dt>
	<dd><?php echo $player_career_stat->AST; ?></dd>
	<br>
	<dt>TRN</dt>
	<dd><?php echo $player_career_stat->TRN; ?></dd>
	<br>
	<dt>ATR</dt>
	<dd><?php echo $player_career_stat->ATR; ?></dd>
	<br>
	<dt>BLK</dt>
	<dd><?php echo $player_career_stat->BLK; ?></dd>
	<br>
	<dt>STL</dt>
	<dd><?php echo $player_career_stat->STL; ?></dd>
	<br>
	<dt>PTS</dt>
	<dd><?php echo $player_career_stat->PTS; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/player/career/stat/edit/'.$player_career_stat->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/player/career/stat', 'Back', array('class' => 'btn btn-default')); ?>
</div>
