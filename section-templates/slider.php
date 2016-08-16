<?php
$section = get_the_ID();
//echo $section;
$section_type_info = get_post_meta(get_the_ID(),'section_types', true);
$section_type = $section_type_info['section_type'];

//echo $section_type;
//echo "Hello Slider";
echo do_shortcode('[metaslider id=1771]');
