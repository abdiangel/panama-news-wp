<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Panama_News
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="container">
            <div class="post-main">
            <div class="row">
            <?php gt_set_post_view(); ?>
                        <div class="col-md-7 col-sm-12">
                                <div class="post-main__imgbg">
									<?php the_post_thumbnail(); ?>
                                </div>
                                <div class="post-main__leftwrapper">
                                  <h4 class="post-main__newstitle h4-title">
								  	<?php the_title() ?>
                                  </h4>
                                  <div class="infoelements">
                                            <!-- Timestamp -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__timestamp-icon">
                            <i class="fas fa-clock"></i>
                                            </i>
                                            <span class="infoelements__timestamp-text"><?php echo get_the_date(); ?></span>
</div>
                                            <!-- Publisher -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__publisher-icon">
                            <i class="fas fa-user-check"></i>
                                            </i>
                                            <span class="infoelements__publisher-text"
                                              ><?php the_author(); ?></span
                                            >
</div>
                                            <!-- Comments -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__comment-icon">
                            <i class="fas fa-comments"></i>
                                            </i>
                                            <span class="infoelements__comment-text"
                                              ><a href="#comments-wrapper">Escriba un comentario</a></span
                                            >
</div>
                                            <!-- Views -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__views-icon">
                            <i class="far fa-eye"></i>
                                            </i>
                                            <span class="infoelements__views-text"><?= gt_get_post_view(); ?></span>
                                            </div>
                                  </div>
                                  <div class="post-main__description">
                                    <p>
                                      <?php the_content();?>
                                    </p>
                                  </div>
                                </div>
                                <div id="comments-wrapper"><?php comments_template();?></div>
                        </div>
                    <div class="col-md-3 col-sm-8">
                        <div class="post-main__rightwrapper">
                            <div class="post-main__subtitle">Noticias relacionadas</div>

                            <?php
                            $categoriesFiltered = array_filter(get_the_category(),function($category){
                              if ($category->name === 'DP') {
                                return FALSE;
                              }
                              return $category;
                            });
                            $categoriesId = array_map(function($cat) {
                              return $cat->cat_ID;
                            }, $categoriesFiltered);
                        $args = array(
                                    'category__in' => $categoriesId,
                                    'posts_per_page' => 3,
                                    'orderby'       => 'rand',
                                    'post__not_in' => array( get_queried_object_id() )
                                    );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) : ?>

                          <!-- the loop -->
                          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                              <div class="post-main__smnew">
                                                  <div class="post-main__smnewimg">
                                                      <?php the_post_thumbnail(); ?>
                                                  </div>
                                                  <div class="post-main__subtitle"><?php the_title(); ?></div>
                                                  <div class="post-main__description"><?php the_excerpt(); ?></div>
                                              </div>  
                          <?php endwhile; ?>
                          <!-- end of the loop -->
                          <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                    <div class="Post-main-banners">
                    <a href="<?php echo get_theme_mod('dpn_postmain_banners-link5') ?>"><img src="<?php echo esc_url(get_theme_mod('dpn_postmain_banners-image5')) ?>" alt="Publicidad" /></a>
                    <a href="<?php echo get_theme_mod('dpn_postmain_banners-link6') ?>"><img src="<?php echo esc_url(get_theme_mod('dpn_postmain_banners-image6')) ?>" alt="Publicidad" /></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
