<?php

class Partner {

    function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_partner_settings" ) );
    }

    function introduce_partner_settings($metaboxes) {
        $metaboxes[]      = array(
            'id'            => 'partner_settings',
            'title'         => 'Partner Settings',
            'post_type'     => 'section', // or post or CPT
            'context'       => 'normal',
            'priority'      => 'default',
            'sections'      => array(

                // begin section
                array(
                    'name'      => 'partner_section',
                    'title'     => 'Partner Section Settings',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(

                        array(
                            'id'              => 'partner_items',
                            'type'            => 'group',
                            'title'           => 'Partner',
                            'button_title'    => 'Add New',
                            'accordion_title' => 'Add New Field',
                            'fields'          => array(
                                array(
                                    'id'    => 'partner_name',
                                    'type'  => 'text',
                                    'title' => 'Name',
                                ),
                                array(
                                    'id'    => 'partner_logo',
                                    'type'  => 'upload',
                                    'title' => 'Logo',
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
