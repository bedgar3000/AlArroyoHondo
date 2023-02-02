<?php
$query = new WP_Query([
    'post_status'    => 'publish',
    'post_type'      => 'producto',
    'posts_per_page' => -1,
]);
?>

<?php if ($query->have_posts()): ?>
    <section class="section-productos-owl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="wrapper">
                        <div class="owl-carousel owl-theme owl-productos owl-box-1">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="item">
                                    <a href="<?php the_permalink(); ?>" class="box-producto">
                                        <div class="box-icon">
                                            <img src="<?php echo path_upload(the_field('product-logo')); ?>" alt="<?php the_title(); ?>" class="box-logo">
                                            <img src="<?php echo path_upload(the_field('product-logo-alt')); ?>" alt="<?php the_title(); ?>" class="box-logo-alt">
                                        </div>
                                        <div class="box-text"><?php the_title(); ?></div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>