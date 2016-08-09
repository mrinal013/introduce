<?php

//add_filter('deprecated_constructor_trigger_error', '__return_false');

// footer settings
// dynamic text and background-color with customizer
function introduce_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'introduce_footer_section' , array(
	    'title'       => __( 'Footer', 'introduce' ),
	    'priority'    => 30,
	    'description' => __( 'Footer Settings', 'introduce' ),
	) );

	$wp_customize->add_setting( 'introduce_footer_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'introduce_footer_bg',
		array(
			'label'      => __( 'Footer Background Color', 'introduce' ),
			'section'    => 'introduce_footer_section',
		) )
	);

	$wp_customize->add_setting( 'introduce_footer_title', array(
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'introduce_footer_title', array(
	    'label'    => __( 'Footer Title', 'introduce' ),
	    'section'  => 'introduce_footer_section',
	) );

	$wp_customize->add_setting( 'introduce_footer_subtitle', array(
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'introduce_footer_subtitle', array(
	    'label'    => __( 'Footer Subtitle', 'introduce' ),
	    'section'  => 'introduce_footer_section',
	) );

	$wp_customize->add_setting( 'introduce_footer_description', array(
		'sanitize_callback' => 'esc_html',
	) );
	$wp_customize->add_control( 'introduce_footer_description', array(
	    'label'    => __( 'Footer Description', 'introduce' ),
	    'section'  => 'introduce_footer_section',
	    //'settings' => 'introduce_footer',
	) );

	$wp_customize->add_setting( 'introduce_footer_copyright', array(
		'sanitize_callback' => 'esc_html'
	) );

	$wp_customize->add_control( 'introduce_footer_copyright', array(
	    'label'    => __( 'Footer Copyright', 'introduce' ),
	    'section'  => 'introduce_footer_section',
	) );



	$wp_customize->add_setting( 'footer_facebook', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_facebook', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Facebook', 'introduce' ),
	) );

	$wp_customize->add_setting( 'footer_twitter', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_twitter', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Twitter', 'introduce' ),
	) );

	$wp_customize->add_setting( 'footer_instagram', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_instagram', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Instagram', 'introduce' ),
	) );

	$wp_customize->add_setting( 'footer_dribbble', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_dribbble', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Dribble', 'introduce' ),
	) );

	$wp_customize->add_setting( 'footer_pinterest', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_pinterest', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Pinterest', 'introduce' ),
	) );

	$wp_customize->add_setting( 'footer_git', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'footer_git', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'introduce_footer_section',
	    'label' => __( 'Git', 'introduce' ),
	) );



}
add_action( 'customize_register', 'introduce_theme_customizer' );

// JQMIGRATE: Migrate is installed, version 1.4.0 - Fix
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
} );

// Register Custom Navigation Walker
get_template_part( 'inc/wp_bootstrap_navwalker' );


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
add_filter( 'gettext', 'change_excerpt_title_description', 10, 2 );



// change custom post type's title placeholder
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
add_filter( 'enter_title_here', 'section_change_title_text' );


if ( ! function_exists( 'custom_navigation_menus' ) ) {

    // Register Navigation Menus
    function custom_navigation_menus() {

    	$locations = array(
    		'blog_menu' => __( 'Menu for Blog', 'introduce' ),
            'one_page_menu' => __( 'Menu for One Page', 'introduce' ),
    	);
    	register_nav_menus( $locations );

    }
    add_action( 'init', 'custom_navigation_menus' );
}

/**
 * Registers an editor stylesheet for the current theme.
 */
function wpdocs_theme_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'wpdocs_theme_add_editor_styles' );

include_once ( get_template_directory(). "/codestar/cs-framework.php" );
//get_template_part( 'codestar/cs-framework' );

get_template_part( 'inc/metaboxes/metaboxes' );




add_action ("init","section_mb_filter");
//this section is used to establish a relationship between section type and metaboxes
function section_mb_filter(){
    $post_id = isset($_REQUEST['post'])?$_REQUEST['post']:false;
    if(!$post_id){
        $post_id = isset($_REQUEST['post_ID'])?$_REQUEST['post_ID']:false;
    }
    if($post_id && "section" == get_post_type($post_id)){
        $section_type_info = get_post_meta($post_id,'section_types',true);
        if( isset($section_type_info) ) {
            $section_type = $section_type_info['section_type'];
        }
        $section_type = $section_type_info['section_type'];
        if("banner"==$section_type){
            add_filter("cs_metabox_options","introduce_banner_settings");
        } else if("feature"==$section_type){
            add_filter("cs_metabox_options","introduce_feature_settings");
        } else if("portfolio"==$section_type){
            add_filter("cs_metabox_options","introduce_portfolio_settings");
        } else if("purchage"==$section_type){
            add_filter("cs_metabox_options","introduce_purchage_settings");
        } else if("summary"==$section_type){
            add_filter("cs_metabox_options","introduce_summary_settings");
        } else if("partner"==$section_type){
            add_filter("cs_metabox_options","introduce_partner_settings");
        } else if("skil"==$section_type){
            add_filter("cs_metabox_options","introduce_skil_settings");
        } else if("review"==$section_type){
            add_filter("cs_metabox_options","introduce_review_settings");
        } else if("team"==$section_type){
            add_filter("cs_metabox_options","introduce_team_settings");
        } else if("service"==$section_type){
            add_filter("cs_metabox_options","introduce_service_settings");
        } else if("blog"==$section_type){
            add_filter("cs_metabox_options","introduce_blog_settings");
        }
    }
}































































































































































//
