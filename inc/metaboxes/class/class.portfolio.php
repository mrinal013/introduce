<?php

class Portfolio {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_portfolio_settings" ) );
    }

    function introduce_portfolio_settings($metaboxes){
        //$metaboxes[]      = array();
        return $metaboxes;
    }

}
