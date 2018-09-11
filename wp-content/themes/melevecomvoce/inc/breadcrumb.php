<?php

/**
 * custom breadcrumb
 *
 *
 * @package Me Leve Com Voce
 */

function melevecomvoce_breadcrumb() {
  $title = get_the_title();
  global $post;
  echo '<ul id="trilha">';
  echo '<li><a href="';
  echo get_option('home');
  echo '">';
  echo 'Me Leve com Você';
  echo '</a></li><li class="breadcrumb__separador"> &#8811; </li>';
  if (is_category() || is_single()) {
      echo '<li>';
      the_category(' </li><li class="breadcrumb__separador"> &#8811; </li><li> ');
      if (is_single()) {
          echo '</li><li class="breadcrumb__separador"> &#8811; </li><li>';
          the_title();
          echo '</li>';
      }
  } elseif (is_page()) {
      if($post->post_parent){
          $anc = get_post_ancestors( $post->ID );
          $title = get_the_title();
          foreach ( $anc as $ancestor ) {
              $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="breadcrumb__separador">/</li>';
          }
          echo $output;
          echo ''.$title.'';
      } else {
          echo '<li> '.get_the_title().'</li>';
      }
  }else{
    echo '<li> '.$title.'</li>';
  }
  echo '</ul>';
}