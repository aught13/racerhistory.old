<h2>Viewing <span class='muted'>#<?php echo $site_info->id; ?></span></h2>

<p>
	<strong>ID:</strong>
	<?php echo $site_info->ID; ?></p>
<p>
	<strong>Site id:</strong>
	<?php echo $site_info->site_id; ?></p>
<p>
	<strong>Info key:</strong>
	<?php echo $site_info->info_key; ?></p>
<p>
	<strong>Info value:</strong>
	<?php echo $site_info->info_value; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $site_info->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $site_info->updated_date; ?></p>

<?php echo Html::anchor('site/info/edit/'.$site_info->id, 'Edit'); ?> |
<?php echo Html::anchor('site/info', 'Back'); ?>