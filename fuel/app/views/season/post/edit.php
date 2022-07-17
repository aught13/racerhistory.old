<h2>Editing <span class='muted'>Season_post</span></h2>
<br>

<?php echo render('season/post/_form'); ?>
<p>
	<?php echo Html::anchor('season/post/view/'.$season_post->id, 'View'); ?> |
	<?php echo Html::anchor('season/post', 'Back'); ?></p>
