<?php

$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$partner_data  = get_post_meta( $section, "partner_settings", true );

$p_items = $partner_data['partner_items'];

$count = count($p_items);

if( $count == 1 ) {
    $col = "col-md-12";
} else if( $count == 2 ) {
    $col = "col-md-6";
} else if( $count == 3 ) {
    $col = "col-md-4";
} else if( $count == 4 ) {
    $col = "col-md-3";
} else if( $count == 5 ) {
    $col = "col-md-6";
} else if( $count == 6 ) {
    $col = "col-md-2";
} else if( $count >= 7 ) {
    $col = "col-md-1";
}

?>

<section id="<?php echo $section_id; ?>" class="partner">
    <div class="container">
        <h1><?php echo $general_data['title']; ?></h1>
        <p><?php echo $general_data['subtitle']; ?></p>
        <div class="row">
            <?php foreach( $p_items as $item ) : ?>
            <div class="<?php echo $col; ?>">
                <img src="<?php echo $item['partner_logo']; ?>" alt="<?php echo $item['partner_name']; ?>" />
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
