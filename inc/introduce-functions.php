<?php

//add_filter('deprecated_constructor_trigger_error', '__return_false');

// JQMIGRATE: Migrate is installed, version 1.4.0 - Fix console error
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
} );

// register Custom Navigation Walker class file for bootstrap
get_template_part( 'inc/wp_bootstrap_navwalker' );

// change excerpt box's Title and Description
add_filter( 'gettext', 'change_excerpt_title_description', 10, 2 );
function change_excerpt_title_description( $translation, $original )
{
    if ( 'Excerpt' == $original ) {
        return 'Service Summary';
    } else{
        $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
        if ($pos !== false) {
            return  'Service description summary';
        }
    }
    return $translation;
}

// change custom post type's title placeholder
add_filter( 'enter_title_here', 'section_change_title_text' );
function section_change_title_text( $title ){
     $screen = get_current_screen();
     if  ( 'section' == $screen->post_type ) {
        	$title = 'Enter section name';
     } else if( 'service' == $screen->post_type ) {
			$title = 'Enter service name';
	 } else if( 'portfolio' == $screen->post_type ) {
			$title = 'Enter portfolio name';
	 }
     return $title;
}

if ( ! function_exists( 'custom_navigation_menus' ) ) {

    // Register Navigation Menus
	add_action( 'init', 'custom_navigation_menus' );
    function custom_navigation_menus() {

    	$locations = array(
    		'blog_menu' => __( 'Menu for Blog', 'introduce' ),
            'one_page_menu' => __( 'Menu for One Page', 'introduce' ),
    	);
    	register_nav_menus( $locations );

    }
}

/**
 * Registers an editor stylesheet for the current theme.
 */
add_action( 'after_setup_theme', 'wpdocs_theme_add_editor_styles' );
function wpdocs_theme_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}

include_once ( get_template_directory(). "/codestar/cs-framework.php" );

add_action("init","codestar_init",999);
function codestar_init(){
    $options = array();
    CSFramework_Metabox::instance($options);
}

// metabox
include_once ( get_template_directory(). "/inc/metaboxes/metaboxes.php" );

//
