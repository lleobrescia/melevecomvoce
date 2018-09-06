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
$banner = get_field('banner');
?>

  <section class="banner" style="background-image:url('<?= $banner['url'] ?>')"></section><!-- banner -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		</main><!-- #main -->
  </div><!-- #primary -->

  <section class="indicamos">
    <h2 class="indicamos__title">
      nós seguimos / <span>indicamos</span>
    </h2>

    <div class="container">
      <div class="row">
        <div class="col-sm-10 offset-sm-1 col-xl-8 offset-xl-2">
          <ul class="indicamos__list">

        <?php

            // check if the repeater field has rows of data
            if( have_rows('indicacoes') ):

              // loop through the rows of data
                while ( have_rows('indicacoes') ) : the_row();
                    $link = get_sub_field('link');
                    $imagem = get_sub_field('imagem');
        ?>
        <li class="indicamos-list__item">
          <a href="<?= $link; ?>" target="_blank" rel="external">
            <img src="<?= $imagem['url']; ?>" alt="<?= $imagem['alt']; ?>">
          </a>
        </li>
        <?php
                endwhile;

            endif;

          ?>
          </ul><!-- indicamos__list -->
        </div><!-- col-8 -->
      </div><!-- row -->
    </div><!-- container -->
  </section>

<?php
get_footer();
