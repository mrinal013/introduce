<?php

$section = get_the_ID();

$general_data = get_post_meta( $section, "common_settings", true );
$review_data  = get_post_meta( $section, "review_settings", true );


//border-center
$title = $general_data['title'];
$subtitle = $general_data['subtitle'];

//echo $title;

// WP_Query arguments
$args = array (
	'post_type'     => array( 'service' ),
    'post_status'   => 'publish',
    'posts_per_page'=> -1,
);

// The Query
$services = new WP_Query( $args );

// // The Loop
// if ( $services->have_posts() ) {
// 	while ( $services->have_posts() ) {
// 		$services->the_post();
// 		echo get_the_title();
// 	}
// 	/* Restore original Post Data */
// 	wp_reset_postdata();
// } else {
// 	// no posts found
// }
?>
<section id="service">
    <div class="container">
        <div class="row">
            <p class="title"><?php echo $title; ?></p>
            <p class="subtitle"><?php echo $subtitle; ?></p>
            <?php
            if( $services->have_posts() ) :
                while( $services->have_posts() ) : $services->the_post();
            ?>
            <div class="col-xs-4">
                <!-- <img class="img-responsive" src="img/blog-1.jpg" alt="" /> -->
                <?php the_post_thumbnail('medium'); ?>
                <p class="service-title"><?php the_title(); ?></p>
                <p class="service-excerpt"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-lg">read more</a>
            </div>
        <?php endwhile; endif; ?>
        </div>
    </div>

</section>
