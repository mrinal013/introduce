<?php
$section = get_the_ID();
//echo $section;
$general_data = get_post_meta( $section, "common_settings", true );
$banner_data  = get_post_meta( $section, "banner_settings", true );

// echo "<pre>";
// print_r($general_data);
// //print_r($banner_data['button_setting']);
// echo "</pre>";

$title = $general_data['title'];
$subtitle = $general_data['subtitle'];
$section_background = $general_data['section_background'];

$button_setting = $banner_data['button_setting'];


?>
<section id="welcome" class="jumbotron" style="background-image: url(<?php echo $section_background; ?>)">
    <div class="container" >
        <div class="welcome-message">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $subtitle; ?></p>
            <?php

            foreach($button_setting as $button ) { ?>
                <a href="<?php echo $button['button_url']; ?>" class="btn btn-lg btn-primary"><?php echo $button['button_title']; ?></a>
            <?php } ?>

        </div>
    </div>
</section>
