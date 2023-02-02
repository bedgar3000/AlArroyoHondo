<?php
$phone1     = get_phone('setting_phone');
$phone2     = get_phone('setting_phone2');
$email      = get_option('setting_email');
$copyright  = get_option('setting_copyright');
$instagram_url  = get_option('setting_instagram');
$facebook_url  = get_option('setting_facebook');
$instagram_user  = get_option('setting_instagram_user');
$facebook_user  = get_option('setting_facebook_user');
$brand_additional = path_upload(get_option('setting_brand')["additional"]);
?>

<footer class="footer custom-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-ventas">
                <div class="widget">
                    <h2 class="widget-title"><?php echo __('Información y ventas:','ktech'); ?></h2>

                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="item-icon">
                                <i class="icon icon-contact-phone-primary"></i>
                            </div>
                            <div class="item-info">
                                <a href="tel:+<?php echo $phone1[1]; ?>"><?php echo $phone1[0]; ?></a> |
                                <a href="tel:+<?php echo $phone2[1]; ?>"><?php echo $phone2[0]; ?></a>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="item-icon">
                                <i class="icon icon-contact-email-primary"></i>
                            </div>
                            <div class="item-info">
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-social">
                <div class="widget">
                    <h2 class="widget-title"><?php echo __('Síguenos en las redes','ktech'); ?></h2>

                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="item-icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                            <div class="item-info">
                                <a href="<?php echo $facebook_url; ?>" target="_blank"><?php echo $facebook_user; ?></a>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="item-icon">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                            <div class="item-info">
                                <a href="<?php echo $instagram_url; ?>" target="_blank"><?php echo $instagram_user; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-copyright">
                <div class="widget">
                    <h2 class="widget-title">
                        <?php echo __('Un proyecto de','ktech'); ?>
                        <img src="<?php echo $brand_additional; ?>" alt="Logo AlConstructora" class="img-fluid">
                    </h2>

                    <div class="copyright">
                        <?php echo nl2br($copyright); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
