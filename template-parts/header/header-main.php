<?php global $theme_uri; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="header__logo">
                <a href="./index.html"><img src="<?= $theme_uri; ?>/img/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-lg-6">
            <?php get_template_part('template-parts/navigation/menu', 'main'); ?>
        </div>
        <div class="col-lg-3">
            <?= do_shortcode('[shortcode_header_cart show_wishlist=0]'); ?>
        </div>
    </div>
    <div class="humberger__open">
        <i class="fa fa-bars"></i>
    </div>
</div>