<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
    echo get_the_post_thumbnail(get_the_ID(), 'full');
    ?>
  </figure>
</header>

<div class="breadcrumb container">
  <?php melevecomvoce_breadcrumb(); ?>
</div><!-- breadcrumb -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
        <?php
          while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'page' );

          endwhile; // End of the loop.
          ?>
        </div><!-- col-lg-10 -->
      </div><!-- row -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
