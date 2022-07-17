<h2>Viewing <span class='muted'>#<?php echo $opponent->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $opponent->id; ?></p>
<p>
	<strong>Opponent name:</strong>
	<?php echo $opponent->opponent_name; ?></p>
<p>
	<strong>Opponent mascot:</strong>
	<?php echo $opponent->opponent_mascot; ?></p>
<p>
	<strong>Opponent current:</strong>
	<?php echo $opponent->opponent_current; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $opponent->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $opponent->updated_date; ?></p>

<?php echo Html::anchor('opponent/edit/'.$opponent->id, 'Edit'); ?> |
<?php echo Html::anchor('opponent', 'Back'); ?>