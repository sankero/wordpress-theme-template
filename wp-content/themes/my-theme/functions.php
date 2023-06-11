<?php
  switch_to_locale('ja');
  get_template_part('lib/add_theme_support');     // メニュー位置の定義
  get_template_part('lib/register_nav_menus');    // 特定のテーマ機能サポート
  get_template_part('lib/enqueue_scripts');       // javascriptのキュー
  get_template_part('lib/enqueue_style');         // スタイルのキュー
  get_template_part('lib/remove_comment');        // 投稿に対するコメント許可
  get_template_part('lib/remove_menus');          // 管理画面メニューの不要な項目を非表示
  get_template_part('lib/shortcode_breadcrumb');  // ショートコード：パンくず

  // デバッグ用
  // get_template_part('lib/add_action_shutdown');  // 実行フックの確認
