<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($opponent) ? $opponent->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Opponent name', 'opponent_name', array('class' => 'control-label')); ?>

			<?php echo Form::input('opponent_name', Input::post('opponent_name', isset($opponent) ? $opponent->opponent_name : ''), array('class' => 'form-control', 'placeholder' => 'Opponent name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Opponent mascot', 'opponent_mascot', array('class' => 'control-label')); ?>

			<?php echo Form::input('opponent_mascot', Input::post('opponent_mascot', isset($opponent) ? $opponent->opponent_mascot : ''), array('class' => 'form-control', 'placeholder' => 'Opponent mascot')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Opponent current', 'opponent_current', array('class' => 'control-label')); ?>

			<?php echo Form::input('opponent_current', Input::post('opponent_current', isset($opponent) ? $opponent->opponent_current : 0), array('class' => 'form-control', 'placeholder' => 'Opponent current')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($opponent) ? $opponent->submitted_date : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($opponent) ? $opponent->updated_date : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/opponent/view/'.$opponent->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/opponent', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/opponent', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>