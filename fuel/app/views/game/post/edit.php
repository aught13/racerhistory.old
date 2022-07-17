<h2>Editing <span class='muted'>Game_post</span></h2>
<br>

<?php echo render('game/post/_form'); ?>
<p>
	<?php echo Html::anchor('game/post/view/'.$game_post->id, 'View'); ?> |
	<?php echo Html::anchor('game/post', 'Back'); ?></p>
