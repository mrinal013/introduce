<?php

class Service {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_service_settings" ) );
    }

    function introduce_service_settings($metaboxes) {
        return $metaboxes;
    }

}
