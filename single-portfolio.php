<?php
global $wp_query;

// This set_404() call ensures the correct class is added to
// the body tag without which the error page wouldn't look quite right.
$wp_query->set_404 ();

header('HTML/1.1 404 Not Found', true, 404);
header('Status: 404 Not Found');
include(get_template_directory () . '/404.php');
