<?php

$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$team_data  = get_post_meta( $section, "team_settings", true );



$title = $general_data['title'];
$subtitle = $general_data['subtitle'];

// WP_Query arguments
$args = array (
	'post_type'     => array( 'post' ),
    'post_status'   => 'publish',
    'posts_per_page'=> 5,
);

// The Query
$the_query = new WP_Query( $args );
?>

<section id="<?php echo $section_id; ?>" class="blog">
    <div class="container-fluid">
        <p class="title"><?php echo $title; ?></p>
        <p class="subtitle"><?php echo $subtitle; ?></p>
        <div class="row">
        <?php
        if( $the_query->have_posts() ) :
            while( $the_query->have_posts() ) : $the_query->the_post();
        ?>
            <div class="col-sm-4 col-xs-6">
                <img class="post-feature-image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                <div class="post">
                    <p class="cat">Photography<?php //wp_list_categories(); ?></p>
                    <p class="post-title"><?php the_title(); ?></p>
                    <p class="post-excerpt"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                </div>

            </div>
        <?php endwhile; endif;
		/* Restore original Post Data */
	wp_reset_postdata(); ?>
        </div>
    </div>

</section>
