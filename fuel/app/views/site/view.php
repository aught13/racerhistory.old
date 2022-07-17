<h2>Viewing <span class='muted'>#<?php echo $site->id; ?></span></h2>

<p>
	<strong>ID:</strong>
	<?php echo $site->id; ?></p>
<p>
	<strong>Site name:</strong>
	<?php echo $site->site_name; ?></p>
<p>
	<strong>Site state:</strong>
	<?php echo $site->site_state; ?></p>
<p>
	<strong>Site arena:</strong>
	<?php echo $site->site_arena; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $site->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $site->updated_date; ?></p>

<?php echo Html::anchor('site/edit/'.$site->id, 'Edit'); ?> |
<?php echo Html::anchor('site', 'Back'); ?>