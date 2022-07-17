<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<?= Form::hidden('id', Input::post('id', isset($person_data) ? $person_data->id : '')); ?>

		<div class="form-group">
			<?php echo Form::label('Person id', 'person_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('person_id', Input::post('person_id', isset($person_data) ? $person_data->person_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Person id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Data key', 'data_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('data_key', Input::post('data_key', isset($person_data) ? $person_data->data_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Data key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Data value', 'data_value', array('class'=>'control-label')); ?>

				<?php echo Form::input('data_value', Input::post('data_value', isset($person_data) ? $person_data->data_value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Data value')); ?>

		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>