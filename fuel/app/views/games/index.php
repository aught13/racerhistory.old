<?php if ($games): ?>

<table id="table_2" class="display compact w3-hide">
    <thead>
        <tr>
            <th></th>
            <th>Season</th>
            <th>Date</th>
            <th>Mur Rk</th>
            <th>Opponent</th>
            <th>Opp Rk</th>
            <th>Location</th>
            <th>Court</th>
            <th>Post</th>
            <th>W/L</th>
            <th>Mur</th>
            <th>Opp</th>
            <th>OT</th>
            <th>Type</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach ($games as $item): ?>
        <tr>
            <td></td>
            <td style="white-space: nowrap">
                <?= $item->season; ?>
            </td>
            <td style="white-space: nowrap">
                <?= date_format(date_create($item->game_date), 'Y-m-d'); ?>
            </td>
            <td><?= (isset($item->mur_rank) ? $item->mur_rank : '-');?></td>
            <td style="white-space: nowrap">
                <?= $item->opponent->opponent_name; ?>
            </td>
            <td><?= (isset($item->opp_rank) ? $item->opp_rank : '-'); ?></td>
            <td style="white-space: nowrap">
                <?=$item->site->site_name.', '.$item->site->site_state ?>
            </td>
            <td><?php switch($item->hrn) {case 1: echo 'Home'; break; case 2: echo 'Road'; break; case 3: echo 'Neutral'; break; } ?></td>
            <td><?php switch ($item->post) {case 0: echo 'N'; break; case 1: echo 'Y'; break;} ?></td>
            <td>
                <?= ($item->w == 1 ? 'W' : ($item->l == 1 ? 'L' : '')); ?>
            </td>
            <td><?= $item->pts_mur; ?></td>
            <td><?= $item->pts_opp; ?></td>
            <td><?= (isset($item->overtime) ? ($item->overtime > 1 ? " ".$item->overtime : " OT") : "" );?></td>
            <td><?= $item->game_type->game_type_name; ?></td>
            <td>
                <?= \Html::anchor('games/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<p>No Games.</p>

<?php endif; ?>
<p>
	<?php // echo \Html::anchor('admin/game/create', 'Add new Game', array('class' => 'btn btn-success')); ?>
</p>
<script>
$(document).ready(function() {
    var h = $('#table_2').removeClass('w3-hide');
    var t = $('#table_2').DataTable({
        stateSave: true,
        fixedHeader : {
            headerOffset: $('#topNav').outerHeight()
            },
        pageLength: 100,
        stateSaveCallback: function(settings, data) {
            //encode current state to base64
            const state = btoa(JSON.stringify(data));
            //get query part of the url
            let searchParams = new URLSearchParams(window.location.search);
            //add encoded state into query part
            searchParams.set($(this).attr('id') + '_state', state);
            //form url with new query parameter
            const newRelativePathQuery = window.location.pathname + '?' + searchParams.toString() +
                window.location.hash;
            //push new url into history object, this will change the current url without need of reload
            history.pushState(null, '', newRelativePathQuery);
        },
        stateLoadCallback: function(settings) {
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
        buttons: [
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
        dom: 'Bltpr',
        columnDefs: {
            "orderSequence": ["desc", "asc"],
            "targets": ['_all']
        },
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