<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Meg
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses meg_header_style()
 */
function meg_custom_header_setup() {
    
        add_theme_support( 'custom-logo', array(
	    'width' => 96,
	    'height' => 96,
	    'flex-width' => false,
	    'flex-height' => false,
	) );
        
	add_theme_support( 'custom-header', apply_filters( 'meg_custom_header_args', array(
		'default-image'          => 'url(/img/desk-front-page.jpg)',
                'default-backgroun-color' => 'e8fbfd',
		'default-text-color'     => '18AEBC',
		'width'                  => 1600,
                'height'                 => 420,
		'flex-height'            => true,
                'flex-width'             => true,
		'wp-head-callback'       => 'meg_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'meg_custom_header_setup' );

if ( ! function_exists( 'meg_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see meg_custom_header_setup().
 */
function meg_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
  
	</style>
	<?php
}
endif;
if ( ! function_exists( 'meg_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see meg_custom_header_setup().
 */
function meg_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // meg_admin_header_style

if ( ! function_exists( 'meg_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see meg_custom_header_setup().
 */
function meg_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // meg_admin_header_image

