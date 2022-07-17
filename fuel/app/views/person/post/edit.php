<h2>Editing <span class='muted'>Person_post</span></h2>
<br>

<?php echo render('person/post/_form'); ?>
<p>
	<?php echo Html::anchor('person/post/view/'.$person_post->id, 'View'); ?> |
	<?php echo Html::anchor('person/post', 'Back'); ?></p>
