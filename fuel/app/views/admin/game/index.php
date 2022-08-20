<h2>Listing Games</h2>
<br>

<?php if ($games): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Season</th>
                    <th>Game date</th>
                    <th>Game type</th>
                    <th>Opponent</th>
                    <th>Site</th>
                    <th>Hrn</th>
                    <th>Post</th>
                    <th>W</th>
                    <th>L</th>
                    <th>Pts mur</th>
                    <th>Pts opp</th>
                    <th>Submitted date</th>
                    <th>Updated date</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($games as $item): ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->season; ?></td>
                        <td><?php echo $item->game_date; ?></td>
                        <td><?php echo isset($item->game_type_id) ? $item->game_type->game_type_name : ''; ?></td>
                        <td><?php echo $item->opponent_id; ?> - <?php echo $item->opponent->opponent_name; ?></td>
                        <td><?php echo $item->site_id; ?> - <?php echo $item->site->site_name; ?>, <?php echo $item->site->site_state; ?></td>
                        <td><?php switch ($item->hrn) {
                case 1: echo 'Home';
                    break;
                case 2: echo 'Road';
                    break;
                case 3: echo 'Neutral';
                    break;
            } ?></td>
                        <td><?php switch ($item->post) {
                case 0: echo 'No';
                    break;
                case 1: echo 'Yes';
                    break;
            } ?></td>
                        <td><?php echo $item->w; ?></td>
                        <td><?php echo $item->l; ?></td>
                        <td><?php echo $item->pts_mur; ?></td>
                        <td><?php echo $item->pts_opp; ?></td>
                        <td><?php echo $item->created_at; ?></td>
                        <td><?php echo $item->updated_at; ?></td>

                        <td>
        <?php echo Html::anchor('admin/game/view/' . $item->id, 'View'); ?> |
        <?php echo Html::anchor('admin/game/edit/' . $item->id, 'Edit'); ?> |
        <?php echo Html::anchor('admin/game/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php echo $pagination ?>
<?php else: ?>
    <p>No Games.</p>
<?php endif; ?>

<p>
<?php echo Html::anchor('admin/game/create', 'Add new Game', array('class' => 'btn btn-success')); ?>
</p>
