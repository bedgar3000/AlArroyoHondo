<?php
$brand_main       = path_upload(get_option('setting_brand')["main"]);
$brand_additional = path_upload(get_option('setting_brand')["additional"]);
?>
<header class="header header-alt-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-xl">
                    <div class="header-brands">
                        <a href="<?php echo get_option('home'); ?>" class="header-brand">
                            <img src="<?php echo $brand_main; ?>" alt="<?php echo __('Logo','ktech'); ?>" class="img-fluid">
                        </a>

                        <a href="<?php echo get_option('home'); ?>" class="header-brand">
                            <img src="<?php echo $brand_additional; ?>" alt="<?php echo __('Logo','ktech'); ?>" class="img-fluid">
                        </a>
                    </div>
                    
                    <button class="hamburger hamburger--collapse" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"  aria-expanded="false" aria-label="Toggle navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>

                    <div class="header-menu">
                        <div class="header-nav">
                            <div class="collapse navbar-collapse" id="main-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'header-menu',
                                    'container'      => false,
                                    'menu_class'     => '',
                                    'fallback_cb'    => '__return_false',
                                    'items_wrap'     => '<ul id="%1$s" class="navbar-nav %2$s">%3$s</ul>',
                                    'depth'          => 2,
                                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>