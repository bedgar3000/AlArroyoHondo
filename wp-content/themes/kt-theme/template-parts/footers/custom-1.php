<?php
$address   = get_option('setting_address');
$phone     = get_phone('setting_phone');
$email     = get_option('setting_email');
$copyright = get_option('setting_copyright');

$brand_main       = path_upload(get_option('setting_brand')["main_white"]);
$brand_additional = path_upload(get_option('setting_brand')["additional_white"]);
?>

<footer class="footer custom-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="wrapper">
                    <div class="widget widget-1">
                        <div class="contact-info email">
                            <h4><?php echo __('CONTACTOS','ktech'); ?></h4>
                            <?php echo __('e-mail:','ktech'); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                        
                        <div class="contact-info phone">
                            <h4><?php echo __('LÍNEA DE ATENCIÓN','ktech'); ?></h4>
                            <a href="tel:<?php echo $phone[1]; ?>"><?php echo $phone[0]; ?></a>
                        </div>
                    </div>

                    <div class="widget widget-2">
                        <div class="contact-info address">
                            <h4><?php echo __('OFICINA ADMINISTRATIVA','ktech'); ?></h4>
                            <?php echo nl2br($address); ?>
                        </div>
                    </div>

                    <div class="widget widget-3">
                        <div class="contact-info social">
                            <h4><?php echo __('¡SÍGUENOS!','ktech'); ?></h4>
                            <?php get_template_part('template-parts/widgets/_social_networks_1', null, ['class' => 'circle']); ?>
                        </div>
                    </div>

                    <div class="widget widget-4">
                        <div class="logos">
                            <div class="image">
                                <img src="<?php echo $brand_main; ?>" alt="" class="img-fluid">
                            </div>

                            <div class="image">
                                <img src="<?php echo $brand_additional; ?>" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="copyright">
                            <?php echo nl2br($copyright); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
