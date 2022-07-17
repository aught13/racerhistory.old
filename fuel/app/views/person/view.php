<h2>Viewing <span class='muted'><?php echo $person->first. ' ' .$person->last; ?></span></h2>
<p>
    <strong>First:</strong>
    <?php echo $person->first; ?>
</p>
<p>
    <strong>Last:</strong>
    <?php echo $person->last; ?>
</p>
<p>
    <strong>Nick:</strong>
    <?php echo $person->nick; ?>
</p>
<p>
    <strong>Photo:</strong>
    <?= Html::img("assets/img/player/$person->photo"); ?>
</p>
<span>
    <?php echo Html::anchor('person', 'Back to Players').' | '.Html::anchor('stat', 'Back to Stats');?>
</span>