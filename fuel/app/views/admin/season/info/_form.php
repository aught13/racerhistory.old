<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($season_info) ? $season_info->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Season', 'season', array('class' => 'control-label')); ?>

			<?php echo Form::input('season', Input::post('season', isset($season_info) ? $season_info->season : ''), array('class' => 'form-control', 'placeholder' => 'Season')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Fin', 'fin', array('class' => 'control-label')); ?>

			<?php echo Form::input('fin', Input::post('fin', isset($season_info) ? $season_info->fin : ''), array('class' => 'form-control', 'placeholder' => 'Fin')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Notes', 'notes', array('class' => 'control-label')); ?>

			<?php echo Form::input('notes', Input::post('notes', isset($season_info) ? $season_info->notes : ''), array('class' => 'form-control', 'placeholder' => 'Notes')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Img', 'img', array('class' => 'control-label')); ?>

			<?php echo Form::input('img', Input::post('img', isset($season_info) ? $season_info->img : ''), array('class' => 'form-control', 'placeholder' => 'Img')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($season_info) ? $season_info->submitted_date : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($season_info) ? $season_info->updated_date : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/season/info/view/'.$season_info->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/season/info', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/season/info', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>