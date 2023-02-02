<?php
$setting_brand = get_option('setting_brand');
if (!empty($setting_brand['main'])) {
    $brand_main = path_upload($setting_brand['main']);
}
?>
<header class="header header-alt-3">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-menu-top">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu-top',
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
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <div class="header-menu left">
                            <div class="header-nav">
                                <div class="collapse navbar-collapse" id="main-menu-left">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'header-menu-left',
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
                        
                        <div class="header-brands">
                            <a href="<?php echo get_option('home'); ?>" class="header-brand">
                                <img src="<?php echo $brand_main; ?>" alt="<?php echo __('Logo','ktech'); ?>" class="img-fluid">
                            </a>
                        </div>

                        <div class="header-menu right">
                            <div class="header-nav">
                                <div class="collapse navbar-collapse" id="main-menu-right">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'header-menu-right',
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
                        
                        <button class="hamburger hamburger--collapse" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"  aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>

                        <div class="header-menu mobile">
                            <div class="header-nav">
                                <div class="collapse navbar-collapse" id="main-menu">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'header-menu-mobile',
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
    </div>
</header>
