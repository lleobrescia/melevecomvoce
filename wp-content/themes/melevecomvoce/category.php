<?php

/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Me Leve Com Voce
 */

get_header();
$category = get_the_category();
$banner = get_field("banner", "category_" . $category[0]->term_id);
?>

<header class="page-banner">
  <figure>
    <img src="<?= $banner['url'] ?>" alt="<?= $category[0]->term_id ?>">
  </figure>
</header>

<div class="breadcrumb container">
  <?php melevecomvoce_breadcrumb(); ?>
</div><!-- breadcrumb -->

<div class="container">
  <section id="primary" class="content-area">

  <?php if($category): ?>
  <?= do_shortcode('[ajax_load_more post_type="post" posts_per_page="3" scroll="false" button_label="Carregar mais postagens" button_loading_label="Carregando..." category="'.$category[0]->slug.'"]'); ?>
  <?php endif; ?>
  </section><!-- #primary -->

</div><!-- container -->
<?php
get_footer();