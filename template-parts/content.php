<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package introduce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php introduce_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;

		$votes = get_post_meta($post->ID, "votes", true);
	   	$votes = ($votes == "") ? 0 : $votes; ?>
		 <p id='vote_counter'>This post has <?php echo $votes . " votes"; ?>
		</p>

		<?php
   		$nonce = wp_create_nonce( "my_user_vote_nonce" );
    	$link = admin_url( 'admin-ajax.php?action=my_user_vote&post_id='.$post->ID.'&nonce='.$nonce );
    	echo '<a class="user_vote" data-nonce="' . $nonce . '" data-post_id="' . $post->ID . '" href="' . $link . '">vote for this article</a>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  			the_post_thumbnail();
		}
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'introduce' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'introduce' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div>

	<!-- <footer class="entry-footer"> -->
		<?php //introduce_entry_footer(); ?>
	<!-- </footer> .entry-footer -->
</article><!-- #post-## -->
