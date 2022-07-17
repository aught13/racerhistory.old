<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($game) ? $game->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Season', 'season', array('class'=>'control-label')); ?>

				<?php echo Form::input('season', Input::post('season', isset($game) ? $game->season : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Season')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Game date', 'game_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('game_date', Input::post('game_date', isset($game) ? $game->game_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Game date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Game type id', 'game_type_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('game_type_id', Input::post('game_type_id', isset($game) ? $game->game_type_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Game type id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Opponent id', 'opponent_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('opponent_id', Input::post('opponent_id', isset($game) ? $game->opponent_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Opponent id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Site id', 'site_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('site_id', Input::post('site_id', isset($game) ? $game->site_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Site id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Hrn', 'hrn', array('class'=>'control-label')); ?>

				<?php echo Form::input('hrn', Input::post('hrn', isset($game) ? $game->hrn : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Hrn')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Post', 'post', array('class'=>'control-label')); ?>

				<?php echo Form::input('post', Input::post('post', isset($game) ? $game->post : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Post')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('W', 'w', array('class'=>'control-label')); ?>

				<?php echo Form::input('w', Input::post('w', isset($game) ? $game->w : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'W')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('L', 'l', array('class'=>'control-label')); ?>

				<?php echo Form::input('l', Input::post('l', isset($game) ? $game->l : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'L')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pts mur', 'pts_mur', array('class'=>'control-label')); ?>

				<?php echo Form::input('pts_mur', Input::post('pts_mur', isset($game) ? $game->pts_mur : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pts mur')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pts opp', 'pts_opp', array('class'=>'control-label')); ?>

				<?php echo Form::input('pts_opp', Input::post('pts_opp', isset($game) ? $game->pts_opp : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pts opp')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Submitted date', 'submitted_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('submitted_date', Input::post('submitted_date', isset($game) ? $game->submitted_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Submitted date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated date', 'updated_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_date', Input::post('updated_date', isset($game) ? $game->updated_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>