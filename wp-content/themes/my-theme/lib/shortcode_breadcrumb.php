<?php
/**
 * パンくず
 * ショートコード [breadcrumb] で表示できます。
 */
function shortcode_breadcrumb() {
  $ret = '<ul class="breadcrumb"><li><a href="'.home_url().'">HOME</a></li>';

  if (is_search()) {
    $ret .= '<li>「'. get_search_query() . '」で検索した結果</li>';
  } elseif (is_404()) {
    $ret .= '<li>お探しのページは見つかりませんでした</li>';
  } elseif (is_tag()) {
    $ret .= '<li>タグ：'. single_tag_title('', false) . '</li>';
  } elseif (is_tax()) {
    $taxonomy = get_queried_object();
    $taxonomy_post_type = $taxonomy->object_type[0];
    $taxonomy_name = get_post_type_object($taxonomy_post_type)->label;
    $taxonomy_link = get_post_type_archive_link($taxonomy_post_type);
    $taxonomy_term = single_term_title('', false);

    if ($taxonomy_link && $taxonomy_name) {
      $ret .= '<li><a href="'. $taxonomy_link .'">'. $taxonomy_name .'</a></li>';
    }

    if (($taxonomy->taxonomy === 'case_tag' || $taxonomy->taxonomy === 'reform_tag') && $taxonomy_term) {   
      $ret .= '<li>タグ：'. $taxonomy_term . '</li>'; 
    } elseif ($taxonomy_term) {
      $ret .= '<li>'. $taxonomy_term . '</li>';
    }
  } elseif (is_page()) {
    global $post;

    if ($post->post_parent != 0) {
      $ancestors = array_reverse($post->ancestors);
      foreach ($ancestors as $ancestor) {
        $ret .= '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
      }
    } else {
      $ret .= '<li>'. get_the_title() . '</li>';
    }
  } elseif (is_single()) {
    $post_type = get_post_type();
    $taxonomy_name = get_post_type_object($post_type)->label;
    $taxonomy_link = get_post_type_archive_link($post_type);

    if ($post_type !== 'post' && $taxonomy_name && $taxonomy_link) {
      $ret .= '<li><a href="'. $taxonomy_link .'">'. $taxonomy_name . '</a></li>';
    }

    $term_slug = get_post_type_object($post_type)->taxonomies[0];
    $terms = wp_get_post_terms(get_the_ID(), $term_slug);
    foreach ($terms as $term) {
      if ($term->parent) {
        $termParent = get_term($term->parent, $term_slug);
        $ret .= '<li><a href="'.get_term_link($termParent->term_id).'">'.$termParent->name.'</a></li>';
      }
      $ret .= '<li><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a></li>';
    }
    $ret .= '<li>'. get_the_title() . '</li>';
  } elseif (is_archive()) {
    $ret .= '<li>'. str_replace('アーカイブ:', '', get_the_archive_title()) . '</li>';
  } else {
    $ret .= '<li>'. get_the_title() . '</li>';
  }

  $ret .= '</ul>';
  return $ret;
}

add_shortcode('breadcrumb', 'shortcode_breadcrumb');
