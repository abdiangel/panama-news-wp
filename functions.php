<?php
/**
 * Panama News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Panama_News
 */

if ( ! function_exists( 'panama_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function panama_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Panama News, use a find and replace
		 * to change 'panama-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'panama-news', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'panama-news' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'panama_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'panama_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function panama_news_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'panama_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'panama_news_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function panama_news_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'panama-news' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'panama-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'panama_news_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function panama_news_scripts() {
	wp_enqueue_style( 'panama-news-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bundle-js', get_template_directory_uri() . '/js/custom.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bundle-vendor-js', get_template_directory_uri() . '/js/vendor.min.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'panama_news_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//------------------------------------------------------LOGOS-----------------------------------------------------------------------

// Banners customization 
function dpn_logos($wp_customize) {
	$wp_customize->add_section('dpn_logos_section', array(
		'title' => 'Editar logos',
		"description" => 'Sube o elige imágenes para editar logos.'
	));

	$wp_customize->add_setting('dpn_logos-image1');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_logos-image-control1', array(
			'label' => 'Logo principal',
			'section' => 'dpn_logos_section',
			'settings' => 'dpn_logos-image1',
			'width' => 450,	
			'height' => 120
		)));

	$wp_customize->add_setting('dpn_logos-image2');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_logos-image-control2', array(
			'label' => 'Logo principal responsivo',
			'section' => 'dpn_logos_section',
			'settings' => 'dpn_logos-image2',
			'width' => 50,
			'height' => 50
		)));

	$wp_customize->add_setting('dpn_logos-image3');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_logos-image-control3', array(
			'label' => 'Logo de footer',
			'section' => 'dpn_logos_section',
			'settings' => 'dpn_logos-image3',
			'width' => 425,
			'height' => 94
		)));
}

add_action('customize_register', 'dpn_logos');


//------------------------------------------------------SOCIAL-----------------------------------------------------------------------

// Banners customization 
function dpn_social($wp_customize) {
	$wp_customize->add_section('dpn_social_section', array(
		'title' => 'Editar socialmedia',
		"description" => 'Elige los links de tus redes sociales.'
	));

	$wp_customize->add_setting( 'dpn_social-linktw', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_urltw',
	) );
	
	$wp_customize->add_control( 'dpn_social-linktw', array(
		'type' => 'url',
		'section' => 'dpn_social_section', // Add a default or your own section
		'label' => __( 'Link para twitter' ),
		'description' => __( 'Escribe el link completo hacia tu cuenta de twitter' ),
		'input_attrs' => array(
		'placeholder' => __( 'http://www.twitter.com/cuenta' ),
		),
	) );
	
	function themeslug_sanitize_urltw( $url ) {
		return esc_url_raw( $url );
	}

	$wp_customize->add_setting( 'dpn_social-linkfb', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_urlfb',
	) );
	
	$wp_customize->add_control( 'dpn_social-linkfb', array(
		'type' => 'url',
		'section' => 'dpn_social_section', // Add a default or your own section
		'label' => __( 'Link para Facebook' ),
		'description' => __( 'Escribe el link completo hacia tu cuenta de facebook' ),
		'input_attrs' => array(
		'placeholder' => __( 'http://www.facebook.com/cuenta' ),
		),
	) );
	
	function themeslug_sanitize_urlfb( $url ) {
		return esc_url_raw( $url );
	}

	$wp_customize->add_setting( 'dpn_social-linkig', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_urlig',
	) );
	
	$wp_customize->add_control( 'dpn_social-linkig', array(
		'type' => 'url',
		'section' => 'dpn_social_section', // Add a default or your own section
		'label' => __( 'Link para Instagram' ),
		'description' => __( 'Escribe el link completo hacia tu cuenta de Instagram' ),
		'input_attrs' => array(
		'placeholder' => __( 'http://www.instagram.com/cuenta' ),
		),
	) );
	
	function themeslug_sanitize_urlig( $url ) {
		return esc_url_raw( $url );
	}
}

add_action('customize_register', 'dpn_social');

//------------------------------------------------------BANNERS-----------------------------------------------------------------------

// Banners customization 
function dpn_postmain_banners($wp_customize) {
	$wp_customize->add_section('dpn_postmain_banners_section', array(
		'title' => 'Editar banners',
		"description" => 'Sube o elige imágenes para editar los banners.'
	));

	$wp_customize->add_setting('dpn_postmain_banners-image1');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control1', array(
			'label' => 'Banner superior index',
			'section' => 'dpn_postmain_banners_section',
			'settings' => 'dpn_postmain_banners-image1',
			'width' => 2500,
			'height' => 250
		)));

		$wp_customize->add_setting( 'dpn_postmain_banners-link1', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_url1',
		) );
		
		$wp_customize->add_control( 'dpn_postmain_banners-link1', array(
			'type' => 'url',
			'section' => 'dpn_postmain_banners_section', // Add a default or your own section
			'label' => __( 'Link para banner superior index' ),
			'description' => __( 'Custom link output.' ),
			'input_attrs' => array(
			'placeholder' => __( 'http://www.google.com' ),
			),
		) );
		
		function themeslug_sanitize_url1( $url ) {
			return esc_url_raw( $url );
		}

	$wp_customize->add_setting('dpn_postmain_banners-image2');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control2', array(
			'label' => 'Banner inferior index',
			'section' => 'dpn_postmain_banners_section',
			'settings' => 'dpn_postmain_banners-image2',
			'width' => 2500,
			'height' => 250
		)));

		$wp_customize->add_setting( 'dpn_postmain_banners-link2', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_url2',
		) );
		
		$wp_customize->add_control( 'dpn_postmain_banners-link2', array(
			'type' => 'url',
			'section' => 'dpn_postmain_banners_section', // Add a default or your own section
			'label' => __( 'Link para banner inferior index' ),
			'description' => __( 'Custom link output.' ),
			'input_attrs' => array(
			'placeholder' => __( 'http://www.google.com' ),
			),
		) );
		
		function themeslug_sanitize_url2( $url ) {
			return esc_url_raw( $url );
		}

	$wp_customize->add_setting('dpn_postmain_banners-image3');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control3', array(
			'label' => 'Banner superior sección',
			'section' => 'dpn_postmain_banners_section',
			'settings' => 'dpn_postmain_banners-image3',
			'width' => 2500,
			'height' => 250
		)));

		$wp_customize->add_setting( 'dpn_postmain_banners-link3', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_url3',
		) );
		
		$wp_customize->add_control( 'dpn_postmain_banners-link3', array(
			'type' => 'url',
			'section' => 'dpn_postmain_banners_section', // Add a default or your own section
			'label' => __( 'Link para banner superior sección' ),
			'description' => __( 'Custom link output.' ),
			'input_attrs' => array(
			'placeholder' => __( 'http://www.google.com' ),
			),
		) );
		
		function themeslug_sanitize_url3( $url ) {
			return esc_url_raw( $url );
		}

	$wp_customize->add_setting('dpn_postmain_banners-image4');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control4', array(
			'label' => 'Banner inferior sección',
			'section' => 'dpn_postmain_banners_section',
			'settings' => 'dpn_postmain_banners-image4',
			'width' => 2500,
			'height' => 250
		)));

		$wp_customize->add_setting( 'dpn_postmain_banners-link4', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_url4',
		) );
		
		$wp_customize->add_control( 'dpn_postmain_banners-link4', array(
			'type' => 'url',
			'section' => 'dpn_postmain_banners_section', // Add a default or your own section
			'label' => __( 'Link para banner inferior sección' ),
			'description' => __( 'Custom link output.' ),
			'input_attrs' => array(
			'placeholder' => __( 'http://www.google.com' ),
			),
		) );
		
		function themeslug_sanitize_url4( $url ) {
			return esc_url_raw( $url );
		}


	$wp_customize->add_setting('dpn_postmain_banners-image5');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control5', array(
		'label' => 'Banner primario de post',
		'section' => 'dpn_postmain_banners_section',
		'settings' => 'dpn_postmain_banners-image5',
		'width' => 150,
		'height' => 400
	)));

	$wp_customize->add_setting( 'dpn_postmain_banners-link5', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_url5',
	) );
	
	$wp_customize->add_control( 'dpn_postmain_banners-link5', array(
		'type' => 'url',
		'section' => 'dpn_postmain_banners_section', // Add a default or your own section
		'label' => __( 'Link para banner primario de post' ),
		'description' => __( 'Custom link output.' ),
		'input_attrs' => array(
		'placeholder' => __( 'http://www.google.com' ),
		),
	) );
	
	function themeslug_sanitize_url5( $url ) {
		return esc_url_raw( $url );
	}

	$wp_customize->add_setting('dpn_postmain_banners-image6');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dpn_postmain_banners-image-control6', array(
			'label' => 'Banner secundario de post',
			'section' => 'dpn_postmain_banners_section',
			'settings' => 'dpn_postmain_banners-image6',
			'width' => 150,
			'height' => 400
		)));

		$wp_customize->add_setting( 'dpn_postmain_banners-link6', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_url6',
		) );
		
		$wp_customize->add_control( 'dpn_postmain_banners-link6', array(
			'type' => 'url',
			'section' => 'dpn_postmain_banners_section', // Add a default or your own section
			'label' => __( 'Link para banner secundario de post' ),
			'description' => __( 'Custom link output.' ),
			'input_attrs' => array(
			'placeholder' => __( 'http://www.google.com' ),
			),
		) );
		
		function themeslug_sanitize_url6( $url ) {
			return esc_url_raw( $url );
		}
}

add_action('customize_register', 'dpn_postmain_banners');

//------------------------------------------------------BANNERS-----------------------------------------------------------------------

//------------------------------------------------------VIEWS-----------------------------------------------------------------------
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count vistas";
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'vistas';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' ); 


// split content at the more tag and return an array
function split_content() {

	global $more;
	$more = true;
	$content = preg_split('/<span id="more-d+"></span>/i', get_the_content('more'));
	for($c = 0, $csize = count($content); $c < $csize; $c++) {
		$content[$c] = apply_filters('the_content', $content[$c]);
	}
	return $content;

}
//------------------------------------------------------VIEWS-----------------------------------------------------------------------


