<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ktech
 * @subpackage Ktech_Theme
 * @since KT Theme 1.0
 */

$brand_main = path_upload(get_option('setting_brand')["main"]);
$intro = get_field('home-intro');
$amenities = get_field('home-amenities');
$apartments = get_field('home-apartments');
$form = get_option('setting_form');
?>

<?php get_header(); ?>

    <main class="main main-home">
        <?php if ($intro): ?>
            <section class="home-intro">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-info">
                            <div class="brand">
                                <img src="<?php echo $brand_main; ?>" alt="Logo <?php get_option('blogname'); ?>" class="img-fluid">
                            </div>
                            
                            <div class="info">
                                <?php echo $intro['info']; ?>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-7 col-image">
                            <div class="image">
                                <img src="<?php echo path_upload($intro['image']); ?>" alt="<?php get_option('blogname'); ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        
        <?php if ($apartments): ?>
            <section class="home-apartments">
                <div class="container">
                    <?php foreach ($apartments as $key => $apartment): ?>
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="apartment <?php echo (($key + 1) % 2 == 0 ? 'even' : 'odd'); ?>">
                                    <div class="info">
                                        <?php echo $apartment['info']; ?>
                                    </div>
                                    <div class="image">
                                        <img src="<?php echo path_upload($apartment['image']); ?>" alt="Apartamento" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
        
        <?php if ($amenities): ?>
            <section class="home-amenities">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-info">
                            <div class="info">
                                <?php echo $amenities['info']; ?>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-7 col-image">
                            <div class="image">
                                <img src="<?php echo path_upload($amenities['image']); ?>" alt="<?php get_option('blogname'); ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        
        <?php if ($form): ?>
            <section class="home-form">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="contact-form wpf-3">
                                <div class="wrapper">
                                    <h3><?php echo __('Para más información de alguno de nuestros apartamentos completa el siguiente formulario.', 'ktech'); ?></h3>
                                    <?php echo do_shortcode($form); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>
