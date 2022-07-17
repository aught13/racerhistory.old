<h2>Editing <span class='muted'>Game_datum</span></h2>
<br>

<?php echo render('game/datum/_form'); ?>
<p>
	<?php echo Html::anchor('game/datum/view/'.$game_datum->id, 'View'); ?> |
	<?php echo Html::anchor('game/datum', 'Back'); ?></p>
