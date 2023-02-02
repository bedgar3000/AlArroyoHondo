<?php
/**
 * Template Name: KT Nosotros
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KT Solutions
 * @subpackage Ktech Theme
 * @version 1.0.0
 */
?>

<?php get_header(); ?>

    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <?php
            $block1 = get_field('about-block-1');
            $block2 = get_field('about-block-2');
            $cards = get_field('about-cards');
            ?>

        	<?php get_template_part('template-parts/banners/layout-1'); ?>
            
            <main class="main main-about">
                <section class="section-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="image">
                                    <img src="<?php echo path_upload($block1['image']); ?>" alt="" class="img-fluid">
                                </div>
                            </div>

                            <div class="col-xl-5">
                                <div class="info">
                                    <?php echo $block1['info']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="section-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="info">
                                    <?php echo $block2['info']; ?>
                                </div>
                            </div>

                            <div class="col-xl-7">
                                <div class="image">
                                    <div>
                                        <img src="<?php echo path_upload($block2['image-1']); ?>" alt="" class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="<?php echo path_upload($block2['image-2']); ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="section-3">
                    <div class="container">
                        <div class="row g-xxl-5">
                            <?php foreach ($cards as $card): ?>
                                <div class="col-lg-4">
                                    <div class="box">
                                        <div class="box-image">
                                            <img src="<?php echo path_upload($card['image']); ?>" alt="">
                                        </div>
                                        <div class="box-info"><?php echo $card['info']; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </main>
            
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>