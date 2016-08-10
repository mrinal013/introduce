<?php

class Summary {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_summary_settings" ) );
    }

    function introduce_summary_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'summary_settings',
            'title'         => 'Summary Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'summary_section',
                    'title'     => 'Summary Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(

                        array(
                            'id'              => 'summary_items',
                            'type'            => 'group',
                            'title'           => 'Summary Item',
                            'button_title'    => 'Add New',
                            'accordion_title' => 'Add New Field',
                            'fields'          => array(
                                array(
                                    'id'    => 'summary_icon',
                                    'type'  => 'icon',
                                    'title' => 'Icon',
                                ),
                                array(
                                    'id'    => 'summary_count',
                                    'type'  => 'text',
                                    'title' => 'Count',
                                ),
                                array(
                                    'id'    => 'summary_item',
                                    'type'  => 'text',
                                    'title' => 'Item',
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
