<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Panama_News
 */

get_header();
?>
<div id="primary" class="content-area">
    <main class="site-main">
      <div class="container">
        <div class="main-slider">
            <?php
              echo do_shortcode('[smartslider3 slider=3]');
            ?>
        </div>
        <div class="publishing-banner">
            <img src="<?php echo get_template_directory_uri() . "/assets/imgs/pub-banner.png" ?>" alt="Publicidad" />
        </div>
        <section class="recentnews-section">
          <div class="row">
            <?php
              // the query
              $post_not_in;
              $recentnew_boxbg = new WP_Query(array(
                  'posts_per_page' => 1,
              ));
            ?>
            <div class="col-md-6">
              <?php if ($recentnew_boxbg->have_posts()): ?>
              <?php while ($recentnew_boxbg->have_posts()):
                $recentnew_boxbg->the_post(); 
              ?>
              <?php $post_not_in = get_the_ID(); ?>
              <div class="recentnew-box h-100">
                <a href="<?php echo get_the_permalink(); ?>" class="h-100">
                  <div class="recentnew-box__img w-100">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="recentnew-box__elements">
                    <p class="recentnew-box__title uppercase">
                      <?php the_title() ?>
                    </p>
                    <i class="recentnew-box__icon">
                      <ion-icon name="alarm"></ion-icon>
                    </i>
                    <span class="recentnew-box__timestamp"><?php echo get_the_date(); ?></span>
                  </div>
                </a>
              </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
                <!-----------------------------------------SMALL BOXES-------------------------------------------->
            <?php
            // the query
            $recentnew_boxsm = new WP_Query(['posts_per_page' => 4, 'post__not_in' => [$post_not_in]]);
            ?>
            <div class="col-md-6">
              <div class="recentnew-container">
                <?php if ($recentnew_boxsm->have_posts()): ?>
                <?php while ($recentnew_boxsm->have_posts()):
                  $recentnew_boxsm->the_post(); 
                ?>
                <div class="recentnew-box">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <div class="recentnew-box__img w-100">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="recentnew-box__elements">
                      <p class="recentnew-box__title">
                        <?php the_title() ?>
                      </p>
                      <i class="recentnew-box__icon">
                        <ion-icon name="alarm"></ion-icon>
                      </i>
                      <span class="recentnew-box__timestamp"><?php echo get_the_date(); ?></span>
                    </div>
                  </a>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
      </div>
        <!------------end of main sectioooooooooooooooooon----------------------------------------->

        <!-------------------- BIG THUMBNAIL LEFT-------------------------------------------------->
        <section class="breaking-news">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <?php
                  // the query
                  $post_not_in_btn1;
                  $thumbnailbig1 = new WP_Query(array(
                    'category_name' => 'nacionales',
                    'posts_per_page' => 1,
                  ));
                ?>
                <?php if ($thumbnailbig1->have_posts()): ?>
                <?php while ($thumbnailbig1->have_posts()):
                  $thumbnailbig1->the_post(); 
                ?>
                <?php $post_not_in_btn1 = get_the_ID(); ?>
                  <div class="thumbnailbig">
                    <h3 class="thumbnailbig__header h3-title">Nacionales</h3>
                    <div class="thumbnailbig__img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h4 class="thumbnailbig__title h4-title">
                        <?php the_title(); ?>
                    </h4>
                    <div class="thumbnailbig__description">
                        <?php the_excerpt(); ?>
                    </div>
                    <i class="thumbnailbig__icon">
                        <i class="fas fa-clock"></i>
                    </i>
                    <span class="thumbnailbig__timestamp"><?php echo get_the_date(); ?></span>
                    <a href="<?php echo get_the_permalink(); ?>" class="button button--with-thumbnail">Leer más</a>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
              <!-------------------- BIG THUMBNAIL RIGHT-------------------------------------------------->
              <div class="col-md-6">
                <?php
                // the query
                $post_not_in_btn2;
                $thumbnailbig2 = new WP_Query(array(
                    'category_name' => 'internacionales',
                    'posts_per_page' => 1,
                ));
                ?>
                <?php if ($thumbnailbig2->have_posts()): ?>
                <?php while ($thumbnailbig2->have_posts()):
                  $thumbnailbig2->the_post(); 
                ?>
                <?php $post_not_in_btn2 = get_the_ID(); ?>
                <div class="thumbnailbig">
                  <h3 class="thumbnailbig__header h3-title">Internacionales</h3>
                  <div class="thumbnailbig__img">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <h4 class="thumbnailbig__title h4-title">
                    <?php the_title(); ?>
                  </h4>
                  <div class="thumbnailbig__description">
                    <?php the_excerpt(); ?>
                  </div>
                  <i class="thumbnailbig__icon">
                    <i class="fas fa-clock"></i>
                  </i>
                  <span class="thumbnailbig__timestamp"><?php the_date(); ?></span>
                  <a href="<?php echo get_the_permalink(); ?>" class="button button--with-thumbnail">Leer más</a>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-------------------------left elements small thumbs----------------------->
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="row no-gutters">
                  <?php
                    // the query
                    $thumbnailsm1 = new WP_Query(array(
                        'category_name' => 'nacionales',
                        'posts_per_page' => 2,
                        'post__not_in' => [$post_not_in_btn1],
                    ));
                  ?>
                  <?php if ($thumbnailsm1->have_posts()): ?>
                  <?php while ($thumbnailsm1->have_posts()):
                    $thumbnailsm1->the_post(); 
                  ?>
                  <div class="col-md-6">
                    <div class="thumbnailsmall thumbnailsmall--border">
                      <div class="thumbnailsmall__img">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="thumbnailsmall__description">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="thumbnailsmall__below">
                        <div class="thumbnailsmall__timewrapper w-50">
                          <i class="thumbnailsmall__icon">
                            <i class="fas fa-clock"></i>
                          </i>
                          <span class="thumbnailsmall__timestamp"><?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="button w-50">Leer más</a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                </div>
              </div>
              <!-------------------------right elements small thumbs----------------------->
              <div class="col-md-6">
                <div class="row no-gutters">
                <?php
                  // the query
                  $thumbnailsm2 = new WP_Query(array(
                    'category_name' => 'internacionales',
                    'posts_per_page' => 2,
                    'post__not_in' => [$post_not_in_btn2],
                  ));
                ?>
                <?php if ($thumbnailsm2->have_posts()): ?>
                <?php while ($thumbnailsm2->have_posts()):
                  $thumbnailsm2->the_post(); 
                ?>
                  <div class="col-md-6">
                    <div class="thumbnailsmall thumbnailsmall--border">
                      <div class="thumbnailsmall__img">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="thumbnailsmall__description">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="thumbnailsmall__below">
                        <div class="thumbnailsmall__timewrapper w-50">
                          <i class="thumbnailsmall__icon">
                            <i class="fas fa-clock"></i>
                          </i>
                          <span class="thumbnailsmall__timestamp"><?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="button w-50">Leer más</a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!---------------------SECOND BREAKING NEWS-------------------------------------->


              <!-------------------- BIG THUMBNAIL LEFT-------------------------------------------------->
              <section class="breaking-news standar-mtop">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <?php
                  // the query
                  $post_not_in_btn3;
                  $thumbnailbig3 = new WP_Query(array(
                    'category_name' => 'deportes',
                    'posts_per_page' => 1,
                  ));
                ?>
                <?php if ($thumbnailbig3->have_posts()): ?>
                <?php while ($thumbnailbig3->have_posts()):
                  $thumbnailbig3->the_post(); 
                ?>
                <?php $post_not_in_btn3 = get_the_ID(); ?>
                  <div class="thumbnailbig">
                    <h3 class="thumbnailbig__header h3-title">Deportes</h3>
                    <div class="thumbnailbig__img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h4 class="thumbnailbig__title h4-title">
                        <?php the_title(); ?>
                    </h4>
                    <div class="thumbnailbig__description">
                        <?php the_excerpt(); ?>
                    </div>
                    <i class="thumbnailbig__icon">
                        <i class="fas fa-clock"></i>
                    </i>
                    <span class="thumbnailbig__timestamp"><?php echo get_the_date(); ?></span>
                    <a href="<?php echo get_the_permalink(); ?>" class="button button--with-thumbnail">Leer más</a>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
              <!-------------------- BIG THUMBNAIL RIGHT-------------------------------------------------->
              <div class="col-md-6">
                <?php
                // the query
                $post_not_in_btn4;
                $thumbnailbig4 = new WP_Query(array(
                    'category_name' => 'estilo-de-vida',
                    'posts_per_page' => 1,
                ));
                ?>
                <?php if ($thumbnailbig4->have_posts()): ?>
                <?php while ($thumbnailbig4->have_posts()):
                  $thumbnailbig4->the_post(); 
                ?>
                <?php $post_not_in_btn4 = get_the_ID(); ?>
                <div class="thumbnailbig">
                  <h3 class="thumbnailbig__header h3-title">Estilo de vida</h3>
                  <div class="thumbnailbig__img">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <h4 class="thumbnailbig__title h4-title">
                    <?php the_title(); ?>
                  </h4>
                  <div class="thumbnailbig__description">
                    <?php the_excerpt(); ?>
                  </div>
                  <i class="thumbnailbig__icon">
                    <i class="fas fa-clock"></i>
                  </i>
                  <span class="thumbnailbig__timestamp"><?php echo get_the_date(); ?></span>
                  <a href="<?php echo get_the_permalink(); ?>" class="button button--with-thumbnail">Leer más</a>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-------------------------left elements small thumbs----------------------->
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="row no-gutters">
                  <?php
                    // the query
                    $thumbnailsm3 = new WP_Query(array(
                        'category_name' => 'deportes',
                        'posts_per_page' => 2,
                        'post__not_in' => [$post_not_in_btn3],
                    ));
                  ?>
                  <?php if ($thumbnailsm3->have_posts()): ?>
                  <?php while ($thumbnailsm3->have_posts()):
                    $thumbnailsm3->the_post(); 
                  ?>
                  <div class="col-md-6">
                    <div class="thumbnailsmall thumbnailsmall--border">
                      <div class="thumbnailsmall__img">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="thumbnailsmall__description">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="thumbnailsmall__below">
                        <div class="thumbnailsmall__timewrapper w-50">
                          <i class="thumbnailsmall__icon">
                            <i class="fas fa-clock"></i>
                          </i>
                          <span class="thumbnailsmall__timestamp"><?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="button w-50">Leer más</a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                </div>
              </div>
              <!-------------------------right elements small thumbs----------------------->
              <div class="col-md-6">
                <div class="row no-gutters">
                <?php
                  // the query
                  $thumbnailsm4 = new WP_Query(array(
                    'category_name' => 'estilo-de-vida',
                    'posts_per_page' => 2,
                    'post__not_in' => [$post_not_in_btn4],
                  ));
                ?>
                <?php if ($thumbnailsm4->have_posts()): ?>
                <?php while ($thumbnailsm4->have_posts()):
                  $thumbnailsm4->the_post(); 
                ?>
                  <div class="col-md-6">
                    <div class="thumbnailsmall thumbnailsmall--border">
                      <div class="thumbnailsmall__img">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="thumbnailsmall__description">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="thumbnailsmall__below">
                        <div class="thumbnailsmall__timewrapper w-50">
                          <i class="thumbnailsmall__icon">
                            <i class="fas fa-clock"></i>
                          </i>
                          <span class="thumbnailsmall__timestamp"><?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="button w-50">Leer más</a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>



    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();