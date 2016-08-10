<?php

class Banner {
    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_banner_settings" ) );
    }

    function introduce_banner_settings($metaboxes) {
        $metaboxes[] = array(
            'id'            => 'banner_settings',
            'title'         => 'Banner Settings',
            'post_type'     => 'section',
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'banner_section',
                    'title'     => 'Banner Section Settings',
                    'fields'    => array(
                        array(
                            'id'            => 'button_setting',
                            'type'          => 'group',
                            'title'         => 'Button',
                            'button_title'  => 'Add New',
                            'fields'        => array(
                                array(
                                    'id'            => 'button_title',
                                    'type'          => 'text',
                                    'title'         => 'Button Title',
                                ),
                                array(
                                    'id'            => 'button_url',
                                    'type'          => 'text',
                                    'title'         => 'Button URL',
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
