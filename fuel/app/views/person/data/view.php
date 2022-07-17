<h2>Viewing <span class='muted'>#<?php echo $person_data->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $person_data->id; ?></p>
<p>
	<strong>Person id:</strong>
	<?php echo $person_data->person_id; ?></p>
<p>
	<strong>Data key:</strong>
	<?php echo $person_data->data_key; ?></p>
<p>
	<strong>Data value:</strong>
	<?php echo $person_data->data_value; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $person_data->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $person_data->updated_date; ?></p>

<?php echo Html::anchor('person/data/edit/'.$person_data->id, 'Edit'); ?> |
<?php echo Html::anchor('person/data', 'Back'); ?>