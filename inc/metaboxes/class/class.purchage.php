<?php

class Purchage {
    
    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_purchage_settings" ) );
    }

    function introduce_purchage_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'purchage_settings',
            'title'         => 'Purchage Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'purchage_section',
                    'title'     => 'Purchage Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(

                        array(
                            'id'              => 'purchage_items',
                            'type'            => 'group',
                            'title'           => 'Key Feature',
                            'button_title'    => 'Add New',
                            'accordion_title' => 'Add New Field',
                            'fields'          => array(
                                array(
                                    'id'    => 'purchage_button_title',
                                    'type'  => 'text',
                                    'title' => 'Title',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );
        return $metaboxes;
    }
}
