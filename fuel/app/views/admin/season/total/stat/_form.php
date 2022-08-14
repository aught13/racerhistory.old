<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($season_total_stat) ? $season_total_stat->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Season id', 'season_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('season_id', Input::post('season_id', isset($season_total_stat) ? $season_total_stat->season_id : ''), array('class' => 'form-control', 'placeholder' => 'Season id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('MIN', 'MIN', array('class' => 'control-label')); ?>

			<?php echo Form::input('MIN', Input::post('MIN', isset($season_total_stat) ? $season_total_stat->MIN : ''), array('class' => 'form-control', 'placeholder' => 'MIN')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FGM', 'FGM', array('class' => 'control-label')); ?>

			<?php echo Form::input('FGM', Input::post('FGM', isset($season_total_stat) ? $season_total_stat->FGM : ''), array('class' => 'form-control', 'placeholder' => 'FGM')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FGA', 'FGA', array('class' => 'control-label')); ?>

			<?php echo Form::input('FGA', Input::post('FGA', isset($season_total_stat) ? $season_total_stat->FGA : ''), array('class' => 'form-control', 'placeholder' => 'FGA')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FGP', 'FGP', array('class' => 'control-label')); ?>

			<?php echo Form::input('FGP', Input::post('FGP', isset($season_total_stat) ? $season_total_stat->FGP : ''), array('class' => 'form-control', 'placeholder' => 'FGP')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('TPM', 'TPM', array('class' => 'control-label')); ?>

			<?php echo Form::input('TPM', Input::post('TPM', isset($season_total_stat) ? $season_total_stat->TPM : ''), array('class' => 'form-control', 'placeholder' => 'TPM')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('TPA', 'TPA', array('class' => 'control-label')); ?>

			<?php echo Form::input('TPA', Input::post('TPA', isset($season_total_stat) ? $season_total_stat->TPA : ''), array('class' => 'form-control', 'placeholder' => 'TPA')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('TPP', 'TPP', array('class' => 'control-label')); ?>

			<?php echo Form::input('TPP', Input::post('TPP', isset($season_total_stat) ? $season_total_stat->TPP : ''), array('class' => 'form-control', 'placeholder' => 'TPP')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FTM', 'FTM', array('class' => 'control-label')); ?>

			<?php echo Form::input('FTM', Input::post('FTM', isset($season_total_stat) ? $season_total_stat->FTM : ''), array('class' => 'form-control', 'placeholder' => 'FTM')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FTA', 'FTA', array('class' => 'control-label')); ?>

			<?php echo Form::input('FTA', Input::post('FTA', isset($season_total_stat) ? $season_total_stat->FTA : ''), array('class' => 'form-control', 'placeholder' => 'FTA')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('FTP', 'FTP', array('class' => 'control-label')); ?>

			<?php echo Form::input('FTP', Input::post('FTP', isset($season_total_stat) ? $season_total_stat->FTP : ''), array('class' => 'form-control', 'placeholder' => 'FTP')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('ORB', 'ORB', array('class' => 'control-label')); ?>

			<?php echo Form::input('ORB', Input::post('ORB', isset($season_total_stat) ? $season_total_stat->ORB : ''), array('class' => 'form-control', 'placeholder' => 'ORB')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('DRB', 'DRB', array('class' => 'control-label')); ?>

			<?php echo Form::input('DRB', Input::post('DRB', isset($season_total_stat) ? $season_total_stat->DRB : ''), array('class' => 'form-control', 'placeholder' => 'DRB')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('RB', 'RB', array('class' => 'control-label')); ?>

			<?php echo Form::input('RB', Input::post('RB', isset($season_total_stat) ? $season_total_stat->RB : ''), array('class' => 'form-control', 'placeholder' => 'RB')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('PF', 'PF', array('class' => 'control-label')); ?>

			<?php echo Form::input('PF', Input::post('PF', isset($season_total_stat) ? $season_total_stat->PF : ''), array('class' => 'form-control', 'placeholder' => 'PF')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('AST', 'AST', array('class' => 'control-label')); ?>

			<?php echo Form::input('AST', Input::post('AST', isset($season_total_stat) ? $season_total_stat->AST : ''), array('class' => 'form-control', 'placeholder' => 'AST')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('TRN', 'TRN', array('class' => 'control-label')); ?>

			<?php echo Form::input('TRN', Input::post('TRN', isset($season_total_stat) ? $season_total_stat->TRN : ''), array('class' => 'form-control', 'placeholder' => 'TRN')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('BLK', 'BLK', array('class' => 'control-label')); ?>

			<?php echo Form::input('BLK', Input::post('BLK', isset($season_total_stat) ? $season_total_stat->BLK : ''), array('class' => 'form-control', 'placeholder' => 'BLK')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('STL', 'STL', array('class' => 'control-label')); ?>

			<?php echo Form::input('STL', Input::post('STL', isset($season_total_stat) ? $season_total_stat->STL : ''), array('class' => 'form-control', 'placeholder' => 'STL')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/season/total/stat/view/'.$season_total_stat->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/season/total/stat', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/season/total/stat', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>