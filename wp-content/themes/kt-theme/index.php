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

global $post;
$page_slug = $post->post_name;
?>

<?php get_header(); ?>

    <?php get_template_part('template-parts/banners/layout-1'); ?>
            
    <main class="main main-general main-<?php echo $page_slug; ?>">
        <section class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                        if ( have_posts() ) {

                            // Load posts loop.
                            while ( have_posts() ) {
                                the_post();

                                the_content();
                            }

                        } else {

                            // If no content, include the "No posts found" template.

                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
