<?php
/**
 * Template Name: KT Contacto
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KT Solutions
 * @subpackage Ktech Theme
 * @version 1.0.0
 */
?>

<?php get_header(); ?>

    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <?php 
            $email    = get_option('setting_email');
            $address  = get_option('setting_address2');
            $phone    = get_phone('setting_phone');
            $schedule = get_option('setting_schedule');
            $maps     = get_option('setting_maps');
            $form     = get_option('setting_form');
            ?>
            
            <main class="main main-contact layout-1">
                <section class="section-contact-info">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="section-title">
                                    <h1><?php echo __('Contactos','ktech'); ?></h1>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="grid-contact-info">
                                    <div class="contact-info">
                                        <div class="contact-icon">
                                            <i class="icon icon-contact-email-white"></i>
                                        </div>
                                        <div class="contact-value">
                                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                        </div>
                                    </div>
                                    
                                    <div class="contact-info">
                                        <div class="contact-icon">
                                            <i class="icon icon-contact-address-white"></i>
                                        </div>
                                        <div class="contact-value">
                                            <?php echo nl2br($address); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="contact-info">
                                        <div class="contact-icon">
                                            <i class="icon icon-contact-phone-white"></i>
                                        </div>
                                        <div class="contact-value">
                                            <p><?php echo __('Tel / WhatsApp','ktech'); ?></p>
                                            <a href="tel:<?php echo $phone[1]; ?>"><?php echo $phone[0]; ?></a>
                                        </div>
                                    </div>
                                    
                                    <div class="contact-info">
                                        <div class="contact-icon">
                                            <i class="icon icon-contact-schedule-white"></i>
                                        </div>
                                        <div class="contact-value">
                                            <?php echo nl2br($schedule); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-maps">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="maps">
                                    <?php echo $maps; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-form">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="section-title">
                                    <h2><?php echo __('Solicitud de información','ktech'); ?></h2>
                                    <p><?php echo __('Complete el formulario a continuación para recibir una consulta inicial gratuita y confidencial.','ktech'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="contact-form wpf-2">
                                    <?php echo do_shortcode($form); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>