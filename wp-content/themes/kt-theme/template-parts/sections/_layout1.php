<?php
global $post;

$sections = get_field('home-sections', $post->ID);
?>
<?php if (!empty($sections)): ?>
    <section class="sections-block">
        <div class="container-fluid p-0">
            <?php foreach ($sections as $key => $section): ?>
                <div class="row g-0 <?php echo (($key + 1) % 2 == 0 ? 'row-even' : 'row-odd'); ?>">
                    <div class="col-xl-6">
                        <div class="image">
                            <img src="<?php echo path_upload($section['image']); ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="content">
                            <div class="wrapper">
                                <div class="info">
                                    <?php echo $section['info']['content']; ?>
                                </div>

                                <div class="actions">
                                    <a href="<?php echo $section['info']['link']['url']; ?>" class="btn btn-outline-light btn-pill w-icon">
                                        <span><?php echo $section['info']['link']['label']; ?></span>
                                        <i class="icon icon-btn-go-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
