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

//$button_setting = $banner_data['button_setting'];

// echo "<pre>";
// print_r($button_setting);
// echo "</pre>";
?>
<!-- <section id="welcome" class="jumbotron">
    <div class="container">
        <div class="welcome-message">
            <h1>Transform your thinking</h1>
            <p>Quick Install and easy to use.</p>
            <a href="#" class="btn btn-lg btn-primary">Get Theme Now</a>
        </div>
    </div>
</section> -->
<h1>Hello</h1>
