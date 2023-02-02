<?php
/**
 * Template Name: KT Vehiculos
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KT Solutions
 * @subpackage Ktech Theme
 * @version 1.0.0
 */

$terms = get_terms([
    'taxonomy'   => 'cat-vehiculo',
    'hide_empty' => true,
]);
?>

<?php get_header(); ?>

    <?php get_template_part('template-parts/banners/layout-1'); ?>
            
    <main class="main main-archive-vehiculo main-vehicle">
        <section class="section-vehicles">
            <?php if ($terms): ?>
                <div class="container">
                    <?php foreach ($terms as $term): ?>
                        <?php
                        $query = new WP_Query([
                            'post_status'    => 'publish',
                            'post_type'      => 'vehiculo',
                            'posts_per_page' => -1,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'cat-vehiculo',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ]
                            ],
                        ]);
                        ?>
                        <?php if ($query->have_posts()): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="category-title">
                                        <h2><?php echo $term->name; ?></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php while ($query->have_posts()): ?>
                                    <?php
                                    $query->the_post();
                                    $image  = path_upload(get_the_post_thumbnail_url(get_the_ID(), 'medium_large'));
                                    $extracto = get_field('vehicle-extracto');
                                    ?>
                            
                                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6">
                                        <a href="<?php the_permalink(); ?>" class="box-vehiculo">
                                            <div class="image">
                                                <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <div class="title">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo $extracto; ?></p>
                                            </div>
                                        </a>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

<?php get_footer(); ?>