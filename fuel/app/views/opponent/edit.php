<h2>Editing <span class='muted'>Opponent</span></h2>
<br>

<?php echo render('opponent/_form'); ?>
<p>
	<?php echo Html::anchor('opponent/view/'.$opponent->id, 'View'); ?> |
	<?php echo Html::anchor('opponent', 'Back'); ?></p>
