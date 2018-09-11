<?php

/**
 * Custom options page for admin menu
 *
 * Use Advanced Custom Fields Plugin
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 *
 * @package Me Leve Com Voce
 */

function melevecomvoce_acf_init()
{
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title' => __('Theme Information', 'melevecomvoce'),
      'menu_title' => __('Theme Information', 'melevecomvoce'),
      'menu_slug' => 'information',
      'capability' => 'edit_posts'
    ));
  }
}


add_action('acf/init', 'melevecomvoce_acf_init');