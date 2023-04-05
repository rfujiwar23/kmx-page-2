<?php
  $page = get_post(get_page_by_path('home'));
?>
<!DOCTYPE html>
<html lang="en">
<head>



<?php
  get_header();
  // echo $page -> post_content;
?>

<!-- 2023.4.5 追加 -->
<!-- HOMEのIDを入力（521になっています） -->
<?php $the_query = new WP_Query(array("post_type"=>"page","p"=>521));
  while($the_query->have_posts()):$the_query->the_post();
?>
<?php get_template_part('template-parts/contents'); ?>
<?php endwhile; wp_reset_postdata();?>
<!-- 2023.3.31 追加 -->


</div>

<?php
  get_footer();
?>

</body>
</html>