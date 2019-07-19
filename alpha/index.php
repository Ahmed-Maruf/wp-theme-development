
<?php get_header()?>
<body <?php body_class() ?>>
    <?php get_template_part('/template-parts/common/hero')?>
    <div class="posts" <?php post_class() ?>>
        <?php
        while (have_posts()) {
            # code...
            the_post();
            ?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <strong><?php the_author() ?></strong><br />
                                <?php echo get_the_date() ?>
                            </p>
                            <?php
                            the_tags(
                                $before = '<ul class="list-unstyled"><li>',
                                $sep = '</li><li>',
                                $after = '</li></ul>'
                            );
                            ?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            if (has_post_thumbnail()) {
                                # code...
                                the_post_thumbnail(
                                    $size = 'large',
                                    $attr = array(
                                        'class' => 'img-fluid'
                                    )
                                );
                            }
                            ?>

                            <?php
                            the_excerpt();
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php
    }
    ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php the_posts_navigation($args = array(
                    "screen_reader_text" => "",
                    "prev_text" => "New Posts",
                    "next_text" => "Old Posts"
                )); ?>
            </div>
        </div>
    </div>
<?php get_footer()?>