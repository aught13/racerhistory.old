<?php

/**
 * Stats view.
 * 
 * Stats view for single season and career statistics. 
 * 
 * @param $player_season_stats Contains Model_Full_Season_Stat or Model_Player_Career_Stat
 * @param $flag single season or career
 * 
 */

if ($player_season_stats): 
$current = date("Y");
?>

<div class="table_container">
<h2>Listing <?= (isset($flag) ? 'Career Statistics' : 'Individual Season Statistics'); ?></h2>
    <table id="stats" class="cell-border compact hover order-column nowrap stats_table w3-hide">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <?php if (isset($flag)): ?>
                <th>From</th>
                <th>Till</th>
                <th>Yrs</>
                <?php else: ?>
                <th>Season</th>
                <?php endif; ?>
                <th>GP</th>
                <th>GS</th>
                <th>MIN</th>
                <th>FGM</th>
                <th>FGA</th>
                <th>FGP</th>
                <th>TPM</th>
                <th>TPA</th>
                <th>TPP</th>
                <th>FTM</th>
                <th>FTA</th>
                <th>FTP</th>
                <th>ORB</th>
                <th>DRB</th>
                <th>RB</th>
                <th>PF</th>
                <th>AST</th>
                <th>TRN</th>
                <th>ATO</th>
                <th>BLK</th>
                <th>STL</th>
                <th>PTS</th>
                <th>PPG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($player_season_stats as $item): ?>
            <?= (isset($flag) ? (($item->finish !== $current XOR ($current + 1)) ? '<tr style = "font-weight: bold;">' : '<tr>') : (($item->season_id !== $current XOR ($current + 1)) ? '<tr style = "font-weight: bold;">' : '<tr>'));?>
            <td></td>
            <td><?= Html::anchor('players/view/'.$item->person->id, $item->person->first. ' ' .$item->person->last) ?>
            </td>
            <?php if (isset($flag)): ?>
            <td><?= $item->start; ?></td>
            <td><?= $item->finish; ?></td>
            <td><?= $item->seasons; ?></td>
            <?php else: ?>
            <td><?= $item->season_id; ?></td>
            <?php endif; ?>
            <td><?= $item->GP; ?></td>
            <td><?= $item->GS; ?></td>
            <td><?= $item->MIN; ?></td>
            <td><?= $item->FGM; ?></td>
            <td><?= $item->FGA; ?></td>
            <td><?= (isset($item->FGP) ? number_format($item->FGP,3,'.','') : ''); ?></td>
            <td><?= $item->TPM; ?></td>
            <td><?= $item->TPA; ?></td>
            <td><?= ($item->TPM>0 ? number_format($item->TPP,3,'.','') : ''); ?></td>
            <td><?= $item->FTM; ?></td>
            <td><?= $item->FTA; ?></td>
            <td><?= ($item->FTM>0 ? number_format($item->FTP,3,'.','') : ''); ?></td>
            <td><?= $item->ORB; ?></td>
            <td><?= $item->DRB; ?></td>
            <td><?= $item->RB; ?></td>
            <td><?= $item->PF; ?></td>
            <td><?= $item->AST; ?></td>
            <td><?= $item->TRN; ?></td>
            <td><?= (isset($item->ATR) ? number_format($item->ATR,2,'.','') : ''); ?></td>
            <td><?= $item->BLK; ?></td>
            <td><?= $item->STL; ?></td>
            <td><?= $item->PTS; ?></td>
            <td><?= ($item->GP>0 ? number_format(($item->PTS/$item->GP),1,'.','') : ''); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
<p>Something went wrong</p>

<?php endif; ?><p>

</p>
<script>
$(document).ready(function() {
    var h = $('#stats').removeClass('w3-hide');
    var t = $('#stats').DataTable({
        pageLength: 100,
        stateSave: true,
        fixedHeader : {
            headerOffset: 46
            },
        stateLoadCallback: function (settings) {
            const url = new URL(window.location.href);
            let state = url.searchParams.get($(this).attr('id') + '_state');
            //check the current url to see if we've got a state to restore
            if (!state) { return null; }
            //if we got the state, decode it and add current timestamp
            state = JSON.parse(atob(state));
            state['time'] = Date.now();
            return state;
        },
        stateSaveCallback: function (settings, data) {
            //encode current state to base64
            const object = {start:data.start, length:data.length, page:data.page, searchBuilder:data.searchBuilder, order:data.order};
            const state = btoa(JSON.stringify(object));
            //get query part of the url
            let searchParams = new URLSearchParams(window.location.search);
            //add encoded state into query part
            searchParams.set($(this).attr('id') + '_state', state);
            //form url with new query parameter
            const newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
            //push new url into history object, this will change the current url without need of reload
            history.pushState(null, '', newRelativePathQuery);
        },
        buttons: [{
                extend: 'copyHtml5',
                text: 'Copy to Clipboard',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Save as PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
            {
                extend: 'searchBuilder',
                text: 'Filter Results'
            },
        ],
        dom: 'Bl<t>pr',
        columnDefs: [{
            "orderSequence": ["desc", "asc"],
            "targets": ['_all']
        }],
        select: {
            style: 'multi'
        }
    });

    t.on('order.dt search.dt', function() {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    h.className += " w3-hide";
    h.className = h.className.replace(" w3-hide", "");
});
</script>