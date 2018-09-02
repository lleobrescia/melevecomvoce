<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Me Leve Com Voce
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    <div class="container-fluid">
      <section class="site-info">
        <img class="site-info__logo" src="<?= get_template_directory_uri() ?>/images/me_leve_com_voce-footer.png" alt="Me Leve com Você">

        <div class="site-info__text">
          Para elogios, sugestões de conteúdo, parcerias ou apenas <br>para trocar uma idéia, entre em contato com a gente:
        </div><!-- site-info__text -->

        <div class="site-info__contact">
          viagem@melevecomvoce.com.br  /  +55 31 98798.1160
        </div><!-- site-info__contact -->

        <div class="site-info__social">
          <a href="" rel="external" target="_blank">
            <i class="fa fa-youtube-square"></i>
          </a>
          <a href="" rel="external" target="_blank">
            <i class="fa fa-instagram"></i>
          </a>
          <a href="" rel="external" target="_blank">
            <i class="fa fa-facebook-square"></i>
          </a>
        </div><!-- site-info__social -->

      </section> <!-- site-info -->
    </div>  <!-- container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
