<?php
/**
 * Sub menu vehiculos
 */
add_shortcode('kt-menu-vehiculo', function() {
    $rand = 'ktcf'.date('YmdHis');

    #categorias
    $tabs = '';
    $contents = '';
    $terms = get_terms([
        'taxonomy'   => 'cat-vehiculo',
        'hide_empty' => true,
    ]);
    if ($terms) {
        foreach ($terms as $key => $term) {
            if ($key == 0) { $active = 'active'; $show = 'show active'; }
            else { $active = ''; $show = ''; }
            
            $tabs .= '
                <a href="#category_tab'.$key.'" data-bs-toggle="pill" class="'.$active.' nav-link">
                    '.$term->name.'
                </a>
            ';
            
            $contents .= '<div class="tab-pane fade '.$show.'" id="category_tab'.$key.'">';
            $query = new WP_Query([
                'post_status'    => 'publish',
                'post_type'      => 'vehiculo',
                'posts_per_page' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'cat-vehiculo',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ]
                ],
            ]);
            if ($query->have_posts()) {
                $contents .= '<div class="row">';
                while ($query->have_posts()) {
                    $query->the_post();
                    $image    = path_upload(get_the_post_thumbnail_url(get_the_ID(), 'medium_large'));
                    $extracto = get_field('vehicle-extracto');
                    $contents .= '
                        <div class="col-xxl-3 col-xl-3 col-lg-4">
                            <a href="'.get_the_permalink().'" class="box-vehiculo">
                                <div class="image">
                                    <img src="'.$image.'" alt="'.get_the_title().'">
                                </div>
                                <div class="title">
                                    <h3>'.get_the_title().'</h3>
                                    <p>'.$extracto.'</p>
                                </div>
                            </a>
                        </div>
                    ';
                }
                $contents .= '</div>';
            }
            wp_reset_postdata();
            $contents .= '</div>';
        }
    }

    $html = '
        <div class="submenu-vehiculos">
            <div class="row">
                <div class="col-lg-2">
                    <nav id="menuVehiculoTab" class="nav nav-pills flex-column">
                        '.$tabs.'
                    </nav>
                </div>
                <div class="col-lg-10 tab-content">
                    '.$contents.'
                </div>
            </div>
        </div>
    ';
    
    return $html;
});

add_action('wp_head', function() { ?>
<?php });

add_action('wp_footer', function() {
    ?>
    <script type="text/javascript">
        (function( $ ){
            $(document).ready(function () {
                document.querySelectorAll('#menuVehiculoTab a').forEach(function(everyitem) {
                    var tabTrigger = new bootstrap.Tab(everyitem)
                    everyitem.addEventListener('mouseenter', function(){
                        tabTrigger.show();
                    });
                });
            });
        })( jQuery );
    </script>
    <?php
});