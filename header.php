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
<?php wp_head(); ?>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="60" <?php body_class( ); ?>>

        <header>

            <!-- Top fixed navbar -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                        <a class="navbar-brand" href="<?php echo home_url(); ?>">
                            <?php
                            if( null != get_theme_mod('introduce_header_logo_setting') ) { ?>
                                <img src="<?php echo get_theme_mod('introduce_header_logo_setting'); ?>" alt="<?php bloginfo('name'); ?>" class="img-circle" />
                            <?php
                            }
                            else if( null != get_theme_mod('introduce_header_title_setting') )
                                echo get_theme_mod('introduce_header_title_setting');
                            else
                                bloginfo('name');
                            ?>
                        </a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>

                </div>

                    <?php
                    if ( is_page_template( 'homepage.php' ) ) {
                        get_search_form();
                        wp_nav_menu( array(
                            'menu'              => 'one_page_menu',
                            'theme_location'    => 'one_page_menu',
                            'depth'             => 4,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    }
                    else {
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
                    }
                    ?>
            </nav>

        </header>

	<div id="content" class="site-content">
