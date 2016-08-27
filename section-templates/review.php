<?php
$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$review_data  = get_post_meta( $section, "review_settings", true );


//border-center
$title = $general_data['title'];
$subtitle = $general_data['subtitle'];

if( isset($review_data['review_items']) ) {
    $review_items = $review_data['review_items'];
}

// echo "<pre>";
// print_r($review_items);
// echo "</pre>";

?>
<section id="<?php echo $section_id; ?>" class="review">
    <div class="container">
        <div class="title"><?php echo $title; ?></div>
        <div class="subtitle"><?php echo $subtitle; ?></div>
        <div class="row">
            <?php foreach( $review_items as $review_item ) : ?>
            <div class="col-sm-4 col-xs-6">
                <img class="img-circle" src="<?php echo $review_item['client_image']; ?>" alt="<?php echo $review_item['client_name']; ?>" />
                <div class="bubble">
                    <p><?php echo $review_item['client_review']; ?></p>
                    <span class="name"><?php echo $review_item['client_name']; ?></span>
                    <span class="position"><?php echo $review_item['client_position']; ?></span>
                </div>
            </div>
        <?php endforeach;  ?>
        </div>
    </div>
</section>
