<br>

<?php if ($season_infos): ?>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <thead>
                <tr>
                    <th>Season</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Submitted date</th>
                    <th>Updated date</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($season_infos as $item): ?>
                    <tr>
                        <td><?php echo $item->identifier ; ?></td>
                        <td><?php echo $item->start; ?></td>
                        <td><?php echo $item->end; ?></td>
                        <td><?php echo $item->created_at; ?></td>
                        <td><?php echo $item->updated_at; ?></td>

                        <td>
                            <?php echo Html::anchor('admin/season/view/' . $item->id, 'View'); ?> |
                            <?php echo Html::anchor('admin/season/edit/' . $item->id, 'Edit'); ?> |
                            <?php echo Html::anchor('admin/season/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php echo $pagination ?>
<?php else: ?>
    <p>No Season_infos.</p>
<?php endif; ?>

<p>
    <?php echo Html::anchor('admin/season/create', 'Add new Season info', array('class' => 'btn btn-success')); ?>
</p>
