<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($game_info) ? $game_info->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Game id', 'game_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('game_id', Input::post('game_id', isset($game_info) ? $game_info->game_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Game id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Info key', 'info_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('info_key', Input::post('info_key', isset($game_info) ? $game_info->info_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Info key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Info value', 'info_value', array('class'=>'control-label')); ?>

				<?php echo Form::input('info_value', Input::post('info_value', isset($game_info) ? $game_info->info_value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Info value')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($game_info) ? $game_info->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($game_info) ? $game_info->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>