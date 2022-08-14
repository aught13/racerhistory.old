<?php 
/**
 * Single season view.
 * 
 * Single season content view template for display within site template main 
 * content blocks. Displays W-L records, Individual game results and information, 
 * player roster, and stats. Links to individual game view, individual player 
 * view, and back to all seasons view. 
 * 
 * @param Model_Seasons $season_info Contains Model_Season_Info with related Model_Game, Model_Player_Season_Stats
 * @param Model_Seasons $record Contains record derived from game table returned as Model_Season_Info
 */
//Declare counters
$gp=0; $points=0; $conf=0;
?>
<table id="table_1" class="nowrap">
    <thead class="">
        <tr>
            <th>Season</th>
            <th>Overall</th>
            <th>Home</th>
            <th>Road</th>
            <th>Neutral</th>
            <th>Conference</th>
            <th>Finish</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_object($record)): ?>
        <?php foreach ($record as $item): ?>
        <tr>
            <td>
                <?= (is_object($season_info) ? (($season_info->season_identifier-1).' - '.$season_info->season_identifier):""); ?> 
            </td>
            <td><?= $item->wins.'-'.$item->losses; ?></td>
            <td><?= $item->homew.'-'.$item->homel; ?></td>
            <td><?= $item->roadw.'-'.$item->roadl; ?></td>
            <td><?= $item->neuw.'-'.$item->neul; ?></td>
            <td><?= $item->confw.'-'.$item->confl; ?></td>
            <td><?= $item->fin; ?></th>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>

<?php if ($games): ?>

<table id="table_2" class="display compact w3-small">
    <thead class="sticky">
        <tr>
            <th>Game date</th>
            <th>Opponent</th>
            <th>Location</th>
            <th>W/L</th>
            <th>Score</th>
            <th>Info</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach ($games as $item): ?>
        <!-- <pre>  <?php  $points += $item->pts_mur; $gp += 1;    //           print_r($item); ?> </pre> -->
        <tr>


            <td style="white-space: nowrap">
                <?= date_format(date_create($item->game_date), 'F d, Y'); ?>
            </td>
            <td style="white-space: nowrap">
                <?= (isset($item->mur_rank) ? '#'.$item->mur_rank.' ' : '');?>Murray St
                <?= (($item->hrn == 1) || ($item->hrn == 3) ? ' vs ': ' @ '); ?>
                <?= (isset($item->opp_rank) ? '#'.$item->opp_rank.' ': ''); ?>
                <?= $item->opponent->opponent_name; ?>
                <?= (isset($item->game_type->conf) ? (($item->game_type->conf == 1 && $conf=1) ? "*" : "") : ""); ?>
            </td>
            <td style="white-space: nowrap">
                <?=$item->site->site_name.', '.$item->site->site_state ?>
            </td>
            <td>
                <?= ($item->w == 1 ? 'W' : ($item->l == 1 ? 'L' : '')); ?>
            </td>
            <td style="white-space: nowrap">
                <?= $item->pts_mur.'-'.$item->pts_opp ?>
                <?= (isset($item->overtime) ? ($item->overtime > 1 ? " ".$item->overtime : " OT") : "" );?>
            </td>
            <td>
                <?= (isset($item->game_type->conf) ? ($item->game_type->conf != 1 ? $item->game_type->game_type_name.' ' : "") : ""); ?>
                <?= (isset($item->notes) ? $item->notes : ""); ?>
            </td>
            <td>
                <?= \Html::anchor('games/view/'.$item->id, '<i class="fa fa-eye"></i>', array('class' => 'w3-small')); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= ($conf === 1 ? '<p class="w3-right w3-small"> * Conference Game </p>' : "");?>
<?php else: ?>
<p>No Games.</p>

<?php endif; ?>
<p>
    <?php if (is_object($season_info)): ?>
    <?php if ($season_info->player_season_stats): ?>
<table id="table_3" class="nowrap display subcomp stats_table order-column">
    <thead>
        <tr>
            <th>Name</th>
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
            <th>BL</th>
            <th>ST</th>
            <th>PTS</th>
            <th>PPG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($season_info->player_season_stats as $item): ?>
        <tr>
            <td><?= $item->person->first.' '.$item->person->last; ?></td>
            <td><?= $item->GP; ?></td>
            <td><?= $item->GS; ?></td>
            <td><?= $item->MIN; ?></td>
            <td><?= $item->FGM; ?></td>
            <td><?= $item->FGA; ?></td>
            <td><?= ($item->FGA > 0 ? number_format(($item->FGM/$item->FGA),3,'.','') : ""); ?></td>
            <td><?= $item->TPM; ?></td>
            <td><?= $item->TPA; ?></td>
            <td><?= ($item->TPA > 0 ? number_format(($item->TPM/$item->TPA),3,'.','') : ""); ?></td>
            <td><?= $item->FTM; ?></td>
            <td><?= $item->FTA; ?></td>
            <td><?= ($item->FTA > 0 ? number_format(($item->FTM/$item->FTA),3,'.','') : ""); ?></td>
            <td><?= $item->ORB; ?></td>
            <td><?= $item->DRB; ?></td>
            <td><?= $item->RB; ?></td>
            <td><?= $item->PF; ?></td>
            <td><?= $item->AST; ?></td>
            <td><?= $item->TRN; ?></td>
            <td><?= $item->BLK; ?></td>
            <td><?= $item->STL; ?></td>
            <td><?= $item->PTS; ?></td>
            <td><?= ($item->GP > 0 ? number_format(($item->PTS/$item->GP),2,'.','') : ""); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <td>TEAM</td>
        <td><?= $gp; ?></td>
        <td></td>
        <td><?= $season_info->season_total_stats->MIN; ?></td>
        <td><?= $season_info->season_total_stats->FGM; ?></td>
        <td><?= $season_info->season_total_stats->FGA; ?></td>
        <td><?= (isset($season_info->season_total_stats->FGP) ? number_format($season_info->season_total_stats->FGP,3,'.','') : "-");?></td>
        <td><?= $season_info->season_total_stats->TPM; ?></td>
        <td><?= $season_info->season_total_stats->TPA; ?></td>
        <td><?= (isset($season_info->season_total_stats->TPP) ? number_format($season_info->season_total_stats->TPP,3,'.','') : "-");?></td>
        <td><?= $season_info->season_total_stats->FTM; ?></td>
        <td><?= $season_info->season_total_stats->FTA; ?></td>
        <td><?= (isset($season_info->season_total_stats->FTP) ? number_format($season_info->season_total_stats->FTP,3,'.','') : "-");?></td>
        <td><?= $season_info->season_total_stats->ORB; ?></td>
        <td><?= $season_info->season_total_stats->DRB; ?></td>
        <td><?= $season_info->season_total_stats->RB; ?></td>
        <td><?= $season_info->season_total_stats->PF; ?></td>
        <td><?= $season_info->season_total_stats->AST; ?></td>
        <td><?= $season_info->season_total_stats->TRN; ?></td>
        <td><?= $season_info->season_total_stats->BLK; ?></td>
        <td><?= $season_info->season_total_stats->STL; ?></td>
        <td><?= $points; ?></td>
        <td><?= ($gp>0 ? number_format(($points/$gp),2,'.','') : "");?></td>
        </td>
    </tr>

</table>

</p>
<?php endif; ?>
<?php else: ?>
<p>No Player_season_stats.</p>

<?php endif;  ?>

<script>
$(document).ready(function() {
    $('#table_1').DataTable({
        "dom": 'tr',
        "searching": false,
        "order": [],
        "paging": false,
        "ordering": false,
        "columnDefs": [{
            "className": 'dt-center',
            "targets": '_all'
        }]
    });
});
$(document).ready(function() {
    $('#table_2').DataTable({
        "dom": 'tr',
        "searching": false,
        "order": [],
        "pageLength": 50,
        "paging": false,
        "ordering": false,
        "columnDefs": [{
                "orderSequence": ["desc"],
                "targets": ['_all']
            },
            {
                "className": 'dt-head-left',
                "targets": [0, 2, 3, 4, 5, 6, 7]
            },
            {
                "className": 'dt-body-left',
                "targets": [0, 4, 5, 7, 8]
            },
            {
                "className": 'dt-nowrap',
                "targets": [0, 2, 4, 5, 6, 7]
            },
            {
                "className": 'dt-center',
                "targets": '_all'
            }
        ]
    });
});
$(document).ready(function() {
    $('#table_3').DataTable({
        "dom": 'tr',
        "searching": false,
        "order": [21, 'desc'],
        "pageLength": 50,
        "paging": false,
        "columnDefs": [{
                "orderSequence": ["desc", "asc"],
                "targets": ['_all']
            },
            {
                "className": 'dt-body-left',
                "targets": 0
            },
            {
                "className": 'dt-center',
                "targets": '_all'
            }
        ]
    });
});
</script>