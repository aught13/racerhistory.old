<h2>Viewing <span class='muted'>#<?php echo $person_info->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $person_info->id; ?></p>
<p>
	<strong>Person id:</strong>
	<?php echo $person_info->person_id; ?></p>
<p>
	<strong>Info key:</strong>
	<?php echo $person_info->info_key; ?></p>
<p>
	<strong>Info value:</strong>
	<?php echo $person_info->info_value; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $person_info->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $person_info->updated_date; ?></p>

<?php echo Html::anchor('person/info/edit/'.$person_info->id, 'Edit'); ?> |
<?php echo Html::anchor('person/info', 'Back'); ?>