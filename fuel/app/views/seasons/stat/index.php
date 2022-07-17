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
$rk = 1;    
    ?>

<h2>Listing <span class='muted'>
        <?php if (isset($flag)): ?>
        Career Statistics
        <?php else: ?>
        Individual Season Statistics
        <?php endif; ?>    
    </span></h2>

<br>

<table id="table_id" class="cell-border compact hover order-column nowrap stats_table w3-responsive" >
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
			<th>FTA</th>
                        <th>FTP</th>
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
		</tr>
	</thead>
	<tbody>
<?php foreach ($player_season_stats as $item): ?>
                <tr>
                        <td></td>
			<td><?= Html::anchor('https://www.racerhistory.com/players/index.php?id='.$item->person->id, $item->person->first. ' ' .$item->person->last) ?></td>
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
                        <td><?= number_format($item->FGP,3,'.',''); ?></td>
			<td><?= $item->TPM; ?></td>
			<td><?= $item->TPA; ?></td>
                        <td><?= number_format($item->TPP,3,'.',''); ?></td>
			<td><?= $item->FTM; ?></td>
			<td><?= $item->FTA; ?></td>
                        <td><?= number_format($item->FTP,3,'.',''); ?></td>
			<td><?= $item->ORB; ?></td>
			<td><?= $item->DRB; ?></td>
			<td><?= $item->RB; ?></td>
			<td><?= $item->PF; ?></td>
			<td><?= $item->AST; ?></td>
			<td><?= $item->TRN; ?></td>
                        <td><?= number_format($item->ATR,2,'.',''); ?></td>
			<td><?= $item->BLK; ?></td>
			<td><?= $item->STL; ?></td>
			<td><?= $item->PTS; ?></td>

		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Something went wrong</p>

<?php endif; ?><p>

</p>
<script>
$(document).ready( function () {
    var t = $('#table_id').DataTable( {
        stateSave : true,
        fixedHeader: {
            headerOffset: 45
            
        },
        stateSaveCallback: function (settings, data) {
            //encode current state to base64
            const state = btoa(JSON.stringify(data));
            //get query part of the url
            let searchParams = new URLSearchParams(window.location.search);
            //add encoded state into query part
            searchParams.set($(this).attr('id') + '_state', state);
            //form url with new query parameter
            const newRelativePathQuery = window.location.pathname + '?' + searchParams.toString() + window.location.hash;
            //push new url into history object, this will change the current url without need of reload
            history.pushState(null, '', newRelativePathQuery);
        },
        stateLoadCallback: function (settings) {
            const url = new URL(window.location.href);
            let state = url.searchParams.get($(this).attr('id') + '_state');

            //check the current url to see if we've got a state to restore
            if (!state) {
                return null;
            }

            //if we got the state, decode it and add current timestamp
            state = JSON.parse(atob(state));
            state['time'] = Date.now();

            return state;
        },
        buttons : [
            {
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
            }
        ],
        dom : 'Bltpr',

        pageLength : 25,
        columnDefs : [ 
            { "orderSequence": [ "desc", "asc" ], "targets": ['_all']  }
        ],
        select : {
            style : 'multi'            
        }
    } );
    
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    
    
    
} );
</script>
