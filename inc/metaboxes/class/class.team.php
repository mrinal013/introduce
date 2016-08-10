<?php

class Team {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_team_settings" ) );
    }

    function introduce_team_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'team_settings',
            'title'         => 'Team Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'team_section',
                    'title'     => 'Team Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(
                        array(
                            'id'              => 'team_items',
                            'type'            => 'group',
                            'title'           => 'Team Member',
                            'button_title'    => 'Add New Member',
                            'accordion_title' => 'Add New Member',
                            'fields'          => array(
                                array(
                                    'id'    => 'team_member_name',
                                    'type'  => 'text',
                                    'title' => 'Name',
                                ),
                                array(
                                    'id'    => 'team_member_position',
                                    'type'  => 'text',
                                    'title' => 'Position',
                                ),
                                array(
                                    'id'            => 'team_member_image',
                                    'type'          => 'upload',
                                    'title'         => 'Team Member Image',
                                    'settings'      => array(
                                        'upload_type'  => 'image',
                                        'button_title' => 'Upload',
                                        'frame_title'  => 'Select an image',
                                        'insert_title' => 'Use this image',
                                    ),
                                ),
                                array(
                                    'id'        => 'team_member_facebook',
                                    'type'      => 'text',
                                    'title'     => 'Facebook Link',
                                    'icon'      => 'fa fa-wifi',
                                ),
                                array(
                                    'id'        => 'team_member_twitter',
                                    'type'      => 'text',
                                    'title'     => 'Twitter Link',
                                    'icon'      => 'fa fa-wifi',
                                ),
                                array(
                                    'id'        => 'team_member_google_plus',
                                    'type'      => 'text',
                                    'title'     => 'Google Plus Link',
                                    'icon'      => 'fa fa-wifi',
                                ),
                                array(
                                    'id'        => 'team_member_dribble',
                                    'type'      => 'text',
                                    'title'     => 'Dribble Link',
                                    'icon'      => 'fa fa-wifi',
                                ),
                                array(
                                    'id'        => 'team_member_pinterest',
                                    'type'      => 'text',
                                    'title'     => 'Pinterest Link',
                                    'icon'      => 'fa fa-wifi',
                                ),
                                array(
                                    'id'        => 'team_member_git',
                                    'type'      => 'text',
                                    'title'     => 'Git Link',
                                    'icon'      => 'fa fa-wifi',
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
