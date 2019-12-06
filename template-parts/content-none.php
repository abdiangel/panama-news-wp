<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Panama_News
 */

?>

<section class="no-results not-found">
<div class="container">
		<header class="page-header">
			<h4 class="page-title h4-title"><?php esc_html_e( 'No se encontraron posts.', 'panama-news' ); ?></h4>
		</header><!-- .page-header -->
</div>

	<div class="page-content container search-none">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'panama-news' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<div class="container"><p class="nores-paragraph"><?php esc_html_e( 'Lo siento pero no pudimos encontrar nada que concuerde con tus términos de busqueda.', 'panama-news' ); ?></p></div>
			<a href="<?php echo get_home_url(); ?>" class="backtohome">Volver al inicio</a>
			<?php

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'panama-news' ); ?></p>
			<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
