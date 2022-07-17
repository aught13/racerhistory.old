<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($opponent_season_total) ? $opponent_season_total->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Season id', 'season_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('season_id', Input::post('season_id', isset($opponent_season_total) ? $opponent_season_total->season_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Season id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('G', 'G', array('class'=>'control-label')); ?>

				<?php echo Form::input('G', Input::post('G', isset($opponent_season_total) ? $opponent_season_total->G : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'G')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('MP', 'MP', array('class'=>'control-label')); ?>

				<?php echo Form::input('MP', Input::post('MP', isset($opponent_season_total) ? $opponent_season_total->MP : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'MP')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('FGM', 'FGM', array('class'=>'control-label')); ?>

				<?php echo Form::input('FGM', Input::post('FGM', isset($opponent_season_total) ? $opponent_season_total->FGM : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'FGM')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('FGA', 'FGA', array('class'=>'control-label')); ?>

				<?php echo Form::input('FGA', Input::post('FGA', isset($opponent_season_total) ? $opponent_season_total->FGA : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'FGA')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('TPM', 'TPM', array('class'=>'control-label')); ?>

				<?php echo Form::input('TPM', Input::post('TPM', isset($opponent_season_total) ? $opponent_season_total->TPM : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'TPM')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('TPA', 'TPA', array('class'=>'control-label')); ?>

				<?php echo Form::input('TPA', Input::post('TPA', isset($opponent_season_total) ? $opponent_season_total->TPA : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'TPA')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('FTM', 'FTM', array('class'=>'control-label')); ?>

				<?php echo Form::input('FTM', Input::post('FTM', isset($opponent_season_total) ? $opponent_season_total->FTM : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'FTM')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('FTA', 'FTA', array('class'=>'control-label')); ?>

				<?php echo Form::input('FTA', Input::post('FTA', isset($opponent_season_total) ? $opponent_season_total->FTA : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'FTA')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('ORB', 'ORB', array('class'=>'control-label')); ?>

				<?php echo Form::input('ORB', Input::post('ORB', isset($opponent_season_total) ? $opponent_season_total->ORB : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ORB')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('DRB', 'DRB', array('class'=>'control-label')); ?>

				<?php echo Form::input('DRB', Input::post('DRB', isset($opponent_season_total) ? $opponent_season_total->DRB : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'DRB')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('TRB', 'TRB', array('class'=>'control-label')); ?>

				<?php echo Form::input('TRB', Input::post('TRB', isset($opponent_season_total) ? $opponent_season_total->TRB : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'TRB')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('PF', 'PF', array('class'=>'control-label')); ?>

				<?php echo Form::input('PF', Input::post('PF', isset($opponent_season_total) ? $opponent_season_total->PF : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'PF')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('AST', 'AST', array('class'=>'control-label')); ?>

				<?php echo Form::input('AST', Input::post('AST', isset($opponent_season_total) ? $opponent_season_total->AST : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'AST')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('TRN', 'TRN', array('class'=>'control-label')); ?>

				<?php echo Form::input('TRN', Input::post('TRN', isset($opponent_season_total) ? $opponent_season_total->TRN : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'TRN')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('BLK', 'BLK', array('class'=>'control-label')); ?>

				<?php echo Form::input('BLK', Input::post('BLK', isset($opponent_season_total) ? $opponent_season_total->BLK : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'BLK')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('STL', 'STL', array('class'=>'control-label')); ?>

				<?php echo Form::input('STL', Input::post('STL', isset($opponent_season_total) ? $opponent_season_total->STL : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'STL')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('PTS', 'PTS', array('class'=>'control-label')); ?>

				<?php echo Form::input('PTS', Input::post('PTS', isset($opponent_season_total) ? $opponent_season_total->PTS : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'PTS')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($opponent_season_total) ? $opponent_season_total->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($opponent_season_total) ? $opponent_season_total->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>