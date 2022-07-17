<h2>Viewing <span class='muted'>#<?php echo $season_info->id; ?></span></h2>
<pre><?php print_r($season_info); ?></pre>
<p>
	<strong>Id:</strong>
	<?php echo $season_info->id; ?></p>
<p>
	<strong>Season:</strong>
	<?php echo $season_info->season; ?></p>
<p>
	<strong>Fin:</strong>
	<?php echo $season_info->fin; ?></p>
<p>
	<strong>Notes:</strong>
	<?php echo $season_info->notes; ?></p>
<p>
	<strong>Img:</strong>
	<?php echo $season_info->img; ?></p>
<p>
	<strong>Submitted date:</strong>
	<?php echo $season_info->submitted_date; ?></p>
<p>
	<strong>Updated date:</strong>
	<?php echo $season_info->updated_date; ?></p>

<?php echo Html::anchor('season/info/edit/'.$season_info->id, 'Edit'); ?> |
<?php echo Html::anchor('season/info', 'Back'); ?>