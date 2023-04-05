<?php
global $title;
$page = get_post(get_page_by_path('seminar'));
$title = $page->post_title;
$post_type = get_post_type();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  

  <?php
  get_header();
  // echo $page->post_content;
  ?>

<!-- 2023.3.31 追加 -->
<?php $the_query = new WP_Query(array("post_type"=>"page","p"=>10));
  while($the_query->have_posts()):$the_query->the_post();
?>
<?php get_template_part('template-parts/contents'); ?>
<?php endwhile; wp_reset_postdata();?>
<!-- 2023.3.31 追加 -->


  <div class="container" style="background:#fff;">
    <div class="contents">

      <div class="modal fade" id="stylistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="ratio ratio-16x9">
                <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"></iframe>
              </div>
              <div class="go-to-link mt-4 mb-3" style="text-align:right;">
                <a class="btn btn-secondary" data-bs-dismiss="modal">閉じる</a>
                <a id="link" class="btn btn-primary" href="" target="_blank">本編はこちら</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      $terms = get_terms('field');
      foreach ($terms as $term) :
        $query = new WP_Query(array(
          'post_status' => 'publish',
          'post_type' => $post_type,
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'field',
              'field' => 'slug',
              'terms' => $term->slug,
            )
          ),
          'posts_per_page' => 9999,
        ));
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      ?>
            <!-- class seminar の　あとに color/perm などのclass名が入るようにする -->
            <div class="seminar <?php echo $term->slug; ?>">
              
              <div class="seminar-top">
                <div class="title-area column">
                  <div class="type inner-column-left">
                    <?php echo $term->name . get_field('seminar_id', $post->ID); ?>
                  </div>
                  <div class="title inner-column-left">
                    <?php the_title(); ?>
                  </div>
                  <div class="number">
                  <span>全<em><?php echo get_field('seminar_times', $post->ID); ?></em>回</span>
                  </div>
                </div>
              </div>
              <!-- セミナーの内容 -->
              <div class="seminar-contents">
                <!-- セミナーの個数 -->
                
                <div class="seminar-details">
                  <!-- 短めの詳細 -->
                  <div class="brief-details">
                    <?php echo get_field('seminar_details', $post->ID); ?>
                  </div>
                  <div class="row mx-0">
                    <!-- 学習項目一覧・対象 -->
                    <div class="col-md-6 details">
                      <div class="detail-top">
                        <div class="column left">
                          <h4>主な学習項目</h4>
                        </div>
                        <!-- 対象スタイリスト -->
                        <div class="column right">
                          <?php echo get_field('seminar_target', $post->ID); ?>
                        </div>
                      </div>
                      <!-- 内容のリスト化 -->
                      <div class="seminar-points">
                        <ul>
                          <li><?php
                              echo str_replace(array("\r\n"), '</li><li>', get_field('seminar_points', $post->ID));
                              ?></li>
                        </ul>
                      </div>
                      <div class="message-from-instructor">
                    <div class="heading-text"><span>担当講師から一言</span></div>
                    <div class="message">
                      <!-- 講師からの一言を入れる -->
                      <?php echo get_field('seminar_message', $post->ID); ?>
                    </div>
                  </div>

                    </div>
                    <div class="col-md-6 stylists">
                      <div class="instructor-image row d-flex justify-content-center align-items-center">
                        <!-- 小さめで担当者の画像・名前を表示 -->
                        <div class="stylist col-3">
                          <a href="" class="video-btn" data-bs-toggle="modal" data-src="<?php echo $t1['youtube_video1']; ?>" data-url="<?php echo get_field('seminar_url', $post->ID); ?>" data-bs-target="#stylistModal">
                            <img src="<?php echo $t1['seminar_teacher1_img']; ?>" alt="<?php echo $t1['seminar_teacher1_name']; ?>" class="img-fluid">
                          </a>
                          <h5><span><?php echo $t1['seminar_teacher1_name']; ?></span>氏
                            <?php echo $t1['seminar_teacher1_id']; ?></h5>
                        </div>
                        <?php if ($t2['seminar_teacher2_name']) : ?>
                          <div class="stylist col-3">
                            <a href="" class="video-btn" data-bs-toggle="modal" data-src="<?php echo $t2['youtube_video2']; ?>" data-url="<?php echo get_field('seminar_url', $post->ID); ?>" data-bs-target="#stylistModal">
                              <img src="<?php echo $t2['seminar_teacher2_img']; ?>" alt="<?php echo $t2['seminar_teacher2_name']; ?>" class="img-fluid">
                            </a>
                            <h5><span><?php echo $t2['seminar_teacher2_name']; ?></span>氏
                              <?php echo $t2['seminar_teacher2_id']; ?></h5>
                          </div>
                        <?php endif; ?>
                        <?php if ($t3['seminar_teacher3_name']) : ?>
                          <div class="stylist col-3">
                            <a href="" class="video-btn" data-bs-toggle="modal" data-src="<?php echo $t3['youtube_video3']; ?>" data-url="<?php echo get_field('seminar_url', $post->ID); ?>" data-bs-target="#stylistModal">
                              <img src="<?php echo $t3['seminar_teacher3_img']; ?>" alt="<?php echo $t3['seminar_teacher3_name']; ?>" class="img-fluid">
                            </a>
                            <h5><span><?php echo $t3['seminar_teacher3_name']; ?></span>氏
                              <?php echo $t3['seminar_teacher3_id']; ?></h5>
                          </div>
                        <?php endif; ?>
                        <?php if ($t4['seminar_teacher4_name']) : ?>
                          <div class="stylist col-3">
                            <a href="" class="video-btn" data-bs-toggle="modal" data-src="<?php echo $t4['youtube_video4']; ?>" data-url="<?php echo get_field('seminar_url', $post->ID); ?>" data-bs-target="#stylistModal">
                              <img src="<?php echo $t4['seminar_teacher4_img']; ?>" alt="<?php echo $t4['seminar_teacher4_name']; ?>" class="img-fluid">
                            </a>
                            <h5><span><?php echo $t4['seminar_teacher4_name']; ?></span>氏
                              <?php echo $t4['seminar_teacher4_id']; ?></h5>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  
                  <div class="link-to-videos">
                    <p>出演者をクリックしてプレビューを視聴する</p>
                  </div>
                </div>
              </div>
        
            </div>
            <?php endwhile;
        endif;
      endforeach;
      wp_reset_postdata(); ?>
    </div>

  </div>

  <?php
  get_footer();
  ?>

  <script>
    $(document).ready(function() {

      var $videoSrc;
      var $kxVideoUrl
      $('.video-btn').on('click', function() {
        $videoSrc = $(this).data("src");
        $kxVideoUrl = $(this).data("url");
        //console.log($videoSrc);
      });

      $('#stylistModal').on('shown.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
      })
      $('#stylistModal').on('hide.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc);
        $("#link").attr('href', $kxVideoUrl);
      })

    });
  </script>

  </body>

</html>