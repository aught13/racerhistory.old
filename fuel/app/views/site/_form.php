<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
                
                <?= Form::hidden('id', Input::post('id', isset($site) ? $site->id : '')); ?>

		
		<div class="form-group">
			<?php echo Form::label('Site name', 'site_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('site_name', Input::post('site_name', isset($site) ? $site->site_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Site name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Site state', 'site_state', array('class'=>'control-label')); ?>

				<?php echo Form::input('site_state', Input::post('site_state', isset($site) ? $site->site_state : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Site state')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Site arena', 'site_arena', array('class'=>'control-label')); ?>

				<?php echo Form::input('site_arena', Input::post('site_arena', isset($site) ? $site->site_arena : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Site arena')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
                </div>
	</fieldset>
<?php echo Form::close(); ?>