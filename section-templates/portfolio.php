<?php
$section = get_the_ID();
$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$title = $general_data['title'];
$subtitle = $general_data['subtitle'];
$section_background_image = $general_data['section_background_image'];
$section_background_color = $general_data['section_background_color'];

$portfolio_data  = get_post_meta( $section, "portfolio_settings", true );

$types = array();

$args = array(
    'post_type'     => 'portfolio',
);
$portfolies = new WP_Query($args);

if( $portfolies->have_posts() ) :
    while( $portfolies->have_posts() ) :
        $portfolies->the_post();
        $tags = wp_get_object_terms( get_the_ID(), 'portfoio_type' );
        foreach( $tags as $tag ) {
            if( !in_array( $tag->name, $types ) )
            $types[] = $tag->name;
        }
        echo "<br/>";
    endwhile;
endif;
?>

<section id="<?php echo $section_id; ?>" class="portfolio" style="background-image: url(<?php echo $section_background_image; ?>); background-color: <?php echo $section_background_color; ?>">
    <p class="title"><?php echo $title; ?></p>
    <p class="subtitle"><?php echo $subtitle; ?></p>
    <div id="filters" class="button-group">
        <button class="button is-checked" data-filter="*">All</button>
        <?php
        foreach( $types as $type ) { ?>
            <button class="button" data-filter=".<?php echo $type; ?>"><?php echo $type; ?></button>
        <?php }
        ?>
    </div>

    <div class="grid">
        <?php
        if( $portfolies->have_posts() ) :
            while( $portfolies->have_posts() ) :
                $portfolies->the_post();
                $tags = wp_get_object_terms( get_the_ID(), 'portfoio_type' );
                $posttags = array();
                foreach( $tags as $tag ) {
                    $posttags[] = $tag->name;
                }
                implode( $posttags, ' ' );
                echo "<br/>"; ?>
                <div class="col-sm-3 col-xs-6 element-item <?php echo implode( $posttags, ' ' ); ?>">
                    <div class="image">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="Blog Post" />
                        <div class="overlay">
                            <a class="colorbox" href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                            <a class="colorbox" href="" title="<?php the_title(); ?>"></a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif;
        ?>
    </div>
</section>
