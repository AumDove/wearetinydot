<?php
/**
 * Infinity Pro.
 *
 * This file adds the required CSS to the front end to the Infinity Pro Theme.
 *
 * @package Infinity
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/infinity/
 */

add_action( 'wp_enqueue_scripts', 'infinity_css' );
/**
 * Checks the settings for the link color color, accent color, and header.
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 1.0.0
 */
function infinity_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$color_accent = get_theme_mod( 'infinity_accent_color', infinity_customizer_get_default_accent_color() );

	$opts = apply_filters( 'infinity_images', array( '1', '3', '5', '7' ) );

	$settings = array();

	foreach( $opts as $opt ) {
		$settings[$opt]['image'] = preg_replace( '/^https?:/', '', get_option( $opt .'-infinity-image', sprintf( '%s/images/bg-%s.jpg', get_stylesheet_directory_uri(), $opt ) ) );
	}

	$css = '';

	foreach ( $settings as $section => $value ) {

		$background = $value['image'] ? sprintf( 'background-image: url(%s);', $value['image'] ) : '';

		if ( is_front_page() ) {
			$css .= ( ! empty( $section ) && ! empty( $background ) ) ? sprintf( '.front-page-%s { %s }', $section, $background ) : '';
		}

	}

	$css .= ( infinity_customizer_get_default_accent_color() !== $color_accent ) ? sprintf( '

		a,
		.entry-title a:focus,
		.entry-title a:hover,
		.featured-content .entry-meta a:focus,
		.featured-content .entry-meta a:hover,
		.front-page .genesis-nav-menu a:focus,
		.front-page .genesis-nav-menu a:hover,
		.front-page .offscreen-content-icon button:focus,
		.front-page .offscreen-content-icon button:hover,
		.front-page .white .genesis-nav-menu a:focus,
		.front-page .white .genesis-nav-menu a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.genesis-responsive-menu .genesis-nav-menu a:focus,
		.genesis-responsive-menu .genesis-nav-menu a:hover,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.offscreen-content button:hover,
		.offscreen-content-icon button:hover,
		.site-footer a:focus,
		.site-footer a:hover,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover {
			color: %1$s;
		}

		button,
		input[type="button"],
		input[type="reset"],
		input[type="select"],
		input[type="submit"],
		.button,
		.enews-widget input:hover[type="submit"],
		.front-page-1 a.button,
		.front-page-3 a.button,
		.front-page-5 a.button,
		.front-page-7 a.button,
		.footer-widgets .button:hover {
			background-color: %1$s;
			color: %2$s;
		}

		', $color_accent, infinity_color_contrast( $color_accent ) ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

        /**
        * Add an image inline in the site title element for the main logo
        *
        * The custom logo is then added via the Customiser
        *
        * @param string $title All the mark up title.
        * @param string $inside Mark up inside the title.
        * @param string $wrap Mark up on the title.
        * @author @_AlphaBlossom
        * @author @_neilgee
        */
       function genesischild_custom_logo( $title, $inside, $wrap ) {
            // Check to see if the Custom Logo function exists and set what goes inside the wrapping tags.
            if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
            $logo = get_custom_logo();
            else :
            $logo = get_bloginfo( 'name' );
            endif;
            // Use this wrap if no custom logo - wrap around the site name
            $inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
            // Determine which wrapping tags to use - changed is_home to is_front_page to fix Genesis bug.
            $wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
            // A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug.
            $wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
            // And finally, $wrap in h1 if HTML5 & semantic headings enabled.
            $wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
            $title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
            return $title;
           }
           add_filter( 'genesis_seo_title','genesischild_custom_logo', 10, 3 );
           /**
            * Add class for screen readers to site description.
            * This will keep the site description mark up but will not have any visual presence on the page
            * This runs if their is a header image set in the Customiser.
            *
            * @param string $attributes Add screen reader class if custom logo is set.
            *
            * @author @_neilgee
            */
            function genesischild_add_site_description_class( $attributes ) {
            if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
            $attributes['class'] .= ' screen-reader-text';
            return $attributes;
            }
            else {
            return $attributes;
            }
            }
            add_filter( 'genesis_attr_site-description', 'genesischild_add_site_description_class' );
}
