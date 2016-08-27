<?php
$home = home_url();

$permalink = get_post_permalink(get_the_ID());
$section_id = basename($permalink);
$url = home_url() . "/#" . $section_id;

wp_redirect($url);
exit;
