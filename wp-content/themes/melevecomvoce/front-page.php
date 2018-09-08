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
$banner      = get_field('banner');
$foto        = get_field('foto_');
$link        = get_field('link_para_a_pagina');
$localizacao = get_field('localizacao');
$resumo      = get_field('resumo');
$titulo      = get_field('titulo');
?>

  <section class="banner" style="background-image:url('<?= $banner['url'] ?>')"></section><!-- banner -->

  <section class="sobre-home">
    <div class="container">
      <div class="row">
        <div class="col-2 offset-md-1">
          <img class="img-fluid" src="<?= $foto['url']; ?>" alt="<?= $titulo; ?>">
        </div><!-- col-2 -->

        <div class="col-10 col-md-7">
          <h1 class="sobre-home__title">
            <?= $titulo; ?>
            <span class="sobre-home__subtitle">
              <i class="fa fa-map-marker" aria-hidden="true"></i> <?= $localizacao; ?>
            </span>
          </h1>

          <div class="sobre-home__resumo">
            <?= $resumo; ?>
          </div><!-- sobre-home__resumo -->

          <a href="<?= $link; ?>" rel="next" title="veja mais sobre a gente :)">
          veja mais sobre a gente :)
          </a>

        </div><!-- col-7 -->

      </div><!-- row -->
    </div><!-- container -->
  </section><!-- sobre-home -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

      <div class="post-list">
        <?php
        $query = new WP_Query(array( 'posts_per_page' => '3'));

        while ( $query->have_posts() ): $query->the_post();
          get_template_part( 'template-parts/content', 'list' );
        endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div><!-- post-list -->

		</main><!-- #main -->
  </div><!-- #primary -->

  <section class="instagram">
    <div class="container text-center">
      <h2 class="instagram__title">
        <span>
          nossa novidades,<br>
          fresquinhas no
        </span>
        <img src="<?= get_template_directory_uri() ?>/images/instagram-tile.png" alt="@melevecomvoce">
      </h2><!-- instagram__title -->
      <!-- LightWidget WIDGET -->
      <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/bca394cd617a59ea8c854df880b9e370.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div><!-- container -->
  </section><!-- instagram -->

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
  </section><!-- indicamos -->

<?php
get_footer();
