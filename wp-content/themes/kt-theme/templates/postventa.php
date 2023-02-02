<?php
/**
 * Template Name: KT PostVenta
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
            <?php $items = get_field('postventa-items'); ?>
        
        	<?php get_template_part('template-parts/banners/layout-1'); ?>
            
            <main class="main main-postventa">
                <section class="section-content">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($items as $item): ?>
                                <div class="col-xl-4 col-md-6">
                                    <div class="box-postventa">
                                        <div class="box-wrapper">
                                            <div class="box-icon">
                                                <img src="<?php echo path_upload($item['image']); ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="box-title"><?php echo $item['nombre']; ?></div>
                                            <div class="box-description"><?php echo $item['descripcion']; ?></div>
                                            <div class="box-actions">
                                                <a href="<?php echo $item['enlace']['enlace']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-secondary w-icon btn-pill">
                                                    <span><?php echo $item['enlace']['etiqueta']; ?></span>
                                                    <i class="icon icon-btn-go"></i>
                                                </a>
                                            </div>
                                        </div>
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