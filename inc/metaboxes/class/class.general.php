<?php

// General class
class General {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_general_settings" ) );
    }

    function introduce_general_settings($metaboxes){
        $metaboxes[]      = array(
            'id'            => 'common_settings',
            'title'         => 'Common Settings',
            'post_type'     => 'section',
            'context'       => 'normal',
            'priority'      => 'high',
            'sections'      => array(

                // begin common fields
                array(
                    'name'      => 'section_settings',
                    'title'     => 'Section Settings',
                    'icon'      => 'fa fa-briefcase',
                    'fields'    => array(

                        array(
                            'id'        => 'section_color',
                            'type'      => 'color_picker',
                            'title'     => 'Background Color',
                        ),
                        array(
                            'id'            => 'section_background',
                            'type'          => 'upload',
                            'title'         => 'Background Image',
                            'settings'      => array(
                                'upload_type'  => 'image',
                                'button_title' => 'Upload',
                                'frame_title'  => 'Select an image',
                                'insert_title' => 'Use this image',
                          ),
                        ),
                    ),
                ),
                array(
                    'name'      => 'title_section',
                    'title'     => 'Title Settings',
                    'icon'      => 'fa fa-list-alt',
                    'fields'    => array(

                        array(
                            'id'    => 'title',
                            'type'  => 'text',
                            'title' => 'Section Title'
                        ),
                        array(
                            'id'    => 'subtitle',
                            'title'=>'Section Subtitle',
                            'type'  => 'text',
                        ),
                        array(
                          'id'    => 'divider',
                          'type'  => 'checkbox',
                          'title' => 'Line around title',
                        ),
                    ),
                ),
            ),
        );
        return $metaboxes;
    }

}
