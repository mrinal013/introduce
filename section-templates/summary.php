<?php
$section = get_the_ID();

$general_data = get_post_meta( $section, "common_settings", true );
$summary_data  = get_post_meta( $section, "summary_settings", true );

$s_items = $summary_data['summary_items'];

?>
<section id="summary">
    <div class="container">
        <div class="row">
        <?php foreach( $s_items as $items ) : ?>
            <div class="col-sm-2 col-xs-4">
                <div class="icon">
                    <i class="<?php echo $items['summary_icon']; ?>"></i>
                </div>
                <p class="count"><?php echo $items['summary_count']; ?></p>
                <p class="item"><?php echo $items['summary_item']; ?></p>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</section>
