<?php
/**
 * Games view.
 * 
 * Index view of all games 
 *   
 */
?>

<table id="games" class="display compact">
    <thead>
        <tr>
            <th>#</th>
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
            <th> </th>
        </tr>
    </thead>
</table>
<script>
$(document).ready(function() {
    var t = $('#games').DataTable({
        processing: true,
        ajax: {
            url: 'ajax/games.json',
            type: 'POST',
            dataSrc: ''
        },
        columns: [
            {data: 'num'},
            {data: 'season'},
            {data: 'date'},
            {data: 'mur_rk'},
            {data: 'opponent'},
            {data: 'opp_rk'},
            {data: 'location'},
            {data: 'court'},
            {data: 'post'},
            {data: 'wl'},
            {data: 'pts_mur'},
            {data: 'pts_opp'},
            {data: 'ot'},
            {data: 'type'},
            {data: 'link'}
        ],
        stateSave: true,
        fixedHeader : {
            headerOffset: 46
        },
        pageLength: 100,
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
        dom: 'Bl<t>pr',
        columnDefs: [
            {
                orderSequence: ["desc", "asc"],
                targets: ['_all']
            },
            {   
                searchable: false,
                orderable: false,
                targets: 0,
            }
        ],
        select: {
            style: 'multi'
        },
        language: {
            processing: "<span class='fa fa-spinner w3-spin w3-large'></span><span>Loading</span>",
            zeroRecords: '',
            emptyTable: ''
        }
    });
    t.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
});
</script>
