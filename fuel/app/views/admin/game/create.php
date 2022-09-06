<h2>New Game</h2>
<div>
    <?= \Form::open('admin/game/create'); ?>
    <table class='w3-table'>
        <tr>
            <th>Season</th>
            <th>Date</th>
            <th>Game Type</th>
            <th>Opponent</th>
            <th>Site</th>
            <th>Court</th>
            <th>Post</th>
            <th>W/L</th>
            <th>Murray</th>
            <th>Opp</th>
            <th></th>
        </tr>
        <tr>
            <td><?= $form->field('season'); ?></td>
            <td><?= $form->field('game_date'); ?></td>
            <td><?= $form->field('game_type_id'); ?></td>
            <td><?= $form->field('opponent_id'); ?></td>
            <td><?= $form->field('site_id'); ?></td>
            <td><?= $form->field('hrn'); ?></td>
            <td><?= $form->field('post'); ?></td>
            <td><?= $form->field('w'); ?><label>W</label><input type="radio" value="0" class="w3-radio" id="form_w" name="w" /><label>L</label></td>
            <td><?= $form->field('pts_mur'); ?></td>
            <td><?= $form->field('pts_opp'); ?></td>
            <td><?= $form->field('submit'); ?></td>
        </tr>
    </table>
    <?= \Form::close(); ?>
</div>
