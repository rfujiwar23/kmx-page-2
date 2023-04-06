<div class="top_banner_content px-0">
    <?php if (have_rows('top_banner_content')) : ?>
        <?php while (have_rows('top_banner_content')) : the_row(); ?>
            <?php if (get_row_layout() == 'page_top_image') : ?>
                <div class="image-banner" style="aspect-ratio: 16/9; background: url(<?php echo get_sub_field('image_banner'); ?>) no-repeat; background-size:cover; background-position:center;">
                    <h2><span><?php echo get_the_title(); ?></span></h2>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'page_top_video') : ?>
                <div class="bg-video-wrap">
                    <video src="<?php echo get_sub_field('video_banner'); ?>" loop muted autoplay playsinline poster></video>
                </div>  
            <?php endif; ?>
        <?php endwhile; ?>    
    <?php endif; ?>
</div>

<div class="main-contents-area container px-0">
    <?php if (have_rows('main_contents')) : ?>
        <?php while (have_rows('main_contents')) : the_row(); ?>
            <?php if (get_row_layout() == 'page_top_image') : ?>
                <div class="image-banner" style="aspect-ratio: 16/9; background: url(<?php echo get_sub_field('image_banner'); ?>) no-repeat; background-size:cover; background-position:center;">
                    <h2><span><?php echo get_the_title(); ?></span></h2>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'page_top_video') : ?>
                <div class="bg-video-wrap">
                    <video src="<?php echo get_sub_field('video_banner'); ?>" loop muted autoplay playsinline poster></video>
                </div>  
            <?php endif; ?>
            <?php if (get_row_layout() == 'page_text_area') : ?>
                <div class="page-text-area" style="padding:<?php echo get_sub_field('blank_space_above'); ?>px 0 0; background:#fff;">
                    <h2 class="text-center mb-0" style="color: <?php echo get_sub_field('section_header_color'); ?>; background:<?php echo get_sub_field('section_header_background_color'); ?> "><?php echo get_sub_field('section_header'); ?></h2>
                    <?php if (get_sub_field('text_area_background')) : ?>
                        <div class="text-area" style="background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.6)), url(<?php echo get_sub_field('text_area_background') ?>) no-repeat; background-position:center; background-size:cover;  ">
                            <div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2 col-sm-12 lh-lg">
                                <?php echo get_sub_field('text_area'); ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="text-area" style="background:#fff;">
                            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 lh-lg">
                                <?php echo get_sub_field('text_area'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'seminar-block') : ?>
                <div class="seminar-block" style="background:#fff;">

                    <?php if (have_rows('seminar_list')) : ?>

                        <?php while (have_rows('seminar_list')) : the_row(); ?>
                            <div class="row seminar_list">
                                <div class="col-lg-4 col-md-4 col-sm-4 seminar_type" style="background:<?php echo get_sub_field('background_color') ?>;">
                                    <?php echo get_sub_field('seminar_type') ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 seminar_information" style="border: 2px solid <?php echo get_sub_field('background_color') ?>;">
                                    <?php echo get_sub_field('seminar_information') ?>
                                    <!--  -->
                                </div>
                            </div>
                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'course-block') : ?>
                <div class="course-block" style="background:#fff;">

                    <?php if (have_rows('course_list')) : ?>

                        <?php while (have_rows('course_list')) : the_row(); ?>
                            <div class="row course_list">
                                <div class="col-lg-4 col-md-4 col-sm-4 course_type" style="background:<?php echo get_sub_field('background_color') ?>;">
                                    <?php echo get_sub_field('course_type') ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 course_information" style="border: 2px solid <?php echo get_sub_field('background_color') ?>;">
                                    <?php echo get_sub_field('course_information') ?>
                                    <!--  -->
                                </div>
                            </div>
                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (get_row_layout() == 'top_seminar_list') : ?>
                <div style="background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.6)),url(<?php echo get_sub_field('background_image') ?>) no-repeat; background-size:cover; background-position:center;">
                    <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 top_seminar_list">
                        <div class="row">
                            <?php while (have_rows('seminar_list')) : the_row(); ?>
                                <div class="col-md-3 col-sm-6 col-6 px-0 mb-2">
                                    <div class="seminar_type_list" style="border:1px solid <?php echo get_sub_field('background_color') ?>">
                                        <h5 style="background:<?php echo get_sub_field('background_color') ?>"><?php echo get_sub_field('field_type') ?></h5>
                                        <p><?php echo get_sub_field('seminar_type') ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if (get_row_layout() == 'top_about_course') : ?>
                <div class="top_about_course">
                    <?php while (have_rows('types_of_courses')) : the_row(); ?>
                        <div class="course-types" style="background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.6)),url(<?php echo get_sub_field('bg_color') ?>) no-repeat; background-position:center; background-size:cover">
                        <h3><?php echo get_sub_field('course_name') ?></h3>
                        <div class="row">
                            
                            <div class="col-lg-5 col-md-4">
                            <div style="aspect-ratio: 16/9; background:url(<?php echo get_sub_field('img') ?>) no-repeat; background-position:center; background-size:cover;">
                            
                            </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                             
                             <div class="desc">
                             <?php echo get_sub_field('description') ?>
                             </div>
                            <div class="types">
                            <?php
                            $menus = get_sub_field('sub_menu');
                            if ($menus) : ?>
                                <ul>
                                    <?php foreach ($menus as $menu) : ?>
                                        <li><?php echo $menu; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            </div>
                            <div class="recommended_to">
                                <p class="text-center"><strong>こういう方々にお勧め！</strong></p>
                            <div class="recommend_list">
                            <?php while (have_rows('recommended_to')) : the_row(); ?>
                                
                                    <div class="item"><?php echo get_sub_field('input') ?></div>
                                
                            <?php endwhile; ?>
                                    </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            <?php endif; ?>


        <?php endwhile; ?>
    <?php endif; ?>
</div>