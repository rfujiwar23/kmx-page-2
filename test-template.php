<?php

/**
 * Template Name: test-template
 */

get_header(); 

?>
 <?php echo get_field("general_heading");?>
<div class="container" style="padding:100px;">
    <?php if (have_rows('main_contents')) : ?>
        <?php while (have_rows('main_contents')) : the_row(); ?>
        <?php if (get_row_layout() == 'page_top_image') : ?>
            <div class="banner">
                <img src="<?php echo get_sub_field('image_banner') ?>" alt="" class="img-fluid">
            </div>
        <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_template_part('template-parts/full-video-list'); ?>

<style>
    .banner {
        width:100%;
        aspect-ratio: 16/9;
    }
</style>