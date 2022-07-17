<h2>Viewing #<?php echo $career_per_game->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Person id</dt>
	<dd><?php echo $career_per_game->person_id; ?></dd>
	<br>
	<dt>Seasons</dt>
	<dd><?php echo $career_per_game->seasons; ?></dd>
	<br>
	<dt>Start</dt>
	<dd><?php echo $career_per_game->start; ?></dd>
	<br>
	<dt>Finish</dt>
	<dd><?php echo $career_per_game->finish; ?></dd>
	<br>
	<dt>GP</dt>
	<dd><?php echo $career_per_game->GP; ?></dd>
	<br>
	<dt>MIN</dt>
	<dd><?php echo $career_per_game->MIN; ?></dd>
	<br>
	<dt>FGM</dt>
	<dd><?php echo $career_per_game->FGM; ?></dd>
	<br>
	<dt>FGA</dt>
	<dd><?php echo $career_per_game->FGA; ?></dd>
	<br>
	<dt>FGP</dt>
	<dd><?php echo $career_per_game->FGP; ?></dd>
	<br>
	<dt>TPM</dt>
	<dd><?php echo $career_per_game->TPM; ?></dd>
	<br>
	<dt>TPA</dt>
	<dd><?php echo $career_per_game->TPA; ?></dd>
	<br>
	<dt>TPP</dt>
	<dd><?php echo $career_per_game->TPP; ?></dd>
	<br>
	<dt>FTM</dt>
	<dd><?php echo $career_per_game->FTM; ?></dd>
	<br>
	<dt>FTA</dt>
	<dd><?php echo $career_per_game->FTA; ?></dd>
	<br>
	<dt>FTP</dt>
	<dd><?php echo $career_per_game->FTP; ?></dd>
	<br>
	<dt>ORB</dt>
	<dd><?php echo $career_per_game->ORB; ?></dd>
	<br>
	<dt>DRB</dt>
	<dd><?php echo $career_per_game->DRB; ?></dd>
	<br>
	<dt>RB</dt>
	<dd><?php echo $career_per_game->RB; ?></dd>
	<br>
	<dt>PF</dt>
	<dd><?php echo $career_per_game->PF; ?></dd>
	<br>
	<dt>AST</dt>
	<dd><?php echo $career_per_game->AST; ?></dd>
	<br>
	<dt>TRN</dt>
	<dd><?php echo $career_per_game->TRN; ?></dd>
	<br>
	<dt>BLK</dt>
	<dd><?php echo $career_per_game->BLK; ?></dd>
	<br>
	<dt>STL</dt>
	<dd><?php echo $career_per_game->STL; ?></dd>
	<br>
	<dt>PTS</dt>
	<dd><?php echo $career_per_game->PTS; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/career/per/game/edit/'.$career_per_game->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/career/per/game', 'Back', array('class' => 'btn btn-default')); ?>
</div>
