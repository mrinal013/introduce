<?php

class Review {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_review_settings" ) );
    }

    function introduce_review_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'review_settings',
            'title'         => 'Review Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'review_section',
                    'title'     => 'Review Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(

                        array(
                            'id'              => 'review_items',
                            'type'            => 'group',
                            'title'           => 'Client Review',
                            'button_title'    => 'Add New Review',
                            'accordion_title' => 'Add New Review',
                            'fields'          => array(
                                array(
                                    'id'    => 'client_name',
                                    'type'  => 'text',
                                    'title' => 'Name',
                                ),
                                array(
                                    'id'    => 'client_position',
                                    'type'  => 'text',
                                    'title' => 'Position',
                                ),
                                array(
                                    'id'            => 'client_image',
                                    'type'          => 'upload',
                                    'title'         => 'Client Image',
                                    'settings'      => array(
                                        'upload_type'  => 'image',
                                        'button_title' => 'Upload',
                                        'frame_title'  => 'Select an image',
                                        'insert_title' => 'Use this image',
                                    ),
                                ),
                                array(
                                    'id'    => 'client_review',
                                    'type'  => 'textarea',
                                    'title' => 'Review',
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
