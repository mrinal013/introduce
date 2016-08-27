<?php
$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$skil_data  = get_post_meta( $section, "skil_settings", true );

// echo "<pre>";
// print_r($general_data);
// echo "</pre>";

$title = $general_data['title'];
$subtitle = $general_data['subtitle'];
$color = $general_data['section_color'];
$background = $general_data['section_background'];

$skil_description = $skil_data['skil_description'];
$skil_items_title = $skil_data['skil_items_title'];
$skil_items = $skil_data['skil_items'];


?>
<section id="<?php echo $section_id; ?>" class="skil" style="background-color:<?php echo $color; ?>; background-image: url(<?php echo $background; ?>); ">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title"><?php echo $title; ?></h2>
                        <p class="subtitle"><?php echo $subtitle; ?></p>
                        <p class="desc"><?php echo $skil_description; ?></p>

                    </div>
                </div>
                    <p class="skil-title"><?php echo $skil_items_title; ?></p>
                <?php foreach( $skil_items as $skil_item ) :
                        $name = $skil_item['skil_name'];
                        $percentage = $skil_item['skil_estimate'];
                    ?>
                    <div class="col-md-12">
                        <span class="name"><?php echo $name; ?></span>
                        <span class="percent pull-right"><?php echo $percentage . '%'; ?></span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percentage; ?>"
                          aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage . '%'; ?>">
                                <span class="sr-only"><?php echo $percentage . '%'; ?> Complete</span>
                            </div>
                        </div>
                    </div>
                <?php  endforeach; ?>
                </div>

            </div>
        </div>
</section>
