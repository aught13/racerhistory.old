<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Team', 'team_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('team_id', Input::post('team_id', 1), array('class' => 'w3-input', 'placeholder' => 'Team')); ?>
		</div>
            
		<div class="form-group">
			<?php echo Form::label('Season', 'season_identifier', array('class' => 'control-label')); ?>

			<?php echo Form::input('season_identifier', Input::post('season_identifier', isset($season_info) ? $season_info->season_identifier : ''), array('class' => 'w3-input', 'placeholder' => 'Season')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Finish', 'fin', array('class' => 'control-label')); ?>

			<?php echo Form::input('fin', Input::post('fin', isset($season_info) ? $season_info->fin : ''), array('class' => 'w3-input', 'placeholder' => 'Finish')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Notes', 'notes', array('class' => 'control-label')); ?>

			<?php echo Form::input('notes', Input::post('notes', isset($season_info) ? $season_info->notes : ''), array('class' => 'w3-input', 'placeholder' => 'Notes')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Image File', 'img', array('class' => 'control-label')); ?>

			<?php echo Form::input('img', Input::post('img', isset($season_info) ? $season_info->img : ''), array('class' => 'w3-input', 'placeholder' => 'Image File')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/team/season/view/'.$season_info->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/team/season', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/team/season', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>