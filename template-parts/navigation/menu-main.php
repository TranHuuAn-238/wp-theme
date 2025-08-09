<nav class="header__menu">
    <?php
    wp_nav_menu([
        'theme_location'    => 'primary',
        'menu_class'        => 'menu-wrapper',
        'container_class'   => 'header__menu',
        'container'         => true, //
        'items_wrap'        => '<ul class="%2$s" id="primary-menu-ul">%3$s</ul>',
        'fallback_cb'       => false
    ]);
    ?>
    <!-- <ul>
        <li><a href="./index.html">Home</a></li>
        <li><a href="./shop-grid.html">Shop</a></li>
        <li><a href="#">Pages</a>
            <ul class="header__menu__dropdown">
                <li><a href="./shop-details.html">Shop Details</a></li>
                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                <li><a href="./checkout.html">Check Out</a></li>
                <li><a href="./blog-details.html">Blog Details</a></li>
            </ul>
        </li>
        <li class="active"><a href="./blog.html">Blog</a></li>
        <li><a href="./contact.html">Contact</a></li>
    </ul> -->
</nav>