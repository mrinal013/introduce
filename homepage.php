<?php
/**
* Template Name: Onepage Template
*/
get_header();

$args = array(
    'post_type' => 'section',
    'orderby'   => 'menu_order',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);


$posts = $query->posts;
// echo "<pre>";
// print_r($posts);
// echo "</pre>";

if( isset( $posts ) ) :
foreach( $posts as $post ) {
    $section_type_info = get_post_meta(get_the_ID(),'section_types', true);
    $section_type = $section_type_info['section_type'];
    get_template_part("section-templates/{$section_type}");
}
endif;

get_footer();
?>
