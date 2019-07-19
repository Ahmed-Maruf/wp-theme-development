<?php 
/*
*   Template Name: About Page Template
*/
get_header()

?>
<body <?php body_class() ?>>
    <?php get_template_part("/template-parts/about-page/hero-page")?>
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
                        
                        <div class="col-md-12 text-center">
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
                            the_content();

                            next_post_link();
                            echo "</br>";
                            previous_post_link(); 
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