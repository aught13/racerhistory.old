<br>

<?php if ($season_infos): ?>
    <div class="w3-responsive">
        <table class="w3-table-all w3-small">
            <thead>
                <tr>
                    <th>Season</th>
                    <th>Fin</th>
                    <th>Notes</th>
                    <th>Img</th>
                    <th>Submitted date</th>
                    <th>Updated date</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($season_infos as $item): ?>
                    <tr>
                        <td><?php echo $item->season_identifier; ?></td>
                        <td><?php echo $item->fin; ?></td>
                        <td><?php echo $item->notes; ?></td>
                        <td><?php echo $item->img; ?></td>
                        <td><?php echo $item->submitted_date; ?></td>
                        <td><?php echo $item->updated_date; ?></td>

                        <td>
                            <?php echo Html::anchor('admin/team/season/view/' . $item->id, 'View'); ?> |
                            <?php echo Html::anchor('admin/team/season/edit/' . $item->season_identifier, 'Edit'); ?> |
                            <?php echo Html::anchor('admin/team/season/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
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
    <?php echo Html::anchor('admin/team/season/create', 'Add new Season info', array('class' => 'btn btn-success')); ?>
</p>
