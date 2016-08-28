<?php
$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$title = $general_data['title'];
$subtitle = $general_data['subtitle'];
$section_background_image = $general_data['section_background_image'];

$banner_data  = get_post_meta( $section, "banner_settings", true );

if( is_array( $banner_data ) || is_object( $banner_data ) ) :
    $button_setting = $banner_data['button_setting'];
endif;
?>
<section id="<?php echo $section_id; ?>" class="banner jumbotron" style="background-image: url('<?php echo $section_background_image; ?>')">
    <div class="container" >
        <div class="welcome-message shadow">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $subtitle; ?></p>
            <?php
            if( isset( $button_setting ) && ( is_array( $button_setting ) || is_object( $button_setting ) ) ) :
                foreach($button_setting as $button ) : ?>
                <a href="<?php echo $button['button_url']; ?>" class="btn btn-lg btn-primary"><?php echo $button['button_title']; ?></a>
                <?php  endforeach;
            endif; ?>
        </div>
    </div>
</section>
