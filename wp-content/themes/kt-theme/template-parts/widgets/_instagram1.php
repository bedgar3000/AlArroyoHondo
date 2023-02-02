<?php
$widget = get_option('setting_instagram_widget');
$user = get_option('setting_instagram_user');
?>

<?php if ($widget): ?>
    <section class="section-widget-instagram layout-1">
        <div class="container">
            <?php if ($user): ?>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <div class="logo"><i class="fa-brands fa-instagram"></i></div>
                            <div class="user">
                                <?php echo __('Síguenos en Instagram ','ktech'); ?> 
                                <a href="https://www.instagram.com/<?php echo $user; ?>" target="_blank">@<?php echo $user; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ($widget): ?>
                <div class="row">
                    <div class="col">
                        <div class="widget">
                            <?php echo $widget; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>