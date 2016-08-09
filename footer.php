<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package introduce
 */

?>



	<footer id="colophon" class="site-footer" role="contentinfo" style="background-color: <?php echo get_theme_mod('introduce_footer_bg'); ?>">
		<div class="container">
			<div class="brand">
				<span class="title"><?php echo esc_html( get_theme_mod('introduce_footer_title') ); ?></span>
				<span class="subtitle"><?php echo esc_html( get_theme_mod('introduce_footer_subtitle') ); ?></span>
				<p><?php echo esc_html( get_theme_mod('introduce_footer_description') ); ?></p>
				<div class="social">
				<?php if( get_theme_mod('footer_facebook') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				<?php if( get_theme_mod('footer_twitter') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				<?php if( get_theme_mod('footer_instagram') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				<?php if( get_theme_mod('footer_dribbble') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-dribbble fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				<?php if( get_theme_mod('footer_pinterest') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				<?php if( get_theme_mod('footer_git') ) : ?>
					<a href="#" class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-git fa-stack-1x fa-inverse"></i>
					</a>
				<?php endif; ?>
				</div>
			</div>
			<div class="footer_widget_area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>

			<div class="row">
				<div class="col-md-12 copyright">
					<p>&copy; <?php echo esc_html( get_theme_mod('introduce_footer_copyright') ); ?></p>
				</div>

			</div>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'introduce' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'introduce' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'introduce' ), 'introduce', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #content -->

	<!-- <footer id="secondary" class="widget-area" role="complementary">
		<?php //dynamic_sidebar( 'sidebar-2' ); ?>
	</footer> #secondary -->



	<!-- <script src="<?php //echo get_template_directory_uri() . '/js/vendor/jquery-1.12.0.min.js'; ?>"></script>
	<script src="<?php //echo get_template_directory_uri() . '/js/bootstrap.js'; ?>"></script> -->
	<!-- <script type="text/javascript" src="<?php //echo get_template_directory_uri() . '/fancybox/source/jquery.fancybox.pack.js?v=2.1.5'; ?>"></script>
	<script src="<?php //echo get_template_directory_uri() . '/js/jquery.colorbox.js'; ?>"></script>
	<script src="<?php //echo get_template_directory_uri() . '/js/isotope.pkgd.js'; ?>"></script>
	<script src="<?php //echo get_template_directory_uri() . '/js/plugins.js'; ?>"></script>
	<script src="<?php //echo get_template_directory_uri() . '/js/main.js'; ?>"></script> -->

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<!-- <script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='https://www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X','auto');ga('send','pageview');
	</script> -->
	<!-- <script src="<?php //echo get_template_directory_uri() . '/js/index.js'; ?>"></script> -->
	<?php wp_footer(); ?>
</body>
</html>
