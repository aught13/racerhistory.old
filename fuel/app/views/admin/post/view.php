<h2>Viewing #<?php echo $post->id; ?></h2>
                    <br>

                    <dl class="dl-horizontal">
                            <dt>Id</dt>
                            <dd><?php echo $post->id; ?></dd>
                            <br>
                            <dt>Title</dt>
                            <dd><?php echo $post->title; ?></dd>
                            <br>
                            <dt>Text</dt>
                            <dd><textarea><?php echo $post->text; ?> </textarea></dd>
                            <br>
                            <dt>Submitted date</dt>
                            <dd><?php echo $post->created_at; ?></dd>
                            <br>
                            <dt>Updated date</dt>
                            <dd><?php echo $post->updated_at; ?></dd>
                            <br>
                    </dl>

                    <div class="btn-group">
                            <?php echo Html::anchor('admin/post/edit/'.$post->id, 'Edit', array('class' => 'btn btn-warning')); ?>
                            <?php echo Html::anchor('admin/post', 'Back', array('class' => 'btn btn-default')); ?>
                    </div>

