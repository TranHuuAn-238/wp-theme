<?php
/*
Template Name: Trang chủ
*/
?>

<?php global $theme_uri; ?>
<?php get_header(); ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('template-parts/page/breadcrumb'); ?>
    
    <?php
    echo __FILE__;
    ?>

    <?php endwhile; ?>
<?php get_footer(); ?>