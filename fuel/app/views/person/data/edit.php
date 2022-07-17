<h2>Editing <span class='muted'>Person_datum</span></h2>
<br>

<?php echo render('person/datum/_form'); ?>
<p>
	<?php echo Html::anchor('person/datum/view/'.$person_data->id, 'View'); ?> |
	<?php echo Html::anchor('person/datum', 'Back'); ?></p>
