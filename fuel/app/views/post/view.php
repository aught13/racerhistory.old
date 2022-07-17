<h2>Viewing <span class='muted'>#<?php echo $post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $post->id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Text:</strong>
	<?php echo $post->text; ?></p>
<p>
	<strong>Ref id:</strong>
	<?php echo $post->ref_id; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $post->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $post->updated_date; ?></p>

<?php echo Html::anchor('post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('post', 'Back'); ?>