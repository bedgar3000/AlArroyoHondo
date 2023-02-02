<?php
$montacargas = false;

if (is_post_type_archive()) {
    $image = path_upload(get_option('setting_brand')['banner_vehicle']);
    $title = __('Vehículos','ktech');
}
elseif (get_query_var('post_type') == 'vehiculo') {
    $banner   = get_field('vehicle-banner');
    $image    = path_upload($banner['image']);
    $title    = $banner['info']['title'];
    $subtitle = $banner['info']['subtitle'];
    $price    = $banner['info']['price'];
    $note     = $banner['info']['note'];

    if (!empty($args['category'])) {
        if ($args['category'] == 'montacargas') {
            $title = __('MONTACARGAS','ktech');
            $subtitle = '';
            $price    = '';
            $note     = '';
            $montacargas = true;
        }
    }
}
elseif (get_query_var('taxonomy') == 'cat-vehiculo') {
    $obj   = get_queried_object();
    $title = $obj->name;
    if ($obj->slug == 'montacargas') {
        $montacargas = true;
        $args['category'] = $obj->slug;
        $image = path_upload(get_option('setting_brand')['banner_montacargas']);
    } else {
        $image = path_upload(get_option('setting_brand')['banner_vehicle']);
    }
}
elseif (is_home()) {
    $image = path_upload(get_option('setting_brand')['banner_post']);
    $title = __('Novedades JAC Motors','ktech');
}
else {
    $image = path_upload(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    $title = ($title ? $title : get_the_title());
}
?>

<section class="section-banner layout-1 <?php echo (!empty($args['category']) ? $args['category'] : ''); ?>">
    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid">

    <div class="content">
        <div class="container">
            <div class="row align-items-center">
                <div class="<?php echo ($montacargas ? 'col-lg-12' : 'col-lg-8 col-6'); ?>">
                    <h1 class="title"><?php echo $title; ?></h1>
                    <?php if (!empty($subtitle)): ?>
                        <p class="subtitle"><?php echo $subtitle; ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!$montacargas): ?>
                    <div class="col-lg-4 col-6">
                        <div class="notes">
                            <?php if (!empty($price)): ?>
                                <span class="price"><?php echo $price; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($note)): ?>
                                <p class="note"><?php echo $note; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
