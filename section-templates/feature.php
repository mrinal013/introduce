<?php
$section = get_the_ID();
$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$title = $general_data['title'];
$subtitle = $general_data['subtitle'];
$section_background_image = $general_data['section_background_image'];
$section_background_color = $general_data['section_background_color'];

$feature_data  = get_post_meta( $section, "feature_settings", true );
$feature_logo = $feature_data['feature_logo'];
$features = $feature_data['feature_items'];
?>
<section id="<?php echo $section_id; ?>" class="feature" style="background-image: url(<?php echo $section_background_image; ?>); background-color: <?php echo $section_background_color; ?> ">
    <div class="container-fluid">
        <img src="<?php echo $feature_logo; ?>" alt="feature-logo" class="img-circle" />
        <h1><?php echo $title; ?></h1>
        <p class="subtitle"><?php echo $subtitle; ?></p>
        <div class="row">
            <?php
            foreach( $features as $feature ) {
                $feature_title = $feature['feature_title'];
                $feature_icon = $feature['feature_icon'];
                $feature_description = $feature['feature_description'];
                ?>
                <div class="featured-item col-md-3 col-xs-6">
                    <span class="icon fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="<?php echo $feature_icon . " "; ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h2><?php echo $feature_title; ?></h2>
                    <p><?php echo $feature_description; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
