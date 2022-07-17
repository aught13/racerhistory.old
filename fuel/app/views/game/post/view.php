<h2>Viewing <span class='muted'>#<?php echo $game_post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game_post->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $game_post->game_id; ?></p>
<p>
	<strong>Post id:</strong>
	<?php echo $game_post->post_id; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $game_post->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $game_post->updated_date; ?></p>

<?php echo Html::anchor('game/post/edit/'.$game_post->id, 'Edit'); ?> |
<?php echo Html::anchor('game/post', 'Back'); ?>