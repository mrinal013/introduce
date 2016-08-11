<?php
$section = get_the_ID();
//echo $section;
$general_data = get_post_meta( $section, "common_settings", true );
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

<section id="portfolio">
    <p class="title">Our work</p>
    <p class="subtitle">We love our works</p>
    <div id="filters" class="button-group">
        <button class="button is-checked" data-filter="*">show all</button>
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
                            <a href="#" title="link for this project">
                                <i class="fa fa-link"></i>
                            </a>
                            <a class="colorbox" href="<?php the_post_thumbnail_url(); ?>">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif;
        ?>
    </div>
</section>
