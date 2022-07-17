<?php 
/**
 * Seasons index page.
 * 
 * Seasons index view for display within site template main content blocks. 
 * Displays W-L records, conference finish, and info for all seasons. Links to 
 * individual season view.
 * 
 * @param Model_Seasons $record Contains Model_Seasons::get_season_record()
 */
?>
<h2>All <span class='muted'>Seasons</span></h2>
<br>

<?php if ($record): ?>

<table id="table_seasons" class="compact">
    <thead>
        <tr>
            <th>Season</th>
            <th>Record</th>
            <th>Home</th>
            <th>Road</th>
            <th>Neutral</th>
            <th>Conference</th>
            <th>Finish</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($record as $item): $start=$item->season-1;?>
        <tr>
            <td><?php echo $start.'-'.$item->season; ?></td>
            <td><?php echo $item->wins.'-'.$item->losses; ?></td>
            <td><?php echo $item->homew.'-'.$item->homel; ?></td>
            <td><?php echo $item->roadw.'-'.$item->roadl; ?></td>
            <td><?php echo $item->neuw.'-'.$item->neul; ?></td>
            <td><?php echo $item->confw.'-'.$item->confl; ?></td>
            <td><?php echo $item->fin; ?></th>
            <td>
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <?php echo Html::anchor('seasons/view/'.$item->season, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
                    </div>

            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<?php else: ?>
<p>No Season_infos.</p>

<?php endif; ?><p>


</p>
<script>
$(document).ready(function() {
    $('#table_seasons').DataTable({
        "dom": 'tr',
        "searching": false,
        "order": [],
        "pageLength": 50,
        "paging": false,
        "ordering": false,
        "columnDefs": [{
            "className": 'dt-center',
            "targets": '_all'
        }]
    });
});
</script>