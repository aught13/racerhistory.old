<h2>Viewing <span class='muted'>#<?php echo $person_post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $person_post->id; ?></p>
<p>
	<strong>Person id:</strong>
	<?php echo $person_post->person_id; ?></p>
<p>
	<strong>Post id:</strong>
	<?php echo $person_post->post_id; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $person_post->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $person_post->updated_date; ?></p>

<?php echo Html::anchor('person/post/edit/'.$person_post->id, 'Edit'); ?> |
<?php echo Html::anchor('person/post', 'Back'); ?>