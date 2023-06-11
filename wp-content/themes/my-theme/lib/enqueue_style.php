<?php
/**
 * スタイル読み込み
 */
function enqueue_style() {
  wp_enqueue_style( 'layout', get_template_directory_uri() . '/common/css/layout.css');
  wp_enqueue_style( 'print', get_template_directory_uri() . '/common/css/print.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_style' );
