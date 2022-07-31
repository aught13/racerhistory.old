<div class="w3-row">
    <?php if ($story->person_post): ?>
    <p>
        <?php foreach ($story->person_post as $post): ?>
        <span><?=$post->post->title; ?></span>
    <div><?=$post->post->text; ?></div>

    <?php endforeach ?>
    </p>
    <?php endif; ?>
    <span>
        <?php echo Html::anchor('players', 'Back to Players').' | '.Html::anchor('stat', 'Back to Stats');?>
    </span>
</div>