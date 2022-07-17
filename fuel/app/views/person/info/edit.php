<h2>Editing <span class='muted'>Person_info</span></h2>
<br>

<?php echo render('person/info/_form'); ?>
<p>
	<?php echo Html::anchor('person/info/view/'.$person_info->id, 'View'); ?> |
	<?php echo Html::anchor('person/info', 'Back'); ?></p>
