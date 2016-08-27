<?php
$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);
//echo $section;
$general_data = get_post_meta( $section, "common_settings", true );
$purchage_data  = get_post_meta( $section, "purchage_settings", true );
$section_background = $general_data['section_background'];
// echo "<pre>";
// print_r($general_data);
// echo "</pre>";

$p_buttons = $purchage_data['purchage_items'];
?>

<section id="<?php echo $section_id; ?>" class="purchage" style="background-image: url(<?php echo $section_background; ?>)">
    <div class="container">
        <div class="row">
            <p class="title"><?php echo $general_data['title']; ?></p>
            <p class="subtitle"><?php echo $general_data['subtitle']; ?></p>
            <?php foreach( $p_buttons as $p_button ) : ?>
            <a href="#" class="btn btn-primary btn-lg"><?php echo $p_button['purchage_button_title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
