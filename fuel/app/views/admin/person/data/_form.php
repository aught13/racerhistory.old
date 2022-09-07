<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($person_datum) ? $person_datum->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Person id', 'person_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('person_id', Input::post('person_id', isset($person_datum) ? $person_datum->person_id : ''), array('class' => 'form-control', 'placeholder' => 'Person id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Data key', 'data_key', array('class' => 'control-label')); ?>

			<?php echo Form::input('data_key', Input::post('data_key', isset($person_datum) ? $person_datum->data_key : ''), array('class' => 'form-control', 'placeholder' => 'Data key')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Data value', 'data_value', array('class' => 'control-label')); ?>

			<?php echo Form::input('data_value', Input::post('data_value', isset($person_datum) ? $person_datum->data_value : ''), array('class' => 'form-control', 'placeholder' => 'Data value')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($person_datum) ? $person_datum->submitted_date : ''), array('class' => 'form-control', 'placeholder' => 'Submitted date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class' => 'control-label')); ?>

			<?php echo Form::input('updated_date', Input::post('updated_date', isset($person_datum) ? $person_datum->updated_date : ''), array('class' => 'form-control', 'placeholder' => 'Updated date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/person/datum/view/'.$person_datum->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/person/datum', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/person/datum', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>