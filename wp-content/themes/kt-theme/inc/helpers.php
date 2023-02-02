<?php
/**
 * Helpers
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ktech
 * @subpackage Ktech_Theme
 * @since KT Theme 1.0
 */

/**
 * Obtener el path a un archivo en el folder upload a partir de una url absoluta
 * 
 * @param {String} $url Url absoluta de un archivo 
 */
if (!function_exists('path_upload')) {
    function path_upload($url) 
    {
        $partes = explode('/', $url);
        $count = count($partes);
        $relative = $url;
        if (!empty($partes[$count - 5]) && !empty($partes[$count - 4]) && !empty($partes[$count - 3]) && !empty($partes[$count - 2]) && !empty($partes[$count - 1])) {
            $relative = get_option('siteurl') . '/' . $partes[$count - 5] . '/' . $partes[$count - 4] . '/' . $partes[$count - 3] . '/' . $partes[$count - 2] . '/' . $partes[$count - 1];
        }

        return $relative;
    }
}
/*
 * Prepend Facebook, Twitter and Google+ social share buttons to the post's content
 *
 */
if (!function_exists('add_share_buttons')) {
    function add_share_buttons($label = null) 
    {
        global $post;

        // Get the post's URL that will be shared
        $post_url   = urlencode( esc_url( get_permalink($post->ID) ) );
        
        // Get the post's title
        $post_title = urlencode( $post->post_title );

        // Compose the share links for Facebook, Twitter and Google+
        $whatsapp_link = sprintf( 'https://api.whatsapp.com/send?text=%1$s - %2$s', $post_title, $post_url );
        $email_link    = sprintf( 'mailto:?Subject=%1$s&amp;Body=%2$s', $post_title, $post_url );
        $facebook_link = sprintf( 'http://www.facebook.com/sharer.php?u=%1$s', $post_url );
        $linkedin_link = sprintf( 'http://www.linkedin.com/shareArticle?mini=true&amp;url=%1$s', $post_url );
        $twitter_link  = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title );

        // Wrap the buttons
        $output = '<div class="share-buttons">';
        
        // Add the links inside the wrapper
        if ($label) $output .= '<span>'.$label.'</span>';
        $output .= '<a target="_blank" href="' . $whatsapp_link . '" class="share-button"><i class="fab fa-whatsapp"></i></a>';
        $output .= '<a target="_blank" href="' . $email_link . '" class="share-button"><i class="far fa-envelope"></i></a>';
        $output .= '<a target="_blank" href="' . $facebook_link . '" class="share-button"><i class="fab fa-facebook-f"></i></a>';
        $output .= '<a target="_blank" href="' . $twitter_link . '" class="share-button"><i class="fab fa-twitter"></i></a>';
        $output .= '<a target="_blank" href="' . $linkedin_link . '" class="share-button"><i class="fab fa-linkedin-in"></i></a>';
            
        $output .= '</div>';

        // Return the buttons and the original content
        echo $output;
    }
}

/*
 * Prepend Facebook, Twitter and Google+ social share buttons to the post's content
 *
 */
if (!function_exists('add_share_buttons_alt')) {
    function add_share_buttons_alt() 
    {
        global $post;

        // Get the post's URL that will be shared
        $post_url   = urlencode( esc_url( get_permalink($post->ID) ) );
        
        // Get the post's title
        $post_title = urlencode( $post->post_title );

        // Compose the share links for Facebook, Twitter and Google+
        $whatsapp_link = sprintf( 'https://api.whatsapp.com/send?text=%1$s - %2$s', $post_title, $post_url );
        $email_link    = sprintf( 'mailto:?Subject=%1$s&amp;Body=%2$s', $post_title, $post_url );
        $facebook_link = sprintf( 'http://www.facebook.com/sharer.php?u=%1$s', $post_url );
        $linkedin_link = sprintf( 'http://www.linkedin.com/shareArticle?mini=true&amp;url=%1$s', $post_url );
        $twitter_link  = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title );

        // Wrap the buttons
        $output = '<div class="share-buttons">';
        
        // Add the links inside the wrapper
        $output .= '<a class="dropdown-item" href="' . $whatsapp_link . '"><i class="fab fa-whatsapp"></i></a>';
        $output .= '<a class="dropdown-item" href="' . $email_link . '"><i class="far fa-envelope"></i></a>';
        $output .= '<a class="dropdown-item" href="' . $facebook_link . '"><i class="fab fa-facebook-f"></i></a>';
        $output .= '<a class="dropdown-item" href="' . $linkedin_link . '"><i class="fab fa-linkedin-in"></i></a>';
        $output .= '<a class="dropdown-item" href="' . $twitter_link . '"><i class="fab fa-twitter"></i></a>';
        
        $output .= '</div>';

        // Return the buttons and the original content
        echo $output;
    }
}

/**
 * Obtener telefono para linkear
 * 
 * @param string $setting
 * @return array
 */
if (!function_exists('get_phone')) {
    function get_phone($setting = 'setting_phone')
    {
        $parts = explode('|', get_option($setting));
        if (empty($parts[1])) {
            return [$parts[0],$parts[0]];
        } else {
            return [$parts[0],$parts[1]];
        }
    }
}

if (!function_exists('limpiarCadena')) {
    function limpiarCadena($valor) {
        $valor = str_ireplace("SELECT","",$valor);
        $valor = str_ireplace("COPY","",$valor);
        $valor = str_ireplace("DELETE","",$valor);
        $valor = str_ireplace("DROP","",$valor);
        $valor = str_ireplace("DUMP","",$valor);
        $valor = str_ireplace(" OR ","",$valor);
        $valor = str_ireplace("%","",$valor);
        $valor = str_ireplace("LIKE","",$valor);
        $valor = str_ireplace("--","",$valor);
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor);
        $valor = str_ireplace("\\","",$valor);
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
            $valor = str_ireplace(";","",$valor);
            $valor = str_ireplace("'","",$valor);
        return $valor;
    }
}