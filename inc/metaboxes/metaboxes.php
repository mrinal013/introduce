<?php

add_action("init","codestar_init",999);
function codestar_init(){
    $options = array();
    CSFramework_Metabox::instance($options);
}


include_once get_template_directory() . '/inc/metaboxes/class/class.sectiontypes.php';

include_once get_template_directory() . '/inc/metaboxes/class/class.general.php';

// call require class from metaboxes.php
new SectionTypes();
new General();

//this section is used to establish a relationship between section type and metaboxes
add_action ("init","section_mb_filter");
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
			include_once get_template_directory() . '/inc/metaboxes/class/class.banner.php';
			new Banner();
        } else if("feature"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.feature.php';
			new Feature();
        } else if("portfolio"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.portfolio.php';
			new Portfolio();
        } else if("purchage"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.purchage.php';
			new Purchage();
        } else if("summary"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.summary.php';
			new Summary();
        } else if("partner"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.partner.php';
			new Partner();
        } else if("skil"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.skil.php';
			new Skil();
        } else if("review"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.review.php';
			new Review();
        } else if("team"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.team.php';
			new Team();
        } else if("service"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.service.php';
			new Service();
        } else if("blog"==$section_type){
			include_once get_template_directory() . '/inc/metaboxes/class/class.blog.php';
			new Blog();
        }
    }
}
