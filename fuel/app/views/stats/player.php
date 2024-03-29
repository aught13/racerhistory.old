<br>
<strong>Season Statistics</strong>
<?php if ($stats): ?>
<table id="table_1" class="stats_table sortable w3-responsive">
    <thead>
        <tr>
            <th>Season</th>
            <th>GP</th>
            <th>GS</th>
            <th>MP</th>
            <th>FGM</th>
            <th>FGA</th>
            <th>FG%</th>
            <th>3PM</th>
            <th>3PA</th>
            <th>3P%</th>
            <th>FTM</th>
            <th>FTA</th>
            <th>FT%</th>
            <th>ORB</th>
            <th>DRB</th>
            <th>RB</th>
            <th>PF</th>
            <th>AS</th>
            <th>TO</th>
            <th>A/T</th>
            <th>BL</th>
            <th>ST</th>
            <th>PTS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stats['player_season_stats'] as $item): ?>
        <tr>
            <td><?= $item->season_id; ?></td>
            <td><?= ($item->GP ?: '-'); ?></td>
            <td><?= ($item->GS ?: '-'); ?></td>
            <td><?= ($item->MIN ?: '-'); ?></td>
            <td><?= ($item->FGM ?: '-'); ?></td>
            <td><?= ($item->FGA ?: '-'); ?></td>
            <td><?= ($item->FGP ?: '-'); ?></td>
            <td><?= ($item->TPM ?: '-'); ?></td>
            <td><?= ($item->TPA ?: '-'); ?></td>
            <td><?= ($item->TPP ?: '-'); ?></td>
            <td><?= ($item->FTM ?: '-'); ?></td>
            <td><?= ($item->FTA ?: '-'); ?></td>
            <td><?= ($item->FTP ?: '-'); ?></td>
            <td><?= ($item->ORB ?: '-'); ?></td>
            <td><?= ($item->DRB ?: '-'); ?></td>
            <td><?= ($item->RB ?: '-'); ?></td>
            <td><?= ($item->PF ?: '-'); ?></td>
            <td><?= ($item->AST ?: '-'); ?></td>
            <td><?= ($item->TRN ?: '-'); ?></td>
            <td><?= ($item->ATT ?: '-'); ?></td>
            <td><?= ($item->BLK ?: '-'); ?></td>
            <td><?= ($item->STL ?: '-'); ?></td>
            <td><?= ($item->PTS ?: '-'); ?></td>

        </tr>
        <?php endforeach; ?>
        <?php foreach ($stats['player_career_stats'] as $item): ?>
        <tr style="font-weight: bold">
            <td>TOTAL</td>
            <td><?= ($item->GP ?: '-'); ?></td>
            <td><?= ($item->GS ?: '-'); ?></td>
            <td><?= ($item->MIN ?: '-'); ?></td>
            <td><?= ($item->FGM ?: '-'); ?></td>
            <td><?= ($item->FGA ?: '-'); ?></td>
            <td><?= ($item->FGP ?: '-'); ?></td>
            <td><?= ($item->TPM ?: '-'); ?></td>
            <td><?= ($item->TPA ?: '-'); ?></td>
            <td><?= ($item->TPP ?: '-'); ?></td>
            <td><?= ($item->FTM ?: '-'); ?></td>
            <td><?= ($item->FTA ?: '-'); ?></td>
            <td><?= ($item->FTP ?: '-'); ?></td>
            <td><?= ($item->ORB ?: '-'); ?></td>
            <td><?= ($item->DRB ?: '-'); ?></td>
            <td><?= ($item->RB ?: '-'); ?></td>
            <td><?= ($item->PF ?: '-'); ?></td>
            <td><?= ($item->AST ?: '-'); ?></td>
            <td><?= ($item->TRN ?: '-'); ?></td>
            <td><?= ($item->ATT ?: '-'); ?></td>
            <td><?= ($item->BLK ?: '-'); ?></td>
            <td><?= ($item->STL ?: '-'); ?></td>
            <td><?= ($item->PTS ?: '-'); ?></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<strong>Per Game Statistics</strong>
<table id="table_2" class="stats_table sortable w3-responsive">
    <thead>
        <tr>
            <th>Season</th>
            <th>GP</th>
            <th>GS</th>
            <th>MP</th>
            <th>FGM</th>
            <th>FTA</th>
            <th>3PM</th>
            <th>3PA</th>
            <th>FTM</th>
            <th>FTA</th>
            <th>ORB</th>
            <th>DRB</th>
            <th>RB</th>
            <th>PF</th>
            <th>AS</th>
            <th>TO</th>
            <th>BL</th>
            <th>ST</th>
            <th>PTS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stats['player_season_stats'] as $item): ?>
        <tr>
            <td><?= $item->season_id; ?></td>
            <td><?= ($item->GP ?: '-'); ?></td>
            <td><?= ($item->GS ?: '-'); ?></td>
            <td><?= ($item->MPG ? number_format($item->MPG,1,'.','') :'-'); ?></td>
            <td><?= ($item->FGMG ? number_format($item->FGMG,1,'.','') :'-'); ?></td>
            <td><?= ($item->FGAG ? number_format($item->FGAG,1,'.','') :'-'); ?></td>
            <td><?= ($item->TPMG ? number_format($item->TPMG,1,'.','') :'-'); ?></td>
            <td><?= ($item->TPAG ? number_format($item->TPAG,1,'.','') :'-'); ?></td>
            <td><?= ($item->FTMG ? number_format($item->FTMG,1,'.','') :'-'); ?></td>
            <td><?= ($item->FTAG ? number_format($item->FTAG,1,'.','') :'-'); ?></td>
            <td><?= ($item->ORBG ? number_format($item->ORBG,1,'.','') :'-'); ?></td>
            <td><?= ($item->DRBG ? number_format($item->DRBG,1,'.','') :'-'); ?></td>
            <td><?= ($item->RBG ? number_format($item->RBG,1,'.','') :'-'); ?></td>
            <td><?= ($item->PFG ? number_format($item->PFG,1,'.','') :'-'); ?></td>
            <td><?= ($item->ASG ? number_format($item->ASG,1,'.','') :'-'); ?></td>
            <td><?= ($item->TOG ? number_format($item->TOG,1,'.','') :'-'); ?></td>
            <td><?= ($item->BLG ? number_format($item->BLG,1,'.','') :'-'); ?></td>
            <td><?= ($item->STG ? number_format($item->STG,1,'.','') :'-'); ?></td>
            <td><?= ($item->PPG ? number_format($item->PPG,1,'.','') :'-'); ?></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<p>No Player_season_stats.</p>

<?php endif;  ?><p>

</p>
<script>
$(document).ready(function() {
    var t = $('#table_1').DataTable({

        dom: 'tr',
        columnDefs: [{
            "orderSequence": ["desc", "asc"],
            "targets": ['_all']
        }],
        select: {
            style: 'multi'
        }
    });
});
$(document).ready(function() {
    var t = $('#table_2').DataTable({

        dom: 'tr',
        columnDefs: [{
            "orderSequence": ["desc", "asc"],
            "targets": ['_all']
        }],
        select: {
            style: 'multi'
        }
    });
});
</script>