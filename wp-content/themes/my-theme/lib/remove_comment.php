<?php
/**
 * 投稿に対するコメント許可
 * [リファレンス]{@link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/comments_open}
 */
function remove_comment( $open, $post_id ) {
  $post = get_post( $post_id );
  //投稿のコメントを投稿できないようにします
  if( $post->post_type == 'post' ) {
      return false;
  }
  //固定ページのコメントを投稿できないようにします
  if( $post->post_type == 'page' ) {
      return false;
  }
  //メディアのコメントを投稿できないようにします
  if( $post->post_type == 'attachment' ) {
      return false;
  }
  return false;
}
add_filter( 'comments_open', 'remove_comment', 10 , 2 );
