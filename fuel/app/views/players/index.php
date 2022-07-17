<!-- If results were returned display them -->
<?php if (isset($result)): ?>

<table class="">
    <thead>
        <tr>
            <th>First</th>
            <th>Last</th>
            <th>Nick</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($result as $item): ?>

        <tr>
            <td><?=$item->first; ?></td>
            <td><?=$item->last; ?></td>
            <td><?=$item->nick; ?></td>
            <td><?=$item->strt.'-'.$item->cend; ?></td>
            <td>
                <div class="">
                    <div class="">
                        <?=Html::anchor('players/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
                    </div>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>

    </tbody>
</table>

<!-- Return link -->
<?= Html::anchor('players', 'TryAgain'); ?>

<?php else : ?>

<!-- Search form -->

<h2>Search Players</h2>
<br>

<?=Form::open(array("class"=>"")); ?>

<fieldset>
    <div class="">

        <?=Form::label('', 'name', array('class'=>'')); ?>
        <?=Form::input('name', null, array('class' => '', 'placeholder'=>'Search by Name')); ?>
        <?=Form::submit('submit', 'Go', array('class' => '')); ?>
    </div>

    <div class="">

        <?=Form::label('', 'year', array('class'=>'')); ?>
        <?=Form::input('year', null, array('class' => '', 'placeholder'=>'Search by Year')); ?>
        <?=Form::submit('submit', 'Go', array('class' => '')); ?>
    </div>

</fieldset>

<?=Form::close(); ?>
<?php endif; ?>