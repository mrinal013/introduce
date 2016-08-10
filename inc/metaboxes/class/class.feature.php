<?php

class Feature {
    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_feature_settings" ) );
    }

    function introduce_feature_settings($metaboxes){
        $metaboxes[]      = array(
            'id'            => 'feature_settings',
            'title'         => 'Feature Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'feature_section',
                    'title'     => 'Feature Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(
                        array(
                            'id'            => 'feature_logo',
                            'type'          => 'upload',
                            'title'         => 'Feature Logo',
                            'settings'      => array(
                                'upload_type'  => 'image',
                                'button_title' => 'Upload',
                                'frame_title'  => 'Select an image',
                                'insert_title' => 'Use this image',
                            ),
                        ),

                        array(
                            'id'              => 'feature_items',
                            'type'            => 'group',
                            'title'           => 'Feature',
                            'button_title'    => 'Add New',
                            'accordion_title' => 'Add New Field',
                            'fields'          => array(
                                array(
                                    'id'    => 'feature_title',
                                    'type'  => 'text',
                                    'title' => 'Title',
                                ),

                                array(
                                    'id'    => 'feature_icon',
                                    'type'  => 'icon',
                                    'title' => 'Icon',
                                ),

                                array(
                                    'id'    => 'feature_description',
                                    'type'  => 'textarea',
                                    'title' => 'Description',
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
