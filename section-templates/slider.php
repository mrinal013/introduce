<?php
$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);
//echo $section;
$section_type_info = get_post_meta(get_the_ID(),'section_types', true);
$section_type = $section_type_info['section_type'];

//echo $section_type;
//echo "Hello Slider";
echo do_shortcode('[metaslider id=1771]');
