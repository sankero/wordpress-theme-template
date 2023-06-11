<?php
/**
 * 管理画面メニューの不要な項目を非表示
 * [リファレンス]{@link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/remove_menu_page}
 */
function remove_menus(){
  // remove_menu_page( 'index.php' ); //ダッシュボード
  // remove_menu_page( 'edit.php' ); //投稿メニュー
  // remove_menu_page( 'upload.php' ); //メディア
  // remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
  remove_menu_page( 'edit-comments.php' ); //コメントメニュー
  // remove_menu_page( 'themes.php' ); //外観メニュー
  // remove_menu_page( 'plugins.php' ); //プラグインメニュー
  // remove_menu_page( 'tools.php' ); //ツールメニュー
  // remove_menu_page( 'options-general.php' ); //設定メニュー
}
add_action( 'admin_menu', 'remove_menus' );
