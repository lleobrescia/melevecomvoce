<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Me Leve Com Voce
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post--single post'); ?>>
	<header class="entry-header" >
    <h2 class="post__title">
    <?php the_title(); ?>
      <span>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?= get_field('localidade'); ?>
      </span>
    </h2>
	</header><!-- .entry-header -->


	<div class="entry-content post__content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

