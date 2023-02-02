<?php
global $post;

$categories = get_field('home-categories', $post->ID);
?>
<?php if (!empty($categories)): ?>
    <section class="section-taxonomy-owl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2><?php echo __('ELIJE TU','ktech'); ?></h2>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-text.png" alt="JAC" class="img-flid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="owl-carousel owl-theme owl-cat-vehiculo">
                        <?php foreach ($categories as $category): ?>
                            <div class="item">
                                <a href="<?php echo get_term_link($category->term_id); ?>" class="box-cat-vehiculo">
                                    <?php $thumbnail = get_field('category-imagen', 'cat-vehiculo' . '_' . $category->term_id); ?>
                                    <div class="image">
                                        <img src="<?php echo path_upload($thumbnail); ?>" alt="<?php echo $category->name; ?>">
                                    </div>
                                    <div class="title">
                                        <h3><?php echo $category->name; ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
