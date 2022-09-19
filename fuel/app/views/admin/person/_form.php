<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('First', 'first', array('class' => 'control-label')); ?>

			<?php echo Form::input('first', Input::post('first', isset($person) ? $person->first : ''), array('class' => 'w3-input', 'placeholder' => 'First')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Last', 'last', array('class' => 'control-label')); ?>

			<?php echo Form::input('last', Input::post('last', isset($person) ? $person->last : ''), array('class' => 'w3-input', 'placeholder' => 'Last')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Nick', 'nick', array('class' => 'control-label')); ?>

			<?php echo Form::input('nick', Input::post('nick', isset($person) ? $person->nick : ''), array('class' => 'w3-input', 'placeholder' => 'Nick')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Display Name', 'display', array('class' => 'control-label')); ?>

			<?php echo Form::input('display', Input::post('display', isset($person) ? $person->display : ''), array('class' => 'w3-input', 'placeholder' => 'Display Name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Photo', 'photo', array('class' => 'control-label')); ?>

			<?php echo Form::input('photo', Input::post('photo', isset($person) ? $person->photo : ''), array('class' => 'w3-input', 'placeholder' => 'Photo')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'w3-button w3-border')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="">
						<?php echo Html::anchor('admin/person/view/'.$person->id, 'View', array('class' => 'w3-button w3-border')); ?>
						<?php echo Html::anchor('admin/person', 'Back', array('class' => 'w3-button w3-border')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/person', 'Back', array('class' => 'w3-button w3-border')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>