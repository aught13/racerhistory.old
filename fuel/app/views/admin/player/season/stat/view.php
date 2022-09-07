<h2>Viewing #<?php echo $player_season_stat->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $player_season_stat->id; ?></dd>
	<br>
	<dt>Person id</dt>
	<dd><?php echo $player_season_stat->person_id; ?></dd>
	<br>
	<dt>Season id</dt>
	<dd><?php echo $player_season_stat->season_id; ?></dd>
	<br>
	<dt>GP</dt>
	<dd><?php echo $player_season_stat->GP; ?></dd>
	<br>
	<dt>GS</dt>
	<dd><?php echo $player_season_stat->GS; ?></dd>
	<br>
	<dt>MIN</dt>
	<dd><?php echo $player_season_stat->MIN; ?></dd>
	<br>
	<dt>FGM</dt>
	<dd><?php echo $player_season_stat->FGM; ?></dd>
	<br>
	<dt>FGA</dt>
	<dd><?php echo $player_season_stat->FGA; ?></dd>
	<br>
	<dt>TPM</dt>
	<dd><?php echo $player_season_stat->TPM; ?></dd>
	<br>
	<dt>TPA</dt>
	<dd><?php echo $player_season_stat->TPA; ?></dd>
	<br>
	<dt>FTM</dt>
	<dd><?php echo $player_season_stat->FTM; ?></dd>
	<br>
	<dt>FTA</dt>
	<dd><?php echo $player_season_stat->FTA; ?></dd>
	<br>
	<dt>ORB</dt>
	<dd><?php echo $player_season_stat->ORB; ?></dd>
	<br>
	<dt>DRB</dt>
	<dd><?php echo $player_season_stat->DRB; ?></dd>
	<br>
	<dt>RB</dt>
	<dd><?php echo $player_season_stat->RB; ?></dd>
	<br>
	<dt>AST</dt>
	<dd><?php echo $player_season_stat->AST; ?></dd>
	<br>
	<dt>STL</dt>
	<dd><?php echo $player_season_stat->STL; ?></dd>
	<br>
	<dt>BLK</dt>
	<dd><?php echo $player_season_stat->BLK; ?></dd>
	<br>
	<dt>TRN</dt>
	<dd><?php echo $player_season_stat->TRN; ?></dd>
	<br>
	<dt>PF</dt>
	<dd><?php echo $player_season_stat->PF; ?></dd>
	<br>
	<dt>PTS</dt>
	<dd><?php echo $player_season_stat->PTS; ?></dd>
	<br>
	<dt>Submitted date</dt>
	<dd><?php echo $player_season_stat->submitted_date; ?></dd>
	<br>
	<dt>Updated date</dt>
	<dd><?php echo $player_season_stat->updated_date; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/player/season/stat/edit/'.$player_season_stat->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/player/season/stat', 'Back', array('class' => 'btn btn-default')); ?>
</div>
