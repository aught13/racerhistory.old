<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('First', 'first', array('class' => 'control-label')); ?>

			<?php echo Form::input('first', Input::post('first', isset($person) ? $person->first : ''), array('class' => 'form-control', 'placeholder' => 'First')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Last', 'last', array('class' => 'control-label')); ?>

			<?php echo Form::input('last', Input::post('last', isset($person) ? $person->last : ''), array('class' => 'form-control', 'placeholder' => 'Last')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Nick', 'nick', array('class' => 'control-label')); ?>

			<?php echo Form::input('nick', Input::post('nick', isset($person) ? $person->nick : ''), array('class' => 'form-control', 'placeholder' => 'Nick')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Photo', 'photo', array('class' => 'control-label')); ?>

			<?php echo Form::input('photo', Input::post('photo', isset($person) ? $person->photo : ''), array('class' => 'form-control', 'placeholder' => 'Photo')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($person) ? $person->submitted_date : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($person) ? $person->updated_date : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/person/view/'.$person->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/person', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/person', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>