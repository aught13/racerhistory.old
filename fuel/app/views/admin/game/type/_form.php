<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($game_type) ? $game_type->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Game type name', 'game_type_name', array('class' => 'control-label')); ?>

			<?php echo Form::input('game_type_name', Input::post('game_type_name', isset($game_type) ? $game_type->game_type_name : ''), array('class' => 'form-control', 'placeholder' => 'Game type name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Post', 'post', array('class' => 'control-label')); ?>

			<?php echo Form::input('post', Input::post('post', isset($game_type) ? $game_type->post : ''), array('class' => 'form-control', 'placeholder' => 'Post')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Conf', 'conf', array('class' => 'control-label')); ?>

			<?php echo Form::input('conf', Input::post('conf', isset($game_type) ? $game_type->conf : ''), array('class' => 'form-control', 'placeholder' => 'Conf')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($game_type) ? $game_type->submitted_date : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($game_type) ? $game_type->updated_date : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/game/type/view/'.$game_type->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>