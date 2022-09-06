<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title; ?></title>

        <?php
        echo Asset::css('bootstrap.css');
        echo Asset::css('w3.css');

        if ($title == ('New Post' || 'Edit Post')) {
            echo Asset::js(['https://cdn.tiny.cloud/1/6x4xhucgxq3bhx4mezzzt3t3x1znsfxw9m5wtkdwbt7vk1oc/tinymce/6/tinymce.min.js',], ['referrerpolicy' => 'origin']);
        }
        ?>

        <style>
            body {
                margin-top: 50px;
            }
        </style>
    </head>

    <body>
        <?php if ($current_user): ?>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Racerhistory</a>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
                                <?php echo Html::anchor('admin', 'Dashboard') ?>
                            </li>

                            <?php
                            foreach (new GlobIterator(APPPATH . 'classes/controller/admin/*.php') as $file) {
                                $section_segment = $file->getBasename('.php');
                                $section_title = Inflector::humanize($section_segment);
                                ?>
                                <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                    <div class="w3-dropdown-hover">
                                        <button  class="w3-button" href="#"><?php echo Html::anchor('admin/' . $section_segment, $section_title) ?></button>
                                        <div class="w3-dropdown-content w3-bar-block">
                                            <?php
                                            foreach (new GlobIterator(APPPATH . 'classes/controller/admin/' . $section_segment . '/*.php') as $file2) {
                                                $section_segment2 = $file2->getBasename('.php');
                                                $section_title2 = Inflector::humanize($section_segment2);
                                                ?>
                                                <?php echo Html::anchor('admin/' .$section_segment.'/'. $section_segment2, $section_title2, ['class' => 'w3-bar-item w3-button']) ?>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $title; ?></h1>
                    <hr>

                    <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                                <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                                <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <?php
                    echo $content;
                    if (($title == 'New Post') || ($title == 'Edit Post')):
                        ?>
                        <script>
                            tinymce.init({
                                selector: 'textarea',
                                plugins: ' advlist autolink lists link image charmap preview anchor pagebreak media table ',
                                toolbar: 'link image media table charmap fontfamily fontsize forecolor backcolor bold italic underline strikethrough subscript superscript alignleft aligncenter alignright alignjustify blockquote hr',
                                toolbar_mode: 'floating',
                                tinycomments_mode: 'embedded',
                                tinycomments_author: 'Author name',
                            });
                        </script>
                    <?php endif; ?>
                </div>
            </div>

            <hr/>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="https://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?php echo e(Fuel::VERSION); ?></small>
                </p>
            </footer>
        </div>


        <?php
        echo Asset::js([
            'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
            'bootstrap.js',
        ]);
        ?>
    </body>
</html>
