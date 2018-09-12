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
      <section id="contato" class="site-info">
        <img class="site-info__logo" src="<?= get_template_directory_uri() ?>/images/me_leve_com_voce-footer.png" alt="Me Leve com Você">

        <?php
        $contact = get_field('contato_rodape', 'option');
        $facebook = get_field('link_facebook', 'option');
        $instagram = get_field('link_instagram', 'option');
        $text = get_field('rodape_text', 'option');
        $youtube = get_field('link_youtube', 'option');
        ?>

        <?php if ($text) : ?>
        <div class="site-info__text">
          <?= $text; ?>
        </div><!-- site-info__text -->
        <?php endif; ?>

        <?php if ($contact) : ?>
        <div class="site-info__contact">
        <?= $contact; ?>
        </div><!-- site-info__contact -->
        <?php endif; ?>

        <div class="site-info__social">
        <?php if ($youtube) : ?>
          <a href="<?= $youtube ?>" rel="external" target="_blank">
            <i class="fa fa-youtube-square"></i>
          </a>
        <?php endif; ?>
        <?php if ($instagram) : ?>
          <a href="<?= $instagram ?>" rel="external" target="_blank">
            <i class="fa fa-instagram"></i>
          </a>
        <?php endif; ?>
          <?php if ($facebook) : ?>
          <a href="<?= $facebook ?>" rel="external" target="_blank">
            <i class="fa fa-facebook-square"></i>
          </a>
        <?php endif; ?>
        </div><!-- site-info__social -->

      </section> <!-- site-info -->
    </div>  <!-- container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
new WOW().init();
</script>
</body>
</html>
