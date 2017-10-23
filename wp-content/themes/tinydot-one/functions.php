<?php
/**
 * TINYDoT One.
 *
 * This file adds functions to the TINYDoT One Theme.
 *
 * @package TINYDoT One
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'tinydotone_localization_setup' );
function tinydotone_localization_setup(){
	load_child_theme_textdomain( 'tinydotone', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'TINYDoT One' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'tinydotone_enqueue_scripts_styles' );
function tinydotone_enqueue_scripts_styles() {

	wp_enqueue_style( 'tinydotone-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Cookie', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'tinydotone-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'tinydotone-responsive-menu',
		'genesis_responsive_menu',
		tinydotone_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function tinydotone_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'tinydotone' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'tinydotone' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
// Add support for custom header.
add_theme_support( 'custom-header', array(
        'flex-width'      => true, 
	'width'           => 1600,
        'flex-height'     => true,
	'height'          => 200,
	'header-selector' => '.site-title a',
	'header-text'     => false,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'tinydotone' ), 'secondary' => __( 'Footer Menu', 'tinydotone' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'tinydotone_secondary_menu_args' );
function tinydotone_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'tinydotone_author_box_gravatar' );
function tinydotone_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'tinydotone_comments_gravatar' );
function tinydotone_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}
/** Register sub widget areas */
genesis_register_sidebar( array(
	'id'				=> 'sub-widget-left',
	'name'			=> __( 'Sub Widget Left', 'child' ),
	'description'	=> __( 'This is the sub widget left section.', 'child' )
) );
genesis_register_sidebar( array(
	'id'				=> 'sub-widget-right',
	'name'			=> __( 'Sub Widget Right', 'child' ),
	'description'	=> __( 'This is the sub widget right section.', 'child' )
) );


/** Add the sub widget section */
add_action( 'genesis_before_footer', 'wpsites_sub_widget', 5 );
function wpsites_sub_widget() {
	if ( is_active_sidebar( 'sub-widget-left' ) || is_active_sidebar( 'sub-widget-right' ) ) {
		echo '<div id="sub-widget"><div class="wrap">';
		
		   genesis_widget_area( 'sub-widget-left', array(
		       'before' => '<div class="sub-widget-left">'
		   ) );
	
		   genesis_widget_area( 'sub-widget-right', array(
		       'before' => '<div class="sub-widget-right">'
		   ) );
	
		echo '</div><!-- end .wrap --></div><!-- end #sub-widget -->';	
	}
}
/*  BEGIN CUSTOM FUNCTIONS FOR TINYDoT One*/
/**
 * TINYDoT One functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TINYDoT One
 */

if ( ! function_exists( 'tinydotone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tinydotone_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TINYDoT One, use a find and replace
	 * to change 'tinydotone' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tinydotone', get_template_directory() . '/languages' );

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
        set_post_thumbnail_size( 828, 360, true);
        add_image_size( 'tinydotone-small-thumb', 300, 150, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
            'primary' => esc_html__( 'Menu', 'tinydotone' ),
            'secondary' => esc_html__( 'Footer Menu', 'tinydotone' ),
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
        /*
         * Enable support for Post Formats.
         * see https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tinydotone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
        
        /**
         * Add editor styles
         */
        add_editor_style( array ( 'inc/editor-style.css', 'fonts/custom-fonts.css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') );
}
endif;
add_action( 'after_setup_theme', 'tinydotone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tinydotone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tinydotone_content_width', 640 );
}
add_action( 'after_setup_theme', 'tinydotone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tinydotone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area', 'tinydotone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tinydotone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tinydotone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tinydotone_scripts() {
	wp_enqueue_style( 'tinydotone-style', get_stylesheet_uri() );
        
        // Add Google Fonts: Fira Sans and Merriweather
       // wp_enqueue_style( 'tinydotone-google-fonts', 'https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,700,700i|Merriweather:400,400i,700,700i' );
        wp_enqueue_style( 'tinydotone-local-fonts', get_stylesheet_directory_uri() . '/fonts/custom-fonts.css');
        
        // Add Font Awesome icons (http://fontawesome.io) 
	wp_enqueue_style( 'tinydotone-fontawesome-fonts', get_stylesheet_directory_uri() . '/fonts/font-awesome/fonts/');
        wp_enqueue_style( 'tinydotone-fontawesome-style', get_stylesheet_directory_uri() . '/fonts/font-awesome/css/font-awesome.css');
        
	wp_enqueue_script( 'tinydotone-navigation', get_template_directory_uri() . '/js/function.js', array( 'jquery' ), '20151215', true );
        wp_localize_script( 'tinydotone-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'tinydotone' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'tinydotone' ) . '</span>',
	) );

	wp_enqueue_script( 'tinydotone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tinydotone_scripts' );

function media_devices_styles() {
wp_enqueue_style( 'tinydotone', get_template_directory_uri() . '/headers.css' );
}
add_action( 'wp_enqueue_scripts', 'media_devices_styles' );


// Custom post types function
function create_custom_post_types() {
// create a featured work custom post type
    
    register_post_type('featured_work', 
        array(
            'labels' => array (
                'name' => __( 'Featured Work' ),
                'singular_name' => __( 'Project' )
                ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'featured-work'
                ),
            )
    );
    register_post_type('course_info', 
        array(
            'labels' => array (
                'name' => __( 'Course Info' ),
                'singular_name' => __( 'Benefit' )
                ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'course-info'
                ),
            )
    );
    register_post_type('social_links',
            array(
            'labels' => array (
                'name' => __( 'Social Media' ),
                'singular_name' => __( 'Network' )
                ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'social-links'
                ),
            )
    );
    register_post_type('about_section',
            array(
            'labels' => array (
                'name' => __( 'About Section' ),
                'singular_name' => __( 'Member' )
                ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'about_section'
                ),
            )
    );
}
// Hook this custompost type function into the theme
add_action( 'init', 'create_custom_post_types' );



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';
