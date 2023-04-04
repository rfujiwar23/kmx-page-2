<?php
  $page = get_post(get_page_by_path('home'));
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head> -->

<div class="main-contents-area">
  <?php if (have_rows('main_contents')) : ?>
   
    <?php while (have_rows('main_contents')) : the_row(); ?>

      <?php if (get_row_layout() == 'page_top_image') : ?>
        <div>
          <pre><?php get_sub_field('image_banner');?></pre>
        </div>
      <?php endif; ?>


    <?php endwhile; ?>

  <?php endif; ?>
</div>

<?php
  get_header();
  echo $page -> post_content;
?>



</div>

<?php
  get_footer();
?>

<!-- </body>
</html> -->