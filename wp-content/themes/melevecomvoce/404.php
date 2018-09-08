<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Me Leve Com Voce
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">
            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'melevecomvoce' ); ?>
          </h1>
				</header><!-- .page-header -->

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
