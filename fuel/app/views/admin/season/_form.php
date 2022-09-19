<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">

		<div class="form-group">
			<?php echo Form::label('Season Idintifier', 'identifier', array('class' => 'control-label')); ?>

			<?php echo Form::input('identifier', Input::post('identifier', isset($season_info) ? $season_info->identifier  : ''), array('class' => 'form-control', 'placeholder' => 'Season identifier')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Start', 'start', array('class' => 'control-label')); ?>

			<?php echo Form::input('start', Input::post('start', isset($season_info) ? $season_info->start : ''), array('class' => 'form-control', 'placeholder' => 'Start')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('End', 'end', array('class' => 'control-label')); ?>

			<?php echo Form::input('end', Input::post('end', isset($season_info) ? $season_info->end : ''), array('class' => 'form-control', 'placeholder' => 'End')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/season/view/'.$season_info->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/season', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/season', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>