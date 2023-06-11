<?php
/**
 * JavaScript読み込み
 */
function my_enqueue_scripts() {
  // 管理画面では読み込ませない
  if ( is_admin() ) return;

  wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/common/js/main.js');
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
