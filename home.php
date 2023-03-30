<?php
  $page = get_post(get_page_by_path('home'));
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php
  get_header();
  echo $page -> post_content;
?>

</div>

<?php
  get_footer();
?>

</body>
</html>