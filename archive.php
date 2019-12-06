<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Panama_News
 */

get_header();
?>

	<div id="primary" class="content-area">
	<main class="site-main">
                <?php
                  // the query
                  $post_not_in_mtn;
                  $category = get_queried_object();
                  $mainthumbnail = new WP_Query(array(
                    'cat' => $category->term_id,
                    'posts_per_page' => 1,
                  ));
                ?>
      <section class="section-main">
      
                <?php if ($mainthumbnail->have_posts()): ?>
                <?php while ($mainthumbnail->have_posts()):
                  $mainthumbnail->the_post(); 
                ?>
                <?php $post_not_in_mtn = get_the_ID(); ?>

        <h2 class="section-main__title h2-title"><?php echo single_cat_title(); ?></h2>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
			      <div class="section-main__img w-100"><?php the_post_thumbnail(); ?></div>
            </div>
            <div class="col-md-6">
              <div class="section-main__rightwrapper">
                <h4 class="section-main__newstitle h4-title">
                  <?php the_title(); ?>
                </h4>
                <div class="infoelements">
                  <!-- Timestamp -->
                  <i class="infoelements__timestamp-icon">
                  <i class="fas fa-clock"></i>
                  </i>
                  <span class="infoelements__timestamp-text"><?php the_date(); ?></span>
                  <!-- Publisher -->
                  <i class="infoelements__publisher-icon">
                  <i class="fas fa-user-check"></i>
                  </i>
                  <span class="infoelements__publisher-text"
                    ><?php the_author(); ?></span
                  >
                  <!-- Comments -->
                  <i class="infoelements__comment-icon">
                  <i class="fas fa-comments"></i>
                  </i>
                  <span class="infoelements__comment-text"
                    >Escriba un comentario</span
                  >
                  <!-- Views -->
                  <i class="infoelements__views-icon">
                  <i class="far fa-eye"></i>
                  </i>
                  <span class="infoelements__views-text">250 vistas</span>
                </div>
                <div class="section-main__quote">
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
                <div class="section-main__description">
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
                <div class="section-main__button">
                  <a href="<?php echo get_the_permalink(); ?>" class="button button--with-thumbnail">Leer más</a>
                </div>
              </div>
            </div>
          </div>
        </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
      </section>
      <div class="container">
        <div class="publishing-banner">
          <img src="<?php echo get_template_directory_uri() . "/assets/imgs/pub-banner.png" ?>" alt="Panamá news logo" />
        </div>
      </div>
      
      <!--------------------------------------------------- OTHER NEWS --------------------------------------------------------------->

      <section class="breaking-news standar-mtop">
          <div class="container">
            <div class="section-new__flex">

                    <?php
                      // the query
                      $post_not_in_btn1;
                      $category = get_queried_object();
                      $thumbnailbig1 = new WP_Query(array(
                        'cat' => $category->term_id,
                        'posts_per_page' => 6,
                        'post__not_in' => [$post_not_in_mtn],
                      ));
                    ?>
                    <?php if ($thumbnailbig1->have_posts()): ?>
                    <?php while ($thumbnailbig1->have_posts()):
                      $thumbnailbig1->the_post(); 
                    ?>
                    <?php $post_not_in_btn1 = get_the_ID(); ?>

                  <div class="section-new">
                      <div class="thumbnailbig">
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
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
              </div>

              <div class="container">
              <div class="publishing-banner">
              <img src="<?php echo get_template_directory_uri() . "/assets/imgs/pub-banner.png" ?>" alt="Panamá news logo" />
              </div>
              </div>

        </section>

    </main>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

