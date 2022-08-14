<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Session id', 'session_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('session_id', Input::post('session_id', isset($session) ? $session->session_id : ''), array('class' => 'form-control', 'placeholder' => 'Session id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Previous id', 'previous_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('previous_id', Input::post('previous_id', isset($session) ? $session->previous_id : ''), array('class' => 'form-control', 'placeholder' => 'Previous id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User agent', 'user_agent', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_agent', Input::post('user_agent', isset($session) ? $session->user_agent : ''), array('class' => 'form-control', 'placeholder' => 'User agent')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Ip hash', 'ip_hash', array('class' => 'control-label')); ?>

			<?php echo Form::input('ip_hash', Input::post('ip_hash', isset($session) ? $session->ip_hash : ''), array('class' => 'form-control', 'placeholder' => 'Ip hash')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Created', 'created', array('class' => 'control-label')); ?>

			<?php echo Form::input('created', Input::post('created', isset($session) ? $session->created : ''), array('class' => 'form-control', 'placeholder' => 'Created')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated', 'updated', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated', Input::post('updated', isset($session) ? $session->updated : ''), array('class' => 'form-control', 'placeholder' => 'Updated')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Payload', 'payload', array('class' => 'control-label')); ?>

			<?php echo Form::input('payload', Input::post('payload', isset($session) ? $session->payload : ''), array('class' => 'form-control', 'placeholder' => 'Payload')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/session/view/'.$session->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/session', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/session', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>