<?php
/**
 * Template Name: KT Faqs
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
            $faqs = get_field('faqs');
            ?>
        
        	<?php get_template_part('template-parts/banners/custom-1'); ?>
            
            <main class="main main-faqs layout-1">
                <section class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="accordion accordion-faqs" id="accordionExample">
                                    <?php foreach ($faqs as $key => $faq): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
                                                    <?php echo mb_strtoupper($faq['question']); ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php echo $faq['answer']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>