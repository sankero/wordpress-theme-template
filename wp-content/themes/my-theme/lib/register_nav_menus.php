<?php
/**
 * ナビゲーションメニューの登録
 * ナビゲーションメニューは、テーマのメニューを管理画面から動的に表示できるようにする機能です。
 * [リファレンス]{@link https://developer.wordpress.org/reference/functions/register_nav_menus/}
 */
function register_menus() {
  register_nav_menus( array(
    'main-menu' => 'メインメニュー',
    'footer-menu'  => 'フッターメニュー',
    'side-menu'  => 'サイドメニュー',
  ));
}
add_action( 'after_setup_theme', 'register_menus' );
