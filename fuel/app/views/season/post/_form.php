<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($season_post) ? $season_post->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Season id', 'season_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('season_id', Input::post('season_id', isset($season_post) ? $season_post->season_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Season id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Post id', 'post_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('post_id', Input::post('post_id', isset($season_post) ? $season_post->post_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Post id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($season_post) ? $season_post->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($season_post) ? $season_post->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>