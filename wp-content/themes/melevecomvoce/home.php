<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Me Leve Com Voce
 */

get_header();
?>

<header class="page-banner">
  <figure>
    <?php
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(),"full");
    echo get_the_post_thumbnail( get_the_ID(), 'full');
    ?>
  </figure>
</header>

<div class="container">
  <section id="primary" class="content-area">

  <?= do_shortcode('[ajax_load_more post_type="post" posts_per_page="3" scroll="false" button_label="Carregar mais postagens" button_loading_label="Carregando..."]'); ?>

  </section><!-- #primary -->

</div><!-- container -->
<?php
get_footer();
