<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('ID', 'ID', array('class'=>'control-label')); ?>

				<?php echo Form::input('ID', Input::post('ID', isset($site_info) ? $site_info->ID : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ID')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Site id', 'site_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('site_id', Input::post('site_id', isset($site_info) ? $site_info->site_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Site id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Info key', 'info_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('info_key', Input::post('info_key', isset($site_info) ? $site_info->info_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Info key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Info value', 'info_value', array('class'=>'control-label')); ?>

				<?php echo Form::input('info_value', Input::post('info_value', isset($site_info) ? $site_info->info_value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Info value')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($site_info) ? $site_info->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($site_info) ? $site_info->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>