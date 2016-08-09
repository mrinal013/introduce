<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package introduce
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/style/bootstrap.css'; ?>"> -->
        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/style/font-awesome/css/font-awesome.min.css'; ?>"> -->
        <!-- <link rel="stylesheet" href="isotope/style.css"> -->
        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/style/overlay-bootstrap.css'; ?>"> -->
        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css?v=2.1.5'; ?>" type="text/css" media="screen" /> -->
        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/style/colorbox/colorbox.css'; ?>" media="screen" title="no title"> -->
        <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/style/main.css'; ?>"> -->
        <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
        <!-- <script src="https://use.fontawesome.com/25f8a3cd3a.js"></script> -->
<?php wp_head(); ?>
    </head>
    <body <?php body_class( ); ?>>

        <!-- Add your site or application content here -->
        <header>
            <!-- Static navbar -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                </div>
                <?php get_search_form(); ?>
                


                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'blog_menu',
                            'theme_location'    => 'blog_menu',
                            'depth'             => 4,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div>
            </nav>


        </header>

	<div id="content" class="site-content">
