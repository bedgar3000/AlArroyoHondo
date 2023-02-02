<?php $slider = get_field('home-slider'); ?>

<?php if (!empty($slider)): ?>
    <section class="section-revslider-hero">
        <?php putRevSlider($slider); ?>
    </section>
<?php endif; ?>
