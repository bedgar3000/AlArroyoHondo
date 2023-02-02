<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ktech
 * @subpackage Ktech_Theme
 * @since KT Theme 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo get_option('blogname'); ?> <?php if (is_singular()): ?>| <?php the_title() ?> <?php endif; ?></title>

    <!-- CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/owlcarousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/owlcarousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/hamburgers/hamburgers.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/fancybox/fancybox.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/datepicker/dist/datepicker.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?<?php echo date('YmdHis'); ?>" rel="stylesheet">

    <style type="text/css">
        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block; }
            .navbar .nav-item .dropdown-menu{ margin-top:0; }
        }
        /* ============ desktop view .end// ============ */
    </style>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>