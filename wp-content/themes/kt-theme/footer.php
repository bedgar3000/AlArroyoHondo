<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ktech
 * @subpackage Ktech_Theme
 * @since KT Theme 1.0
 */

?>
    <?php get_template_part('template-parts/footers/custom-2'); ?>

    <a href="javascript:" id="back-to-top">
        <i class="icon icon-scroll-to-primary"></i>
    </a>

    <!-- JAVASCRIPT -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/owlcarousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/fancybox/fancybox.umd.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/datepicker/dist/datepicker.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/datepicker/i18n/datepicker.es-ES.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/header1.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
