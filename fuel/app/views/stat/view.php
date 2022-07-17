<h2>Viewing <span class='muted'>#<?php echo $player_season_stat->id; ?></span></h2>

<p>
    <strong>Id:</strong>
    <?php echo $player_season_stat->id; ?>
</p>
<p>
    <strong>Person id:</strong>
    <?php echo $player_season_stat->person_id; ?>
</p>
<p>
    <strong>Season id:</strong>
    <?php echo $player_season_stat->season_id; ?>
</p>
<p>
    <strong>GP:</strong>
    <?php echo $player_season_stat->GP; ?>
</p>
<p>
    <strong>GS:</strong>
    <?php echo $player_season_stat->GS; ?>
</p>
<p>
    <strong>MIN:</strong>
    <?php echo $player_season_stat->MIN; ?>
</p>
<p>
    <strong>FGM:</strong>
    <?php echo $player_season_stat->FGM; ?>
</p>
<p>
    <strong>FGA:</strong>
    <?php echo $player_season_stat->FGA; ?>
</p>
<p>
    <strong>TPM:</strong>
    <?php echo $player_season_stat->TPM; ?>
</p>
<p>
    <strong>TPA:</strong>
    <?php echo $player_season_stat->TPA; ?>
</p>
<p>
    <strong>FTM:</strong>
    <?php echo $player_season_stat->FTM; ?>
</p>
<p>
    <strong>FTA:</strong>
    <?php echo $player_season_stat->FTA; ?>
</p>
<p>
    <strong>ORB:</strong>
    <?php echo $player_season_stat->ORB; ?>
</p>
<p>
    <strong>DRB:</strong>
    <?php echo $player_season_stat->DRB; ?>
</p>
<p>
    <strong>RB:</strong>
    <?php echo $player_season_stat->RB; ?>
</p>
<p>
    <strong>PF:</strong>
    <?php echo $player_season_stat->PF; ?>
</p>
<p>
    <strong>AST:</strong>
    <?php echo $player_season_stat->AST; ?>
</p>
<p>
    <strong>TRN:</strong>
    <?php echo $player_season_stat->TRN; ?>
</p>
<p>
    <strong>BLK:</strong>
    <?php echo $player_season_stat->BLK; ?>
</p>
<p>
    <strong>STL:</strong>
    <?php echo $player_season_stat->STL; ?>
</p>
<p>
    <strong>PTS:</strong>
    <?php echo $player_season_stat->PTS; ?>
</p>
<p>
    <strong>Submitted date:</strong>
    <?php echo $player_season_stat->submitted_date; ?>
</p>
<p>
    <strong>Updated date:</strong>
    <?php echo $player_season_stat->updated_date; ?>
</p>

<?php echo Html::anchor('player/season/stat/edit/'.$player_season_stat->id, 'Edit'); ?> |
<?php echo Html::anchor('player/season/stat', 'Back'); ?>