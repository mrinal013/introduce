<?php
/**
 * introduce Theme Customizer.
 *
 * @package introduce
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function introduce_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'introduce_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function introduce_customize_preview_js() {
	wp_enqueue_script( 'introduce_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'introduce_customize_preview_js' );

add_action( 'customize_register', 'introduce_theme_customizer' );
// dynamic text and background-color with customizer
function introduce_theme_customizer( $wp_customize ) {
	/*
	* Header Settings
	*/
	$wp_customize->add_section( 'introduce_header_section', array(
		'title'			=> __( 'Header', 'introduce' ),
		'priority'    => 10,
	));

	$wp_customize->add_setting( 'introduce_header_logo_setting', array(
		'default'		=> '',
		//'transport'		=> 'postMessage',
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'introduce_header_logo_setting',
			array(
				'label'		=> __( 'Header Logo', 'introduce' ),
				'section'	=> 'introduce_header_section',
			)
		)
	);

	$wp_customize->add_setting( 'introduce_header_title_setting', array(
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'introduce_header_title_setting', array(
	    'label'    => __( 'Header Title', 'introduce' ),
	    'section'  => 'introduce_header_section',
	) );

	/*
	* Footer section
	*/
	$wp_customize->add_section( 'introduce_footer_section' , array(
	    'title'       => __( 'Footer', 'introduce' ),
	    'priority'    => 30,
	    //'description' => __( 'Footer Settings', 'introduce' ),
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

// remove default customizer settings
add_action( 'customize_register', 'introduce_remove_default_customizer');

function introduce_remove_default_customizer( $wp_customize ) {

	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('header_image');

}
