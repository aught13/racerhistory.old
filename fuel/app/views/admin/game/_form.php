<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Season', 'season', ['class' => 'control-label']); ?>

			<?php echo Form::select('season', Input::post('season', isset($game) ? $game->season : ''), $seasons, ['class' => 'form-control' , 'placeholder' => 'Site id']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Game date', 'game_date', ['class' => 'control-label']); ?>

			<?php echo Form::input('game_date', Input::post('game_date', isset($game) ? $game->game_date : ''), ['type' => 'datetime-local']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Game type', 'game_type_id', ['class' => 'control-label']); ?>

			<?php echo Form::input('game_type_id', Input::post('game_type_id', isset($game) ? $game->game_type_id : '17'), ['class' => 'form-control', 'placeholder' => 'Game type id']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Opponent id', 'opponent_id', ['class' => 'control-label']); ?>

			<?php echo Form::input('opponent_id', Input::post('opponent_id', isset($game) ? $game->opponent_id : ''), ['class' => 'form-control', 'placeholder' => 'Opponent id']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Site id', 'site_id', ['class' => 'control-label']); ?>

			<?php echo Form::input('site_id', Input::post('site_id', isset($game) ? $game->site_id : ''), ['class' => 'form-control', 'placeholder' => 'Site id']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Hrn', 'hrn', ['class' => 'control-label']); ?>

			<?php echo Form::input('hrn', Input::post('hrn', isset($game) ? $game->hrn : ''), ['class' => 'form-control', 'placeholder' => 'Hrn']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Post', 'post', ['class' => 'control-label']); ?>

			<?php echo Form::input('post', Input::post('post', isset($game) ? $game->post : ''), ['class' => 'form-control', 'placeholder' => 'Post']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('W', 'w', ['class' => 'control-label']); ?>

			<?php echo Form::input('w', Input::post('w', isset($game) ? $game->w : ''), ['class' => 'form-control', 'placeholder' => 'W']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('L', 'l', ['class' => 'control-label']); ?>

			<?php echo Form::input('l', Input::post('l', isset($game) ? $game->l : ''), ['class' => 'form-control', 'placeholder' => 'L']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Pts mur', 'pts_mur', ['class' => 'control-label']); ?>

			<?php echo Form::input('pts_mur', Input::post('pts_mur', isset($game) ? $game->pts_mur : ''), ['class' => 'form-control', 'placeholder' => 'Pts mur']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Pts opp', 'pts_opp', ['class' => 'control-label']); ?>

			<?php echo Form::input('pts_opp', Input::post('pts_opp', isset($game) ? $game->pts_opp : ''), ['class' => 'form-control', 'placeholder' => 'Pts opp']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Created At', 'created_at', ['class' => 'control-label']); ?>

			<?php echo Form::input('created_at', Input::post('created_at', isset($game) ? $game->created_at : ''), ['class' => 'form-control', 'placeholder' => 'Created At']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Updated At', 'updated_at', ['class' => 'control-label']); ?>

			<?php echo Form::input('updated_at', Input::post('updated_at', isset($game) ? $game->updated_at : ''), ['class' => 'form-control', 'placeholder' => 'Updated At']); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/game/view/'.$game->id, 'View', ['class' => 'btn btn-info']); ?>
						<?php echo Html::anchor('admin/game', 'Back', ['class' => 'btn btn-default']); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/game', 'Back', ['class' => 'btn btn-link']); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>



<?php echo Form::close(); ?>