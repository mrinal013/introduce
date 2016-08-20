<?php



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

/**
 * Registers an editor stylesheet for the current theme.
 */
add_action( 'after_setup_theme', 'wpdocs_theme_add_editor_styles' );
function wpdocs_theme_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}

//add_filter('deprecated_constructor_trigger_error', '__return_false');

// JQMIGRATE: Migrate is installed, version 1.4.0 - Fix console error
// add_action( 'wp_default_scripts', function( $scripts ) {
//     if ( ! empty( $scripts->registered['jquery'] ) ) {
//         $jquery_dependencies = $scripts->registered['jquery']->deps;
//         $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
//     }
// } );
