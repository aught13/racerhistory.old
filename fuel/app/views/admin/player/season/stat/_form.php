<?= Form::open(); ?>
<fieldset>
    <div class="form-group">
        <?= Form::label('Person id', 'person_id', ['class' => 'control-label']); ?>

        <?= Form::select('person_id', Input::post('person_id', isset($player_season_stat) ? $player_season_stat->person_id : ''), $persons); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Season id', 'season_id', ['class' => 'control-label']); ?>

        <?= Form::select('season_id', Input::post('season_id', isset($player_season_stat) ? $player_season_stat->season_id : ''), $seasons); ?>
    </div>
    <div class="w3-row-padding">
        <table class="w3-table-all w3-responsive">
            <thead>
                <tr>
                    <th>GP</th>
                    <th>GS</th>
                    <th>MIN</th>
                    <th>FGM</th>
                    <th>FGA</th>
                    <th>TPM</th>
                    <th>TPA</th>
                    <th>FTM</th>
                    <th>FTA</th>
                    <th>ORB</th>
                    <th>DRB</th>
                    <th>RB</th>
                    <th>AST</th>
                    <th>STL</th>
                    <th>BLK</th>
                    <th>TO</th>
                    <th>PF</th>
                    <th>PTS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= Form::input('GP', Input::post('GP', isset($player_season_stat) ? $player_season_stat->GP : ''), ['class' => 'w3-input', 'placeholder' => 'GP']); ?>
                    </td>
                    <td>
                        <?= Form::input('GS', Input::post('GS', isset($player_season_stat) ? $player_season_stat->GS : ''), ['class' => 'w3-input', 'placeholder' => 'GS']); ?>
                    </td>
                    <td>
                        <?= Form::input('MIN', Input::post('MIN', isset($player_season_stat) ? $player_season_stat->MIN : ''), ['class' => 'w3-input', 'placeholder' => 'MIN']); ?>
                    </td>
                    <td>
                        <?= Form::input('FGM', Input::post('FGM', isset($player_season_stat) ? $player_season_stat->FGM : ''), ['class' => 'w3-input', 'placeholder' => 'FGM']); ?>
                    </td>
                    <td>
                        <?= Form::input('FGA', Input::post('FGA', isset($player_season_stat) ? $player_season_stat->FGA : ''), ['class' => 'w3-input', 'placeholder' => 'FGA']); ?>
                    </td>
                    <td>
                        <?= Form::input('TPM', Input::post('TPM', isset($player_season_stat) ? $player_season_stat->TPM : ''), ['class' => 'w3-input', 'placeholder' => 'TPM']); ?>
                    </td>
                    <td>
                        <?= Form::input('TPA', Input::post('TPA', isset($player_season_stat) ? $player_season_stat->TPA : ''), ['class' => 'w3-input', 'placeholder' => 'TPA']); ?>
                    </td>
                    <td>
                        <?= Form::input('FTM', Input::post('FTM', isset($player_season_stat) ? $player_season_stat->FTM : ''), ['class' => 'w3-input', 'placeholder' => 'FTM']); ?>
                    </td>
                    <td>
                        <?= Form::input('FTA', Input::post('FTA', isset($player_season_stat) ? $player_season_stat->FTA : ''), ['class' => 'w3-input', 'placeholder' => 'FTA']); ?>
                    </td>
                    <td>
                        <?= Form::input('ORB', Input::post('ORB', isset($player_season_stat) ? $player_season_stat->ORB : ''), ['class' => 'w3-input', 'placeholder' => 'ORB']); ?>
                    </td>
                    <td>
                        <?= Form::input('DRB', Input::post('DRB', isset($player_season_stat) ? $player_season_stat->DRB : ''), ['class' => 'w3-input', 'placeholder' => 'DRB']); ?>
                    </td>
                    <td>
                        <?= Form::input('RB', Input::post('RB', isset($player_season_stat) ? $player_season_stat->RB : ''), ['class' => 'w3-input', 'placeholder' => 'RB']); ?>
                    </td>
                    <td>
                        <?= Form::input('AST', Input::post('AST', isset($player_season_stat) ? $player_season_stat->AST : ''), ['class' => 'w3-input', 'placeholder' => 'AST']); ?>
                    </td>
                    <td>
                        <?= Form::input('STL', Input::post('STL', isset($player_season_stat) ? $player_season_stat->STL : ''), ['class' => 'w3-input', 'placeholder' => 'STL']); ?>
                    </td>
                    <td>
                        <?= Form::input('BLK', Input::post('BLK', isset($player_season_stat) ? $player_season_stat->BLK : ''), ['class' => 'w3-input', 'placeholder' => 'BLK']); ?>
                    </td>
                    <td>
                        <?= Form::input('TRN', Input::post('TRN', isset($player_season_stat) ? $player_season_stat->TRN : ''), ['class' => 'w3-input', 'placeholder' => 'TRN']); ?>
                    </td>
                    <td>
                        <?= Form::input('PF', Input::post('PF', isset($player_season_stat) ? $player_season_stat->PF : ''), ['class' => 'w3-input', 'placeholder' => 'PF']); ?>
                    </td>
                    <td>
                        <?= Form::input('PTS', Input::post('PTS', isset($player_season_stat) ? $player_season_stat->PTS : ''), ['class' => 'w3-input', 'placeholder' => 'PTS']); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/player/season/stat/view/' . $player_season_stat->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/player/season/stat', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/player/season/stat', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>