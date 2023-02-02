<?php
$query = new WP_Query([
    'post_status'    => 'publish',
    'post_type'      => 'post',
    'posts_per_page' => 3,
]);
?>

<?php if ($query->have_posts()): ?>
    <section class="section-post-owl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2><?php echo __('Novedades <b>JAC Motors</b>','ktech'); ?></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="wrapper">
                        <div class="owl-carousel owl-theme owl-posts">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <?php $image  = path_upload(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>
                                <div class="item">
                                    <a href="<?php the_permalink(); ?>" class="box-post-1">
                                        <div class="box-image">
                                            <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="box-body">
                                            <div class="box-date"><?php echo date_i18n('j F Y'); ?></div>
                                            <div class="box-title"><?php the_title(); ?></div>
                                        </div>
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