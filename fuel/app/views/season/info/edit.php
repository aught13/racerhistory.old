<h2>Editing <span class='muted'>Season_info</span></h2>
<br>

<?php echo render('season/info/_form'); ?>
<p>
	<?php echo Html::anchor('season/info/view/'.$season_info->id, 'View'); ?> |
	<?php echo Html::anchor('season/info', 'Back'); ?></p>
