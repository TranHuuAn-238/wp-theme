<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <?php
    wp_nav_menu([
        'theme_location'    => 'vertical',
        'menu_class'        => 'menu-wrapper',
        // 'container_class'   => 'header__menu',
        // 'container'         => true,
        'items_wrap'        => '<ul class="%2$s" id="departments-menu-ul">%3$s</ul>',
        'fallback_cb'       => false
    ]);
    ?>
    <!-- <ul>
        <li><a href="#">Fresh Meat</a></li>
        <li><a href="#">Vegetables</a></li>
        <li><a href="#">Fruit & Nut Gifts</a></li>
        <li><a href="#">Fresh Berries</a></li>
        <li><a href="#">Ocean Foods</a></li>
        <li><a href="#">Butter & Eggs</a></li>
        <li><a href="#">Fastfood</a></li>
        <li><a href="#">Fresh Onion</a></li>
        <li><a href="#">Papayaya & Crisps</a></li>
        <li><a href="#">Oatmeal</a></li>
        <li><a href="#">Fresh Bananas</a></li>
    </ul> -->
</div>