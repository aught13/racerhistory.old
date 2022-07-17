<h2>Editing <span class='muted'>Site_info</span></h2>
<br>

<?php echo render('site/info/_form'); ?>
<p>
	<?php echo Html::anchor('site/info/view/'.$site_info->id, 'View'); ?> |
	<?php echo Html::anchor('site/info', 'Back'); ?></p>
