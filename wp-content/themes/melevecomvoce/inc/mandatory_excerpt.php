<?php
/**
 * Requeried excerpt for posts
 *
 *
 * @link https://gist.github.com/swalkinshaw/2695510
 *
 * @package Me Leve Com Voce
 */


function melevecomvoce_mandatory_excerpt($data)
{
  $excerpt = $data['post_excerpt'];
  if (empty($excerpt)) {
    if ($data['post_status'] === 'publish') {
      add_filter('redirect_post_location', 'excerpt_error_message_redirect', '99');
    }
    $data['post_status'] = 'draft';
  }
  return $data;
}
add_filter('wp_insert_post_data', 'melevecomvoce_mandatory_excerpt');

function excerpt_error_message_redirect($location)
{
  remove_filter('redirect_post_location', __FILTER__, '99');
  return add_query_arg('excerpt_required', 1, $location);
}

function excerpt_admin_notice()
{
  if (!isset($_GET['excerpt_required'])) return;
  switch (absint($_GET['excerpt_required'])) {
    case 1:
      $message = 'Resumo é obrigatório';
      break;
    default:
      $message = 'Unexpected error';
  }
  echo '<div id="notice" class="error"><p>' . $message . '</p></div>';
}
add_action('admin_notices', 'excerpt_admin_notice');