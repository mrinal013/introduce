<?php

//add_filter('deprecated_constructor_trigger_error', '__return_false');



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

//get_template_part( 'inc/metaboxes/metaboxes' );
//require_once ( get_template_directory(). "/inc/metaboxes/metaboxes.php" );

function codestar_init(){
    $options = array();
    CSFramework_Metabox::instance($options);
}
add_action("init","codestar_init",999);

include_once ( get_template_directory(). "/inc/metaboxes/metaboxes.php" );

new SectionTypes();



//get_template_part( 'inc/metaboxes/class.sectiontypes' );

// function introduce_section_types($metaboxes){
//     $metaboxes[]      = array(
//         'id'            => 'section_types',
//         'title'         => 'Section Types',
//         'post_type'     => 'section',
//         'context'       => 'side',
//         'priority'      => 'high',
//         'sections'      => array(
//
//             array(
//                 'name'      => 'introduce_section',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//
//                     array(
//                         'id'    	=> 'section_type',
//                         'type'  	=> 'radio',
//                         'options' 	=> array(
//                             'banner'   		=> 'Banner',
//                             'feature'  		=> 'Feature',
//                             'portfolio'    	=> 'Porfolio',
//                             'slider'    	=> 'Slider',
// 							'team'    	    => 'Team',
//                             'contact'    	=> 'Contact',
// 							'blog'    		=> 'Blog',
// 							'service'    	=> 'Service',
// 							'purchage'    	=> 'Purchage',
// 							'summary'   	=> 'Summary',
// 							'skil'    		=> 'Skil',
// 							'review'    	=> 'Review',
// 							'price'    	    => 'Price',
// 							'partner'    	=> 'Partner',
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//add_filter("cs_metabox_options","introduce_section_types");

// function introduce_general_settings($metaboxes){
//     $metaboxes[]      = array(
//         'id'            => 'common_settings',
//         'title'         => 'Common Settings',
//         'post_type'     => 'section',
//         'context'       => 'normal',
//         'priority'      => 'high',
//         'sections'      => array(
//
//             // begin common fields
//             array(
//                 'name'      => 'section_settings',
//                 'title'     => 'Section Settings',
//                 'icon'      => 'fa fa-briefcase',
//                 'fields'    => array(
//
//                     array(
//                         'id'        => 'section_color',
//                         'type'      => 'color_picker',
//                         'title'     => 'Background Color',
//                     ),
//                     array(
//                         'id'            => 'section_background',
//                         'type'          => 'upload',
//                         'title'         => 'Background Image',
//                         'settings'      => array(
//                             'upload_type'  => 'image',
//                             'button_title' => 'Upload',
//                             'frame_title'  => 'Select an image',
//                             'insert_title' => 'Use this image',
//                       ),
//                     ),
//                 ),
//             ),
//             array(
//                 'name'      => 'title_section',
//                 'title'     => 'Title Settings',
//                 'icon'      => 'fa fa-list-alt',
//                 'fields'    => array(
//
//                     array(
//                         'id'    => 'title',
//                         'type'  => 'text',
//                         'title' => 'Section Title'
//                     ),
//                     array(
//                         'id'    => 'subtitle',
//                         'title'=>'Section Subtitle',
//                         'type'  => 'text',
//                     ),
//                     array(
//                       'id'    => 'divider',
//                       'type'  => 'checkbox',
//                       'title' => 'Line around title',
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
// add_filter("cs_metabox_options","introduce_general_settings");
//
// function introduce_banner_settings($metaboxes) {
//     $metaboxes[] = array(
//         'id'            => 'banner_settings',
//         'title'         => 'Banner Settings',
//         'post_type'     => 'section',
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'banner_section',
//                 'title'     => 'Banner Section Settings',
//                 'fields'    => array(
//                     array(
//                         'id'            => 'button_setting',
//                         'type'          => 'group',
//                         'title'         => 'Button',
//                         'button_title'  => 'Add New',
//                         'fields'        => array(
//                             array(
//                                 'id'            => 'button_title',
//                                 'type'          => 'text',
//                                 'title'         => 'Button Title',
//                             ),
//                             array(
//                                 'id'            => 'button_url',
//                                 'type'          => 'text',
//                                 'title'         => 'Button URL',
//                             ),
//                             // array(
//                             //     'id'            => 'button_color',
//                             //     'type'          => 'color_picker',
//                             //     'title'         => 'Button color',
//                             //     'default'       => '#ffbc00',
//                             // ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
//
// function introduce_feature_settings($metaboxes){
//     $metaboxes[]      = array(
//         'id'            => 'feature_settings',
//         'title'         => 'Feature Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'feature_section',
//                 'title'     => 'Feature Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//                     array(
//                         'id'            => 'feature_logo',
//                         'type'          => 'upload',
//                         'title'         => 'Feature Logo',
//                         'settings'      => array(
//                             'upload_type'  => 'image',
//                             'button_title' => 'Upload',
//                             'frame_title'  => 'Select an image',
//                             'insert_title' => 'Use this image',
//                         ),
//                     ),
//
//                     array(
//                         'id'              => 'feature_items',
//                         'type'            => 'group',
//                         'title'           => 'Feature',
//                         'button_title'    => 'Add New',
//                         'accordion_title' => 'Add New Field',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'feature_title',
//                                 'type'  => 'text',
//                                 'title' => 'Title',
//                             ),
//
//                             array(
//                                 'id'    => 'feature_icon',
//                                 'type'  => 'icon',
//                                 'title' => 'Icon',
//                             ),
//
//                             array(
//                                 'id'    => 'feature_description',
//                                 'type'  => 'textarea',
//                                 'title' => 'Description',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_portfolio_settings($metaboxes){
//     //$metaboxes[]      = array();
//     return $metaboxes;
// }
//
// //register_taxonomy_for_object_type( 'post_tag', 'portfolio' );
// //register_taxonomy('post_tag', 'portfolio');
//
// function introduce_purchage_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'purchage_settings',
//         'title'         => 'Purchage Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'purchage_section',
//                 'title'     => 'Purchage Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//
//                     array(
//                         'id'              => 'purchage_items',
//                         'type'            => 'group',
//                         'title'           => 'Key Feature',
//                         'button_title'    => 'Add New',
//                         'accordion_title' => 'Add New Field',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'purchage_button_title',
//                                 'type'  => 'text',
//                                 'title' => 'Title',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_summary_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'summary_settings',
//         'title'         => 'Summary Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'summary_section',
//                 'title'     => 'Summary Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//
//                     array(
//                         'id'              => 'summary_items',
//                         'type'            => 'group',
//                         'title'           => 'Summary Item',
//                         'button_title'    => 'Add New',
//                         'accordion_title' => 'Add New Field',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'summary_icon',
//                                 'type'  => 'icon',
//                                 'title' => 'Icon',
//                             ),
//                             array(
//                                 'id'    => 'summary_count',
//                                 'type'  => 'text',
//                                 'title' => 'Count',
//                             ),
//                             array(
//                                 'id'    => 'summary_item',
//                                 'type'  => 'text',
//                                 'title' => 'Item',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_partner_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'partner_settings',
//         'title'         => 'Partner Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'partner_section',
//                 'title'     => 'Partner Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//
//                     array(
//                         'id'              => 'partner_items',
//                         'type'            => 'group',
//                         'title'           => 'Partner',
//                         'button_title'    => 'Add New',
//                         'accordion_title' => 'Add New Field',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'partner_name',
//                                 'type'  => 'text',
//                                 'title' => 'Name',
//                             ),
//                             array(
//                                 'id'    => 'partner_logo',
//                                 'type'  => 'upload',
//                                 'title' => 'Logo',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_skil_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'skil_settings',
//         'title'         => 'Skil Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'skil_section',
//                 'title'     => 'Skil Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//                     array(
//                         'id'    => 'skil_description',
//                         'type'  => 'textarea',
//                         'title' => 'Description',
//                     ),
//                     array(
//                         'id'    => 'skil_items_title',
//                         'type'  => 'text',
//                         'title' => 'Skil Item Title',
//                     ),
//
//                     array(
//                         'id'              => 'skil_items',
//                         'type'            => 'group',
//                         'title'           => 'Skil',
//                         'button_title'    => 'Add New',
//                         'accordion_title' => 'Add New Field',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'skil_name',
//                                 'type'  => 'text',
//                                 'title' => 'Name',
//                             ),
//                             array(
//                                 'id'    => 'skil_estimate',
//                                 'type'  => 'text',
//                                 'title' => 'Percentage',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_review_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'review_settings',
//         'title'         => 'Review Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'review_section',
//                 'title'     => 'Review Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//
//                     array(
//                         'id'              => 'review_items',
//                         'type'            => 'group',
//                         'title'           => 'Client Review',
//                         'button_title'    => 'Add New Review',
//                         'accordion_title' => 'Add New Review',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'client_name',
//                                 'type'  => 'text',
//                                 'title' => 'Name',
//                             ),
//                             array(
//                                 'id'    => 'client_position',
//                                 'type'  => 'text',
//                                 'title' => 'Position',
//                             ),
//                             array(
//                                 'id'            => 'client_image',
//                                 'type'          => 'upload',
//                                 'title'         => 'Client Image',
//                                 'settings'      => array(
//                                     'upload_type'  => 'image',
//                                     'button_title' => 'Upload',
//                                     'frame_title'  => 'Select an image',
//                                     'insert_title' => 'Use this image',
//                                 ),
//                             ),
//                             array(
//                                 'id'    => 'client_review',
//                                 'type'  => 'textarea',
//                                 'title' => 'Review',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_team_settings($metaboxes) {
//     $metaboxes[]      = array(
//         'id'            => 'team_settings',
//         'title'         => 'Team Settings',
//         'post_type'     => 'section', // or post or CPT
//         'context'       => 'normal',
//         'priority'      => 'default',
//         'sections'      => array(
//
//             // begin section
//             array(
//                 'name'      => 'team_section',
//                 'title'     => 'Team Section Settings',
//                 'icon'      => 'fa fa-wifi',
//                 'fields'    => array(
//                     array(
//                         'id'              => 'team_items',
//                         'type'            => 'group',
//                         'title'           => 'Team Member',
//                         'button_title'    => 'Add New Member',
//                         'accordion_title' => 'Add New Member',
//                         'fields'          => array(
//                             array(
//                                 'id'    => 'team_member_name',
//                                 'type'  => 'text',
//                                 'title' => 'Name',
//                             ),
//                             array(
//                                 'id'    => 'team_member_position',
//                                 'type'  => 'text',
//                                 'title' => 'Position',
//                             ),
//                             array(
//                                 'id'            => 'team_member_image',
//                                 'type'          => 'upload',
//                                 'title'         => 'Team Member Image',
//                                 'settings'      => array(
//                                     'upload_type'  => 'image',
//                                     'button_title' => 'Upload',
//                                     'frame_title'  => 'Select an image',
//                                     'insert_title' => 'Use this image',
//                                 ),
//                             ),
//                             array(
//                                 'id'        => 'team_member_facebook',
//                                 'type'      => 'text',
//                                 'title'     => 'Facebook Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                             array(
//                                 'id'        => 'team_member_twitter',
//                                 'type'      => 'text',
//                                 'title'     => 'Twitter Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                             array(
//                                 'id'        => 'team_member_google_plus',
//                                 'type'      => 'text',
//                                 'title'     => 'Google Plus Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                             array(
//                                 'id'        => 'team_member_dribble',
//                                 'type'      => 'text',
//                                 'title'     => 'Dribble Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                             array(
//                                 'id'        => 'team_member_pinterest',
//                                 'type'      => 'text',
//                                 'title'     => 'Pinterest Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                             array(
//                                 'id'        => 'team_member_git',
//                                 'type'      => 'text',
//                                 'title'     => 'Git Link',
//                                 'icon'      => 'fa fa-wifi',
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     );
//     return $metaboxes;
// }
//
// function introduce_service_settings($metaboxes) {
//     return $metaboxes;
// }
//
// function introduce_blog_settings($metaboxes) {
//     return $metaboxes;
// }




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
