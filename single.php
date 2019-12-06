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
                        <div class="col-md-6 col-sm-12">
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
                                              >Alberto Fernandez</span
                                            >
</div>
                                            <!-- Comments -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__comment-icon">
                            <i class="fas fa-comments"></i>
                                            </i>
                                            <span class="infoelements__comment-text"
                                              >Escriba un comentario</span
                                            >
</div>
                                            <!-- Views -->
                                            <div class="infoelements__item">
                                            <i class="infoelements__views-icon">
                            <i class="far fa-eye"></i>
                                            </i>
                                            <span class="infoelements__views-text">250 vistas</span>
                                            </div>
                                  </div>
                                  <div class="post-main__quote">
                                    <p>
                                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Deserunt ullam impedit officiis sapiente quidem id, ipsam et
                                      sunt mollitia enim ipsum explicabo saepe labore odio
                                      blanditiis modi temporibus molestiae laborum. Lorem ipsum
                                      dolor sit amet consectetur adipisicing elit. Ipsam
                                      cupiditate quidem laudantium? Officiis in expedita,
                                      reiciendis eveniet ab iste fugiat suscipit unde voluptates
                                      consequatur sunt, quaerat nulla, deserunt commodi tempore.
                                    </p>
                                  </div>
                                  <div class="post-main__description">
                                    <p>
                                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                      Deserunt ullam impedit officiis sapiente quidem id, ipsam et
                                      sunt mollitia enim ipsum explicabo saepe labore odio
                                      blanditiis modi temporibus molestiae laborum Lorem ipsum
                                      dolor sit amet consectetur adipisicing elit. Dolor
                                      consequuntur, nisi veniam hic adipisci quia doloremque quod
                                      omnis explicabo, laudantium id? Praesentium ipsa illo esse
                                      earum ab dignissimos. Libero, magni.
                                    </p>
                                  </div>
                                  <h4 class="post-main__subtitle">Subtítulo</h4>
                                  <div class="post-main__description">
                                        <p>
                                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          Deserunt ullam impedit officiis sapiente quidem id, ipsam et
                                          sunt mollitia enim ipsum explicabo saepe labore odio
                                          blanditiis modi temporibus molestiae laborum Lorem ipsum
                                          dolor sit amet consectetur adipisicing elit. Dolor
                                          consequuntur, nisi veniam hic adipisci quia doloremque quod
                                          omnis explicabo, laudantium id? Praesentium ipsa illo esse
                                          earum ab dignissimos. Libero, magni.
                                        </p>
                                    </div>
                                </div>
                        </div>
                    <div class="col-md-4 col-sm-8">
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
                          <div class="post-main__banner post-main__banner1"><img src="assets/post-placeholder.png" alt="Publishing banner"></div>
                          <div class="post-main__banner post-main__banner2"><img src="assets/post-placeholder.png" alt="Publishing banner"></div>
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
