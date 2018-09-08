<?php
// Intented to use bootstrap 4.
// Location is like a 'primary'
// After, you print menu just add melevecomvoce_custom_menu("primary") in your preferred position;

#add this function in your theme functions.php

function melevecomvoce_custom_menu($theme_location)
{
  $url_info = parse_url( home_url() );

  if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {

    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    $facebook = get_field('link_facebook', 'option');
    $instagram = get_field('link_instagram', 'option');
    $youtube = get_field('link_youtube', 'option');

    $menu_list = '<nav id="site-navigation" class="nav-main navbar navbar-expand-lg navbar-light">' . "\n";
    $menu_list .= '<div class="container">' . "\n";

    $menu_list .= '<a href="' . home_url() . '"
    title="' . get_bloginfo('name') . '"
    rel="home" class="nav-main__logo">
      <img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">
    </a>' . "\n";


    $menu_list .= '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">' . "\n";
    $menu_list .= '<span class="navbar-toggler-icon"></span>' . "\n";
    $menu_list .= '</button>' . "\n";


    $menu = get_term($locations[$theme_location], 'nav_menu');
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list .= '<div class="collapse navbar-collapse" id="navbarNav">' . "\n";
    $menu_list .= '<ul class="navbar-nav">' . "\n";

    foreach ($menu_items as $menu_item) {
      if ($menu_item->menu_item_parent == 0) {

        $parent = $menu_item->ID;

        $menu_array = array();
        $hasImage = false;

        foreach ($menu_items as $submenu) {
          if ($submenu->menu_item_parent == $parent) {
            $bool = true;
            $image = get_field("imagem", "category_" . $submenu->object_id);
            $liClass = 'nav-item';

            if ($image) {
              $liClass = 'nav-item nav-item--image';
              $hasImage = true;
            }

            $menu_array[] = '<li class="'.$liClass.'">
            <a class="nav-link" rel="next" href="' . $submenu->url . '">
            <img src="' . $image['url'] . '" alt="' . $submenu->title . '">
            ' . $submenu->title . '
            </a></li>' . "\n";
          }
        }
        if ($bool == true && count($menu_array) > 0) {
          $dropdownClass = 'dropdown';
          if ($hasImage) {
            $dropdownClass = 'dropdown dropdown--image';
          }


          $menu_list .= '<li class="dropdown '.$dropdownClass.'">'. "\n";
          $menu_list .= '<a href="' . $menu_item->url . '" class="dropdown-toggle">' . $menu_item->title . '</a>' . "\n";

          $menu_list .= '<ul class="dropdown-menu">' . "\n";
          $menu_list .= implode("\n", $menu_array);
          $menu_list .= '</ul>' . "\n";

        } else {

          $menu_list .= '<li class="nav-item">' . "\n";
          $menu_list .= '<a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' . "\n";
        }

      }

            // end <li>
      $menu_list .= '</li>' . "\n";
    }

    $menu_list .= '</ul>' . "\n";
    $menu_list .= '</div><!-- collapse -->' . "\n";
    $menu_list .= '<div class="navbar-social">
    <a href="' . $youtube . '" rel="external" target="_blank">
      <i class="fa fa-youtube-square"></i>
    </a>
    <a href="' . $instagram . '" rel="external" target="_blank">
      <i class="fa fa-instagram"></i>
    </a>
    <a href="' . $facebook . ' " rel="external" target="_blank">
      <i class="fa fa-facebook-square"></i>
    </a>
    </div>' . "\n";
    $menu_list .= '</div><!-- /.container -->' . "\n";
    $menu_list .= '</nav>' . "\n";

  } else {
    $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
  }

  echo $menu_list;
}
?>