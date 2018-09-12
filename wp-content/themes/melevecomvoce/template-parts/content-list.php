<?php
/**
 * Template part for displaying posts in list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Me Leve Com Voce
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('post--list post fadeInUpBig wow'); ?>>
 <a href="<?= get_the_permalink()?>" class="post__link"></a>
	<header class="entry-header" >
    <figure class="post__image">
      <?php
      $image = wp_get_attachment_image_src( get_post_thumbnail_id(),"full");
      echo get_the_post_thumbnail( get_the_ID(), 'full');
      ?>
      <div class="post__hover">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </div><!-- post__hover -->
    </figure>

    <h2 class="post__title">
    <?php the_title(); ?>
      <span>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?= get_field('localidade'); ?>
      </span>
    </h2>
	</header><!-- .entry-header -->

  <hr>
	<div class="entry-content post__content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</section><!-- #post-<?php the_ID(); ?> -->
