<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($site) ? $site->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Site name', 'site_name', array('class' => 'control-label')); ?>

			<?php echo Form::input('site_name', Input::post('site_name', isset($site) ? $site->site_name : ''), array('class' => 'form-control', 'placeholder' => 'Site name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Site state', 'site_state', array('class' => 'control-label')); ?>

			<?php echo Form::input('site_state', Input::post('site_state', isset($site) ? $site->site_state : ''), array('class' => 'form-control', 'placeholder' => 'Site state')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Site arena', 'site_arena', array('class' => 'control-label')); ?>

			<?php echo Form::input('site_arena', Input::post('site_arena', isset($site) ? $site->site_arena : ''), array('class' => 'form-control', 'placeholder' => 'Site arena')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($site) ? $site->created_at : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($site) ? $site->updated_at : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/site/view/'.$site->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/site', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/site', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>