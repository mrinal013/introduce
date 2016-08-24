<?php
/**
* Template Name: Onepage Template
*/
get_header();

// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
// This code based on wp_nav_menu's code to get Menu ID from menu slug

$menu_name = 'one_page_menu';

if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '<ul id="menu-' . $menu_name . '">';

    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
    }
    $menu_list .= '</ul>';
} else {
    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}
// $menu_list now ready to output

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
