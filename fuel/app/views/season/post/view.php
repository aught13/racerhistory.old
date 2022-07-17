<h2>Viewing <span class='muted'>#<?php echo $season_post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $season_post->id; ?></p>
<p>
	<strong>Season id:</strong>
	<?php echo $season_post->season_id; ?></p>
<p>
	<strong>Post id:</strong>
	<?php echo $season_post->post_id; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $season_post->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $season_post->updated_date; ?></p>

<?php echo Html::anchor('season/post/edit/'.$season_post->id, 'Edit'); ?> |
<?php echo Html::anchor('season/post', 'Back'); ?>