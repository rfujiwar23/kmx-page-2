
<div class="main-contents-area">
  <?php if (have_rows('main_contents')) : ?>

    <?php while (have_rows('main_contents')) : the_row(); ?>

      <!-- 内部リンク -->
      <?php if (get_row_layout() == 'page_top_image') : ?>
        <div>
          <pre><?php get_sub_field('image_banner');?></pre>
        </div>
      <?php endif; ?>


    <?php endwhile; ?>

  <?php endif; ?>
</div>


<?php 
  global $title;
  $page = get_post(get_page_by_path('course'));
  $title = $page -> post_title;
  $post_type = get_post_type();
?>
<!DOCTYPE html>
<html lang="ja">
<head>

<?php
  get_header();
  echo $page -> post_content;
  ?>

<!-- 2023.3.31 追加 -->
<?php $the_query = new WP_Query(array("post_type"=>"page","p"=>8));
  while($the_query->have_posts()):$the_query->the_post();
?>
<div class="main-contents-area container px-0">
  <?php if (have_rows('main_contents')) : ?>
    <?php while (have_rows('main_contents')) : the_row(); ?>
      <?php if (get_row_layout() == 'page_top_image') : ?>
        <div class="image-banner" style="aspect-ratio: 16/9; background: url(<?php echo get_sub_field('image_banner');?>) no-repeat; background-size:cover; background-position:center;">
        </div>
      <?php endif; ?>
      <?php if (get_row_layout() == 'page_text_area') : ?>
        <div class="page-text-area">
        <h2 class="text-center mb-0" style="color: <?php echo get_sub_field('section_header_color');?>; background:<?php echo get_sub_field('section_header_background_color');?> "><?php echo get_sub_field('section_header');?></h2>
        <div class="text-area" style="background:#fff; background:linear-gradient(rgba(255,255,255,0.4),rgba(255,255,255,0.4)), url(<?php echo get_sub_field('text_area_background')?>) no-repeat; background-position:center; background-size:cover;  ">
          <?php echo get_sub_field('text_area');?>
        </div>
        </div>
      <?php endif; ?>
      <?php if (get_row_layout() == 'seminar-block') : ?>
        <div class="seminar-block" style="background:#fff;">
        
        <?php if( have_rows('seminar_list') ): ?>
    
            <?php while( have_rows('seminar_list') ): the_row(); ?>
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
        
        <?php if( have_rows('course_list') ): ?>
    
            <?php while( have_rows('course_list') ): the_row(); ?>
                <div class="row course_list">
                  <div class="col-lg-3 col-md-3 col-sm-4 course_type" style="background:<?php echo get_sub_field('background_color') ?>;">
                  <?php echo get_sub_field('course_type') ?>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-8 course_information" style="border: 2px solid <?php echo get_sub_field('background_color') ?>;">
                  <?php echo get_sub_field('course_information') ?>
                  <!--  -->
                  </div>
                </div>
            <?php endwhile; ?>
            
        <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<?php endwhile; wp_reset_postdata();?>
<!-- 2023.3.31 追加 -->

<div class="container-fluid pb-5" id="list">
  <div class="clist py-4">
    <div class="course-table">
      <ul class="nav">
        <li>
          ベーシック
        </li>
        <li>
          スタンダード
        </li>
        <li>
          ハイレベル
        </li>
      </ul>
      <ul class="snav s1">
        <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <ul class="snav s2">
      <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <ul class="snav s3">
      <li data-name="カット">CUT</li>
        <li data-name="カラー">COLOR</li>
        <li data-name="パーマ">PERM</li>
        <li data-name="ストレート">STRAIGHT</li>
        <li data-name="デジタルパーマ">DIGITAL PERM</li>
      </ul>
      <div class="show-contents">
        <div class="modal fade" id="stylistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                  <!-- srcに動画を入れる -->
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
          $query = new WP_Query(array(
            'post_status' => 'publish',
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            /*
            'tax_query' => array(
              array(
                'taxonomy' => 'level',
                'field' => 'slug',
                'terms' => $level->slug,
              ),
              array(
                'taxonomy' => 'skill',
                'field' => 'slug',
                'terms' => $skill->slug,
              ),
              array(
                'taxonomy' => 'hairstyle',
                'field' => 'slug',
                'terms' => $hairstyle->slug,
              )
            ),
            */
          ));

          $levels = get_terms('level');
          $skills = get_terms('skill');
          $hairstyles = get_terms('hairstyle');
          foreach($levels as $level) :
            foreach($skills as $skill) :
        ?> 
        <div class="cont <?php echo $level->slug . $skill->slug; ?>">
          <?php foreach($hairstyles as $hairstyle) : ?> 

          <?php
            $prev_hairstyle = '';
            while( $query->have_posts() ):
            $query->the_post();
            if( in_array($level, (array)get_the_terms($post->ID, 'level'))
              && in_array($skill, (array)get_the_terms($post->ID, 'skill'))
              && in_array($hairstyle, (array)get_the_terms($post->ID, 'hairstyle')) ) :
              if($prev_hairstyle !== $hairstyle->name) :
          ?>

          <dl class="list_table">
            <dt><?php echo $hairstyle->name; ?></dt>
            <dd>
              <div class="row p-0">
                <div class="column table-header">種類</div>
                <div class="column table-header">サロン</div>
                <div class="column table-header">スタイリスト</div>
                <div class="column table-header">講座ID</div>
                <div class="column table-header">プレビュー</div>
              </div>
              <?php endif; ?>
              <div class="row">
                <div class="column type"><?php echo get_field('course_kinds', $post->ID); ?></div>
                <div class="column">
                  <span class="hide"><strong>スタイリスト：</strong></span><?php echo get_field('course_salon', $post->ID); ?> <span class="hide"><?php echo get_field('course_stylist', $post->ID); ?></span>
                </div>
                <div class="column hide-on-phone"><?php echo get_field('course_stylist', $post->ID); ?></div>
                <div class="column"><span class="hide"><strong>講座ID： </strong></span><?php echo get_field('course_id', $post->ID); ?></div>
                <div class="column">
                  <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
                    data-src="<?php echo get_field('course_sample_url', $post->ID); ?>" data-url="<?php echo get_field('course_mov_url', $post->ID); ?>" data-bs-target="#stylistModal">
                    動画を視聴する
                  </button>
                </div>
<?php /*
                <div class="modal fade" id="id<?php echo $post->ID; ?>" tabindex="-1" aria-labelledby="stylistModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="stylistModalLabel">サンプル動画</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="ratio ratio-16x9">
                          <iframe width="560" height="315" src="<?php echo get_field('course_sample_url', $post->ID); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?php echo get_field('course_mov_url', $post->ID); ?>" target="_blank"><button type="button" class="btn btn-primary">本編はこちら</button></a>
                      </div>
                    </div>
                  </div>
                </div>
*/ ?>
              </div>
              <!-- 2023.4.3追加 コース内容 -->
              <div class="course-details">
              <strong>内容</strong>： <?php echo get_field('course_description', $post->ID); ?>
              </div>
              <?php $prev_hairstyle = $hairstyle->name; endif; endwhile; ?> 

            </dd>
          </dl>
        <?php endforeach; ?> 
        </div>
        <?php endforeach; endforeach; wp_reset_postdata(); ?> 
      </div>
    </div>

    <div class="d-flex justify-content-center">
      <a href="" target="_blank" class="my-4 btn video-list-data" id="video-list-data"><span id="video-list-data-name"></span>コース一覧<br>（会員の方はこちらから本編映像をご覧いただけます）</a>
    </div>

  </div>
</div>

</div>

<?php
  get_footer();
?>

  <script>
    $(document).ready(function() {
      "use strict"

      var $videoSrc;
      var $kxVideoUrl
      $('.video-btn').on('click', function () {
        $videoSrc = $(this).data("src");
        $kxVideoUrl = $(this).data("url");
        //console.log($videoSrc);
      });

      $('#stylistModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc);
        $("#link").attr('href', $kxVideoUrl);
      })
      
      $(".nav li").click(function() {
        var idx = $(this).index();
        $(".snav").hide();
        $(".nav li").removeClass("on");
        $(this).addClass("on");
        var $snav = $(".snav.s" + (idx + 1));
        $snav.show();
        $snav.find("li").eq(0).trigger("click");
      });

      $(".snav li").click(function() {
        var tabNum = $(this).parent("ul").attr("class").replace("snav s", "");
        var idx = $(this).index() + 1;
        $(".snav li").removeClass("on");
        $(this).addClass("on");
        $(".cont").hide();
        $(".cont" + tabNum + "_" + idx).show();
        const level = $('.nav li').eq((tabNum - 1)).text();
        const skill = $(this).data('name');
        $("#video-list-data").attr('href', 'https://kamismax.kamisma.com/search?words=' + level + skill + 'コース');
        $("#video-list-data-name").text(level + skill);
      });

      tabInit(0);
    });

    function tabInit(index) {
      $(".nav li").eq(index).trigger("click");
    }
  </script>

</body>

</html>