<?php
/**
 * テーマサポート
 * 使用中のテーマで特定の機能を使えるようにする関数です。
 * [リファレンス]{@link https://ja.wordpress.org/team/handbook/block-editor/how-to-guides/themes/theme-support/}
 */
add_theme_support( 'title-tag' );                           // headでタイトルタグを自動で出力する
add_theme_support( 'post-thumbnails' );                     // アイキャッチ画像を有効化
add_theme_support( 'automatic-feed-links' );                // 投稿とコメントのRSSフィードのリンクを有効化
add_theme_support( 'custom-background' );                   // カスタム背景機能を有効化
add_theme_support( 'custom-header' );                       // カスタムヘッダー機能を有効化
add_theme_support( 'custom-logo' );                         // カスタムロゴ機能を有効化
add_theme_support( 'editor-styles' );                       // ブロックエディター用のCSSを有効化
add_theme_support( 'customize-selective-refresh-widgets' ); // ウィジェットの部分更新を有効化
