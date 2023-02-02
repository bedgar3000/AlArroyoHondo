<?php
/**
 * Customs
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ktech
 * @subpackage Ktech_Theme
 * @since KT Theme 1.0
 */

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach($this->current_item->classes as $class) {
        if(in_array($class, $this->dropdown_menu_alignment_values)) {
            $dropdown_menu_class[] = $class;
        }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Registrar menus del theme
 */
function register_menus() {
    register_nav_menus([
        'header-menu' => __('Menú Principal'),
    ]);
}
add_action('init', 'register_menus');

/**
 * Sidebar
 */
function ju_widgets() {
    register_sidebar([
        'name'          => __('Theme Sidebar'),
        'id'            => 'ju_sidebar',
        'description'   => __('Sidebar for the theme'),
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);
}
add_action('widgets_init', 'ju_widgets');

/**
 * Theme Customizer API
 */
function my_customize_register( $wp_customize ) {
    //  Section (Logo)
    $wp_customize->add_section('section_brand', array(
        'title'    => __('Logos de la Empresa', 'themename'),
        'priority' => 120,
    ));
    //  Control (Logo principal)
    $wp_customize->add_setting('setting_brand[main]', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'main', array(
        'label'    => __('Cargar logo principal', 'themename'),
        'section'  => 'section_brand',
        'settings' => 'setting_brand[main]',
    )));
    //  Control (Logo adicional)
    $wp_customize->add_setting('setting_brand[additional]', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'additional', array(
        'label'    => __('Cargar logo secundario', 'themename'),
        'section'  => 'section_brand',
        'settings' => 'setting_brand[additional]',
    )));
    // //  Control (Logo principal)
    // $wp_customize->add_setting('setting_brand[main_white]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'main_white', array(
    //     'label'    => __('Cargar logo principal (blanco)', 'themename'),
    //     'section'  => 'section_brand',
    //     'settings' => 'setting_brand[main_white]',
    // )));
    // //  Control (Logo adicional)
    // $wp_customize->add_setting('setting_brand[additional_white]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'additional_white', array(
    //     'label'    => __('Cargar logo secundario (blanco)', 'themename'),
    //     'section'  => 'section_brand',
    //     'settings' => 'setting_brand[additional_white]',
    // )));
    // //  Control (Logo adicional)
    // $wp_customize->add_setting('setting_brand[banner_vehicle]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'banner_vehicle', array(
    //     'label'    => __('Banner vehículos', 'themename'),
    //     'section'  => 'section_brand',
    //     'settings' => 'setting_brand[banner_vehicle]',
    // )));
    // //  Control (Logo adicional)
    // $wp_customize->add_setting('setting_brand[banner_montacargas]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'banner_montacargas', array(
    //     'label'    => __('Banner montacargas', 'themename'),
    //     'section'  => 'section_brand',
    //     'settings' => 'setting_brand[banner_montacargas]',
    // )));
    // //  Control (Logo adicional)
    // $wp_customize->add_setting('setting_brand[banner_post]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'banner_post', array(
    //     'label'    => __('Banner novedades', 'themename'),
    //     'section'  => 'section_brand',
    //     'settings' => 'setting_brand[banner_post]',
    // )));

    //  Section (Contacto)
    $wp_customize->add_section('section_contact', array(
        'title' => 'Contacto'
    ));
    //  Control (Telefono)
    $wp_customize->add_setting('setting_phone', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_phone', array(
        'label'   => 'Teléfono',
        'section' => 'section_contact',
        'type'    => 'text',
    ));
    //  Control (Telefono)
    $wp_customize->add_setting('setting_phone2', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_phone2', array(
        'label'   => 'Teléfono (2)',
        'section' => 'section_contact',
        'type'    => 'text',
    ));
    //  Control (E-mail)
    $wp_customize->add_setting('setting_email', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_email', array(
        'label'   => 'e-mail',
        'section' => 'section_contact',
        'type'    => 'text',
    ));
    // //  Direccion
    // $wp_customize->add_setting('setting_address', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_address', array(
    //     'label'   => 'Oficina',
    //     'section' => 'section_contact',
    //     'type'    => 'textarea',
    // ));
    // //  Direccion
    // $wp_customize->add_setting('setting_address2', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_address2', array(
    //     'label'   => 'Dirección',
    //     'section' => 'section_contact',
    //     'type'    => 'textarea',
    // ));
    // //  Horario
    // $wp_customize->add_setting('setting_schedule', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_schedule', array(
    //     'label'   => 'Horario',
    //     'section' => 'section_contact',
    //     'type'    => 'textarea',
    // ));
    // //  Mapa
    // $wp_customize->add_setting('setting_maps', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_maps', array(
    //     'label'   => 'Google Maps',
    //     'section' => 'section_contact',
    //     'type'    => 'textarea',
    // ));
    //  Control (E-mail)
    $wp_customize->add_setting('setting_form', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_form', array(
        'label'   => 'Formulario de contacto (Shortcode)',
        'section' => 'section_contact',
        'type'    => 'text',
    ));
    // //  Control (E-mail)
    // $wp_customize->add_setting('setting_form_email', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_form_email', array(
    //     'label'   => 'Formulario de contacto (E-mail)',
    //     'section' => 'section_contact',
    //     'type'    => 'text',
    // ));
    //  Copyright
    $wp_customize->add_setting('setting_copyright', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_copyright', array(
        'label'   => 'Copyright',
        'section' => 'section_contact',
        'type'    => 'textarea',
    ));

    //  Section (Redes Sociales)
    $wp_customize->add_section('section_social_network', array(
        'title' => 'Redes sociales'
    ));
    // //  Control (Twitter)
    // $wp_customize->add_setting('setting_twitter', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_twitter', array(
    //     'label'   => 'Twitter',
    //     'section' => 'section_social_network',
    //     'type'    => 'text',
    // ));
    //  Control (Instagram)
    $wp_customize->add_setting('setting_instagram', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_instagram', array(
        'label'   => 'Instagram',
        'section' => 'section_social_network',
        'type'    => 'text',
    ));
    //  Control (Facebook)
    $wp_customize->add_setting('setting_facebook', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_facebook', array(
        'label'   => 'Facebook',
        'section' => 'section_social_network',
        'type'    => 'text',
    ));
    // //  Control (Linkedin)
    // $wp_customize->add_setting('setting_linkedin', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_linkedin', array(
    //     'label'   => 'Linkedin',
    //     'section' => 'section_social_network',
    //     'type'    => 'text',
    // ));
    // //  Control (YouTube)
    // $wp_customize->add_setting('setting_youtube', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_youtube', array(
    //     'label'   => 'YouTube',
    //     'section' => 'section_social_network',
    //     'type'    => 'text',
    // ));
    // //  Control (Pinterest)
    // $wp_customize->add_setting('setting_pinterest', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_pinterest', array(
    //     'label'   => 'Pinterest',
    //     'section' => 'section_social_network',
    //     'type'    => 'text',
    // ));
    // //  Control (Instagram)
    // $wp_customize->add_setting('setting_instagram_widget', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_instagram_widget', array(
    //     'label'   => 'Instagram (Widget)',
    //     'section' => 'section_social_network',
    //     'type'    => 'textarea',
    // ));
    //  Control (Instagram)
    $wp_customize->add_setting('setting_instagram_user', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_instagram_user', array(
        'label'   => 'Instagram (Usuario)',
        'section' => 'section_social_network',
        'type'    => 'text',
    ));
    //  Control (Facebook)
    $wp_customize->add_setting('setting_facebook_user', array(
        'capability'    => 'edit_theme_options',
        'type'          => 'option',
    ));
    $wp_customize->add_control('setting_facebook_user', array(
        'label'   => 'Facebook (Usuario)',
        'section' => 'section_social_network',
        'type'    => 'text',
    ));

    // //  Section (Tag Manager)
    // $wp_customize->add_section('section_tags', array(
    //     'title' => 'Tag Manager'
    // ));
    // //  Title
    // $wp_customize->add_setting('setting_tag_title', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_title', array(
    //     'label'   => 'Site Title',
    //     'section' => 'section_tags',
    //     'type'    => 'text',
    // ));
    // //  Description
    // $wp_customize->add_setting('setting_tag_description', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_description', array(
    //     'label'   => 'Site Description',
    //     'section' => 'section_tags',
    //     'type'    => 'textarea',
    // ));
    // //  Keywords
    // $wp_customize->add_setting('setting_tag_keywords', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_keywords', array(
    //     'label'   => 'Site Keywords (Separate with commas)',
    //     'section' => 'section_tags',
    //     'type'    => 'textarea',
    // ));
    // //  Robots
    // $wp_customize->add_setting('setting_tag_robots', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_robots', array(
    //     'label'   => 'Robots',
    //     'section' => 'section_tags',
    //     'type'    => 'text',
    // ));
    // //  Author
    // $wp_customize->add_setting('setting_tag_author', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_author', array(
    //     'label'   => 'Author',
    //     'section' => 'section_tags',
    //     'type'    => 'text',
    // ));
    // //  Language
    // $wp_customize->add_setting('setting_tag_language', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tag_language', array(
    //     'label'   => 'Language',
    //     'section' => 'section_tags',
    //     'type'    => 'text',
    // ));
    // //  Image
    // $wp_customize->add_setting('setting_tag[image]', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'image', array(
    //     'label'    => __('Imagen', 'themename'),
    //     'section'  => 'section_tags',
    //     'settings' => 'setting_tag[image]',
    // )));

    // //  Section (Tasa)
    // $wp_customize->add_section('section_tasa', array(
    //     'title' => 'Tasa'
    // ));
    // //  Control (Tasa)
    // $wp_customize->add_setting('setting_tasa', array(
    //     'capability'    => 'edit_theme_options',
    //     'type'          => 'option',
    // ));
    // $wp_customize->add_control('setting_tasa', array(
    //     'label'   => 'Tasa',
    //     'section' => 'section_tasa',
    //     'type'    => 'text',
    // ));
}
add_action('customize_register', 'my_customize_register');
