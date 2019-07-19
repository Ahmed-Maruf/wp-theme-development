<div class="header page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo($show = 'description') ?></h3>
                <h1 class="align-self-center display-1 text-center heading"><a href="<?php echo site_url() ?>"><?php bloginfo($show = 'name') ?></a></h1>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        wp_nav_menu($args = array(

            'menu_class'        => "navbar-nav mr-auto", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
            'theme_location'    => "topmenu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
        ));
        ?>
    </div>
</nav>