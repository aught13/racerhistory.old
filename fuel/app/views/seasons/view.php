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
<?php if (is_object($record)): ?>
<?php foreach ($record as $item): ?>
<table id="summary" class="nowrap">
    <thead>
        <tr>
            <th>Season</th>
            <th>Overall</th>
            <th class="w3-hide-small">Home</th>
            <th class="w3-hide-small">Road</th>
            <th class="w3-hide-small">Neutral</th>
            <th><span class="w3-hide-small">Conference</span><span class="w3-hide-medium w3-hide-large">Conf</span></th>
            <th>Finish</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= (is_object($season_info) ? (($season_info->season_identifier-1).' - '.$season_info->season_identifier):""); ?> 
            </td>
            <td><?= $item->wins.'-'.$item->losses; ?></td>
            <td class="w3-hide-small"><?= $item->homew.'-'.$item->homel; ?></td>
            <td class="w3-hide-small"><?= $item->roadw.'-'.$item->roadl; ?></td>
            <td class="w3-hide-small"><?= $item->neuw.'-'.$item->neul; ?></td>
            <td><?= $item->confw.'-'.$item->confl; ?></td>
            <td><?= $item->fin; ?></th>
        </tr>
    </tbody>
</table>    
<table id="msummary" class="nowrap w3-hide-medium w3-hide-large">
    <thead>        
        <tr class="w3-hide-medium w3-hide-large">
            <th>Home</th>
            <th>Road</th>
            <th>Neutral</th>
        </tr>
    </thead>
    <tbody>    
        <tr class="w3-hide-medium w3-hide-large">
            <td><?= $item->homew.'-'.$item->homel; ?></td>
            <td><?= $item->roadw.'-'.$item->roadl; ?></td>
            <td><?= $item->neuw.'-'.$item->neul; ?></td>
        </tr>
    </tbody>
</table>
<?php endforeach; ?>
<?php endif; ?>
<?= (!$current_user ? '' : \Html::anchor('admin/game/create/'.(is_object($season_info) ? $season_info->season_identifier : ''), 'Add Game', array('class' => 'w3-button'))); ?>
<?php if ($games): ?>

<table id="games" class="display compact w3-small">
    <thead>
        <tr>
            <th>Game date</th>
            <th>Opponent</th>
            <th class="w3-hide-small">Location</th>
            <th>W/L</th>
            <th>Score</th>
            <th class="w3-hide-small">Info</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach ($games as $item): ?>
        <?php  $points += $item->pts_mur; $gp += 1;?>
        <tr>
            <td style="white-space: nowrap"><span class="w3-hide-small"><?= date_format(date_create($item->game_date), 'F d, Y'); ?></span><span class="w3-hide-medium w3-hide-large"><?= date_format(date_create($item->game_date), 'n/j/Y'); ?></span>                
            </td>
            <td style="white-space: nowrap">
                <?= (isset($item->mur_rank) ? '#'.$item->mur_rank.' ' : '');?><span class="w3-hide-small">Murray St</span>
                <?= (($item->hrn == 1) || ($item->hrn == 3) ? ' VS ': ' @ '); ?>
                <?= (isset($item->opp_rank) ? '#'.$item->opp_rank.' ': ''); ?>
                <span class="w3-hide-small"><?= $item->opponent->opponent_name; ?></span><span class="w3-hide-medium w3-hide-large"><?= $item->opponent->opponent_short; ?></span>
                <?= (isset($item->game_type->conf) ? (($item->game_type->conf == 1 && $conf=1) ? "*" : "") : ""); ?>
            </td>
            <td style="white-space: nowrap" class="w3-hide-small">
                <?=$item->site->site_name.', '.$item->site->site_state ?>
            </td>
            <td>
                <?= ($item->w == 1 ? 'W' : ($item->l == 1 ? 'L' : '')); ?>
            </td>
            <td style="white-space: nowrap">
                <?= $item->pts_mur.'-'.$item->pts_opp ?>
                <span class="w3-hide-small"><?= (isset($item->overtime) ? ($item->overtime > 1 ? " ".$item->overtime : " OT") : "" );?></span>
            </td>
            <td class="w3-hide-small">
                <?= (isset($item->game_type->conf) ? ($item->game_type->conf != 1 ? $item->game_type->game_type_name.' ' : "") : ""); ?>
                <?= (isset($item->notes) ? $item->notes : ""); ?>
            </td>
            <td>
                <?= \Html::anchor('games/view/'.$item->id, '<i class="fa fa-eye"></i>', array('class' => 'w3-small')); ?>
                <?= (!$current_user ? '' : \Html::anchor('admin/game/edit/'.$item->id, '<i class="fa fa-pencil"></i>', ['class' => 'w3-small, w3-green'])); ?>
                <?= (!$current_user ? '' : \Html::anchor('admin/game/delete/'.$item->id, '<i class="fa fa-trash"></i>', ['onclick' => "return confirm('Are you sure?')", 'class' => 'w3-small, w3-red'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<span><?= ($conf === 1 ? '<p class="w3-right w3-small"> * Conference Game </p>' : "");?></span>
<?php else: ?>
<p>No Games.</p>

<?php endif; ?>
<p>
    <?php if (is_object($season_info)): ?>
    <?php if ($season_info->player_season_stats): ?>
<table id="stats" class="nowrap display subcomp stats_table order-column">
    <thead>
        <tr>
            <th>Name</th>
            <th>GP</th>
            <th class="w3-hide-small">GS</th>
            <th class="w3-hide-small">MP</th>
            <th>FGM</th>
            <th class="w3-hide-small">FGA</th>
            <th class="w3-hide-small">FG%</th>
            <th>3PM</th>
            <th class="w3-hide-small">3PA</th>
            <th class="w3-hide-small">3P%</th>
            <th>FTM</th>
            <th class="w3-hide-small">FTA</th>
            <th class="w3-hide-small">FT%</th>
            <th class="w3-hide-small">ORB</th>
            <th class="w3-hide-small">DRB</th>
            <th>RB</th>
            <th class="w3-hide-small">PF</th>
            <th>AS</th>
            <th class="w3-hide-small">TO</th>
            <th>BL</th>
            <th>ST</th>
            <th>PTS</th>
            <th class="w3-hide-small">PPG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($season_info->player_season_stats as $item): ?>
        <tr>
            <td><?= $item->person->first.' '.$item->person->last; ?></td>
            <td><?= $item->GP; ?></td>
            <td class="w3-hide-small"><?= $item->GS; ?></td>
            <td class="w3-hide-small"><?= $item->MIN; ?></td>
            <td><?= $item->FGM; ?></td>
            <td class="w3-hide-small"><?= $item->FGA; ?></td>
            <td class="w3-hide-small"><?= ($item->FGA > 0 ? number_format(($item->FGM/$item->FGA),3,'.','') : ""); ?></td>
            <td><?= $item->TPM; ?></td>
            <td class="w3-hide-small"><?= $item->TPA; ?></td>
            <td class="w3-hide-small"><?= ($item->TPA > 0 ? number_format(($item->TPM/$item->TPA),3,'.','') : ""); ?></td>
            <td><?= $item->FTM; ?></td>
            <td class="w3-hide-small"><?= $item->FTA; ?></td>
            <td class="w3-hide-small"><?= ($item->FTA > 0 ? number_format(($item->FTM/$item->FTA),3,'.','') : ""); ?></td>
            <td class="w3-hide-small"><?= $item->ORB; ?></td>
            <td class="w3-hide-small"><?= $item->DRB; ?></td>
            <td><?= $item->RB; ?></td>
            <td class="w3-hide-small"><?= $item->PF; ?></td>
            <td><?= $item->AST; ?></td>
            <td class="w3-hide-small"><?= $item->TRN; ?></td>
            <td><?= $item->BLK; ?></td>
            <td><?= $item->STL; ?></td>
            <td><?= $item->PTS; ?></td>
            <td class="w3-hide-small"><?= ($item->GP > 0 ? number_format(($item->PTS/$item->GP),2,'.','') : ""); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <td>TEAM</td>
        <td><?= $gp; ?></td>
        <td class="w3-hide-small"></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->MIN; ?></td>
        <td><?= $season_info->season_total_stats->FGM; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->FGA; ?></td>
        <td class="w3-hide-small"><?= (isset($season_info->season_total_stats->FGP) ? number_format($season_info->season_total_stats->FGP,3,'.','') : "-");?></td>
        <td><?= $season_info->season_total_stats->TPM; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->TPA; ?></td>
        <td class="w3-hide-small"><?= (isset($season_info->season_total_stats->TPP) ? number_format($season_info->season_total_stats->TPP,3,'.','') : "-");?></td>
        <td><?= $season_info->season_total_stats->FTM; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->FTA; ?></td>
        <td class="w3-hide-small"><?= (isset($season_info->season_total_stats->FTP) ? number_format($season_info->season_total_stats->FTP,3,'.','') : "-");?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->ORB; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->DRB; ?></td>
        <td><?= $season_info->season_total_stats->RB; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->PF; ?></td>
        <td><?= $season_info->season_total_stats->AST; ?></td>
        <td class="w3-hide-small"><?= $season_info->season_total_stats->TRN; ?></td>
        <td><?= $season_info->season_total_stats->BLK; ?></td>
        <td><?= $season_info->season_total_stats->STL; ?></td>
        <td><?= $points; ?></td>
        <td class="w3-hide-small"><?= ($gp>0 ? number_format(($points/$gp),2,'.','') : "");?></td>
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
    $('#summary').DataTable({
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
    $('#msummary').DataTable({
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
    $('#games').DataTable({
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
                "targets": [0, 2, 3, 4]
            },
            {
                "className": 'dt-body-left',
                "targets": [0, 1, 2]
            },
            {
                "className": 'dt-nowrap',
                "targets": [0, 1, 2]
            },
            {
                "className": 'dt-center',
                "targets": '_all'
            }
        ]
    });
});
$(document).ready(function() {
    $('#stats').DataTable({
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