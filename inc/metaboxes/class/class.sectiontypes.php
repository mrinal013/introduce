<?php

/*
* SectionTypes class
*/

class SectionTypes {

    public function __construct() {
        add_filter("cs_metabox_options", array( $this, "introduce_section_types" ) );
    }

    public function introduce_section_types($metaboxes){
        $metaboxes[]      = array(
            'id'            => 'section_types',
            'title'         => 'Section Types',
            'post_type'     => 'section',
            'context'       => 'side',
            'priority'      => 'high',
            'sections'      => array(

                array(
                    'name'      => 'introduce_section',
                    'icon'      => 'fa fa-wifi',
                    'fields'    => array(

                        array(
                            'id'    	=> 'section_type',
                            'type'  	=> 'radio',
                            'options' 	=> array(
                                'banner'   		=> 'Banner',
                                'feature'  		=> 'Feature',
                                'portfolio'    	=> 'Porfolio',
                                'slider'    	=> 'Slider',
    							'team'    	    => 'Team',
                                'contact'    	=> 'Contact',
    							'blog'    		=> 'Blog',
    							'service'    	=> 'Service',
    							'purchage'    	=> 'Purchage',
    							'summary'   	=> 'Summary',
    							'skil'    		=> 'Skil',
    							'review'    	=> 'Review',
    							'price'    	    => 'Price',
    							'partner'    	=> 'Partner',
                            ),
                        ),
                    ),
                ),
            ),
        );
        return $metaboxes;
    }
}
