<h2>Players</h2>
<br>
<?php if ($people): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>First</th>
            <th>Last</th>
            <th>Nick</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($people as $item): ?> <tr>
            <td><?php echo $item->first; ?></td>
            <td><?php echo $item->last; ?></td>
            <td><?php echo $item->nick; ?></td>
            <td>
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <?php echo Html::anchor('players/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
                    </div>

            </td>
        </tr>
        <?php endforeach; ?> </tbody>
</table>

<?php else: ?>
<p>No People.</p>

<?php endif; ?>