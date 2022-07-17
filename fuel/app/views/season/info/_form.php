<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($season_info) ? $season_info->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Season', 'season', array('class'=>'control-label')); ?>

				<?php echo Form::input('season', Input::post('season', isset($season_info) ? $season_info->season : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Season')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Fin', 'fin', array('class'=>'control-label')); ?>

				<?php echo Form::input('fin', Input::post('fin', isset($season_info) ? $season_info->fin : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fin')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Notes', 'notes', array('class'=>'control-label')); ?>

				<?php echo Form::input('notes', Input::post('notes', isset($season_info) ? $season_info->notes : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Notes')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Img', 'img', array('class'=>'control-label')); ?>

				<?php echo Form::input('img', Input::post('img', isset($season_info) ? $season_info->img : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Img')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($season_info) ? $season_info->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($season_info) ? $season_info->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>