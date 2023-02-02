<?php
$query = new WP_Query([
    'post_status'    => 'publish',
    'post_type'      => 'slider',
    'posts_per_page' => -1,
]);
?>

<?php if ($query->have_posts()): ?>
    <section class="section-owlslider-hero">
        <div class="owl-carousel owl-theme owl-hero">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php $image  = path_upload(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>
                <div class="item">
                    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
