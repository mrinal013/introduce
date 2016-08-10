<?php

class Skil {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_skil_settings" ) );
    }

    function introduce_skil_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'skil_settings',
            'title'         => 'Skil Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'skil_section',
                    'title'     => 'Skil Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(
                        array(
                            'id'    => 'skil_description',
                            'type'  => 'textarea',
                            'title' => 'Description',
                        ),
                        array(
                            'id'    => 'skil_items_title',
                            'type'  => 'text',
                            'title' => 'Skil Item Title',
                        ),

                        array(
                            'id'              => 'skil_items',
                            'type'            => 'group',
                            'title'           => 'Skil',
                            'button_title'    => 'Add New',
                            'accordion_title' => 'Add New Field',
                            'fields'          => array(
                                array(
                                    'id'    => 'skil_name',
                                    'type'  => 'text',
                                    'title' => 'Name',
                                ),
                                array(
                                    'id'    => 'skil_estimate',
                                    'type'  => 'text',
                                    'title' => 'Percentage',
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
