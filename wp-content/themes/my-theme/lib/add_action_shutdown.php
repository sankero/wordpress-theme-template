<?php
/**
 * 実行フックの確認
 * ブラウザのコンソールログから実行されたフックを確認できます。
 */
add_action('shutdown', function() {
  global $wp_actions;
  echo '<script>';
  foreach($wp_actions as $action => $count) {
    echo "console.log('%s: %d', '{$action}', {$count});";
  }
  echo '</script>';
});
  