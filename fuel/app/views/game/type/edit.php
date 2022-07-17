<h2>Editing <span class='muted'>Game_type</span></h2>
<br>

<?php echo render('game/type/_form'); ?>
<p>
	<?php echo Html::anchor('game/type/view/'.$game_type->id, 'View'); ?> |
	<?php echo Html::anchor('game/type', 'Back'); ?></p>
