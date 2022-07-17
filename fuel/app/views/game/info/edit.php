<h2>Editing <span class='muted'>Game_info</span></h2>
<br>

<?php echo render('game/info/_form'); ?>
<p>
	<?php echo Html::anchor('game/info/view/'.$game_info->id, 'View'); ?> |
	<?php echo Html::anchor('game/info', 'Back'); ?></p>
