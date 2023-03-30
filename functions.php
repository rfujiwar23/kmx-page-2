<?php

//page_attributeがついた投稿タイプの管理画面に並び順追加
function check_post_type_support_page_attr() {
  $all_post_types = get_post_types(array('show_ui' => true), false);

  if (!isset($_REQUEST['post_type'])) {
    $edit_post_type = 'post';
  } elseif (in_array($_REQUEST['post_type'], array_keys($all_post_types))) {
    $edit_post_type = $_REQUEST['post_type'];
  } else {
    wp_die(__('Invalid post type'));
  }

  if (post_type_supports($edit_post_type, 'page-attributes')) {
    add_filter('manage_' . $edit_post_type . '_posts_columns', 'add_menu_order_column');
    add_action('admin_print_styles-edit.php', 'add_menu_order_column_styles');
    add_filter('manage_edit-' . $edit_post_type . '_sortable_columns', 'add_menu_order_sortable_column');
  }
}
add_action('load-edit.php', 'check_post_type_support_page_attr');
if (defined('DOING_AJAX') && DOING_AJAX) {
  add_action('admin_init', 'check_post_type_support_page_attr');
}
function add_menu_order_column($posts_columns) {
  $new_columns = array();
  foreach ($posts_columns as $column_name => $column_display_name) {
    if ($column_name == 'date') {
      $new_columns['order'] = __('Order');
      add_action('manage_pages_custom_column', 'display_menu_order_column', 10, 2);
      add_action('manage_posts_custom_column', 'display_menu_order_column', 10, 2);
    }
    $new_columns[$column_name] = $column_display_name;
  }
  return $new_columns;
}
function add_menu_order_sortable_column($sortable_column) {
  $sortable_column['order'] = 'menu_order';
  return $sortable_column;
}
function display_menu_order_column($column_name, $post_id) {
  if ($column_name == 'order') {
    $post_id = (int)$post_id;
    $post = get_post($post_id);
    echo $post->menu_order;
  }
}
function add_menu_order_column_styles() {
?>
  <style type="text/css" charset="utf-8">
    .fixed .column-order {
      width: 7%;
      text-align: center;
    }
  </style>
<?php
}


add_action(
  'restrict_manage_posts',
  function ( $post_type ) {
    if ( $post_type === 'course') {
      // 「manual_category」で絞り込むためのドロップダウンを追加する.
      $taxonomies = array('level' => 'レベル', 'skill' => 'スキル', 'hairstyle' => 'ヘアスタイル');
      foreach($taxonomies as $key => $value) {
        wp_dropdown_categories(
          [
            'show_option_all' => 'すべての' . $value,
            'orderby'         => 'slug',
            'selected'        => get_query_var( $key ),
            'hide_empty'      => 0,
            'name'            => $key,
            'taxonomy'        => $key,
            'value_field'     => 'slug',
            'hierarchical'    => 0, // 親・子関係がある場合は1がおすすめ.
          ]
        );
      }
    }
  }
);



function hwl_home_pagesize( $query ) {
  if ( is_admin() ) return;
  if ( is_post_type_archive( 'course' ) ) {
      $query->set( 'orderby', 'menu_order' );
      $query->set( 'order', 'DESC' );
      return;
  }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );


