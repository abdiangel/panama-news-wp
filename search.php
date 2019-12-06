<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Panama_News
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
<div class="container">
<div class="search-postwrap">
	<div class="row">
	<div class="col-md-12 col-sm-12">
		
					
							<?php if ( have_posts() ) : ?>
					
								<header class="page-header">
									<h1 class="page-title h4-title">
										<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Resultados para: %s', 'panama-news' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h1>
								</header><!-- .page-header -->
					
								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
					
									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );
					
								endwhile;
					
								the_posts_navigation();
					
							else :
					
								get_template_part( 'template-parts/content', 'none' );
					
							endif;
							?>
	</div>
						
					</div>
</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
			
<?php
get_sidebar();
get_footer();
