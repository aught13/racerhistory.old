<?= \Form::open('admin/game/new'); ?>
<div class="w3-row">    
    <div class="w3-col w3-container m7 l8 w3-center">
        <table class="w3-table w3-bordered">
            <thead></thead>
            <tbody>
                <tr><td>Season:</td><td><?= $form->field('season'); ?></td></tr>    
                <tr><td>Game Type:</td><td><?= $form->field('game_type_id'); ?></td></tr>
                <tr><td>Postseason?<?= $form->field('post'); ?></td><td>Periods:<?= $form->field('periods'); ?></td></tr>
                <tr><td>#<?= $form->field('mur_rank'); ?> Murray St </td><td><?= $form->field('pts_mur'); ?></td></tr>
                <tr><td><?= $form->field('hrn'); ?></td><td>OT:<?= $form->field('overtime'); ?></td></tr>
                <tr><td>#<?= $form->field('opp_rank'); ?><?= $form->field('opponent_id'); ?></td><td><?= $form->field('pts_opp'); ?></td></tr>
            </tbody>
        </table>
    </div>
    <div class="w3-col w3-container m5 l4 w3-leftbar w3-left w3-large">
        <table class="w3-table w3-bordered">
            <thead></thead>
            <tbody>
                <tr><td>DATE/TIME- <?= $form->field('game_date'); ?></td></tr>
                <tr><td>ATTENDANCE - <?= $form->field('attendance'); ?></td></tr>
                <tr><td>SITE - <?= $form->field('site_id'); ?></td></tr>
                <tr><td>REFEREES - <?= $form->field('ref1'); ?><?= $form->field('ref2'); ?><?= $form->field('ref3'); ?></td></tr>
            </tbody>
        </table>
    </div>
    <span>Notes: <?= $form->field('notes'); ?></span>
</div>
<div class="w3-row">
    <span>
        <?= $form->field('submit'); ?>
    </span>
</div>

