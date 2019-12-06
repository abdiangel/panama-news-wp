<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Panama_News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />
	<link
      href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap"
      rel="stylesheet"
    />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">

  <div class="responsive-header">
        <div class="responsive-logo">
          <a href="<?php echo get_home_url(); ?>"
            ><img src="<?php echo get_template_directory_uri() . "/assets/imgs/logo-mini.png" ?>" alt="Panamá news logo pequeño" /></a>
        </div>
        <div class="navigation">
          <input
            type="checkbox"
            class="navigation__checkbox"
            id="navi-toggle"
          />
          <label for="navi-toggle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
          </label>
          <div class="navigation__background">&nbsp;</div>
          <nav class="navigation__nav">
            <?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'menu_id' => 'primary-menu',
    'menu_class' => 'navigation__list',
));
?>
          </nav>
        </div>
      </div>

	<div class="header__main-bar">
        <div class="header__left-elements">
          <span class="header__date"><?php echo date_i18n('l d-m-Y') ?></span>
          <span class="header__country">Panamá, PA</span>
          <div class="header__weather">
            <i class="header__weather-icon">
              <i class="fa fa-cloud-sun-rain"></i>
            </i>
            <span class="header__weather-info">25ºC <?php ?></span>
          </div>
        </div>
        <div class="header__hashtag"><span>#ElPoderdelaGente</span></div>
        <div class="header__right-elements">
          <div class="header__social">
            <i class="header__social-icon">
              <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </i>
            <i class="header__social-icon">
              <a href="https://twitter.com/dpanamanews" target="_blank"><i class="fab fa-twitter"></i></a>
            </i>
            <i class="header__social-icon">
              <a href="https://www.instagram.com/dpanamanews/" target="_blank"><i class="fab fa-instagram"></i></a>
            </i>
          </div>
          <div class="header__search">
            <label for="search">
              <i class="header__search-icon">
                <i class="fa fa-search"></i>
              </i>
            </label>
            <div class="header-search">
			<?php get_search_form(); ?>
        </div>
          </div>
        </div>
	  </div>
	  <!-- LOGO -->
	  <div class="header__logo">
    <a href="<?php echo get_home_url(); ?>"
        ><img src="<?php echo get_template_directory_uri() . "/assets/imgs/logo.png" ?>" alt="Panamá news logo" /></a>
	  </div>
			<!-- LOGO -->
			
				  <!-- NAVIGATION -->

      <div class="container">
        <div class="header__nav">
		<?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'menu_id' => 'primary-menu',
    'menu_class' => 'header__nav-list',
));
?>
        </div>
	  </div>
	  	  <!-- NAVIGATION -->
				<!-- RECENT NEWS -->
      <div class="container">
        <?php
$randomargs = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_key' => '_thumbnail_id',
    'no_found_rows' => 'true',
    '_randomize_posts_count' => 1
);
$random = new WP_Query($randomargs); ?>
        <div class="header__recentnews">
        <?php if ($random->have_posts()): ?>
        <?php while ($random->have_posts()):
        $random->the_post(); ?>
            <span class="header__recentnews-title">Últimas noticias</span>
            <a href="<?php echo get_post_permalink(); ?>" class="header__recentnews-description">
            <span
              ><?php the_title() ?></span
            >
            </a>
          <?php
    endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php
endif; ?>
        </div>
	  </div>
			<!-- RECENT NEWS -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
