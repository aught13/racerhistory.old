<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($team) ? $team->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Team name', 'team_name', array('class' => 'control-label')); ?>

			<?php echo Form::input('team_name', Input::post('team_name', isset($team) ? $team->team_name : ''), array('class' => 'form-control', 'placeholder' => 'Team name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Team description', 'team_description', array('class' => 'control-label')); ?>

			<?php echo Form::input('team_description', Input::post('team_description', isset($team) ? $team->team_description : ''), array('class' => 'form-control', 'placeholder' => 'Team description')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Abbr', 'abbr', array('class' => 'control-label')); ?>

			<?php echo Form::input('abbr', Input::post('abbr', isset($team) ? $team->abbr : ''), array('class' => 'form-control', 'placeholder' => 'Abbr')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Gender', 'gender', array('class' => 'control-label')); ?>

			<?php echo Form::input('gender', Input::post('gender', isset($team) ? $team->gender : ''), array('class' => 'form-control', 'placeholder' => 'Gender')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/team/view/'.$team->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/team', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/team', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>