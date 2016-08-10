<?php

class Blog {
    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_blog_settings" ) );
    }

    function introduce_blog_settings($metaboxes) {
        return $metaboxes;
    }
    
}
