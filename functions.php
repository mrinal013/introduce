<?php
/**
 * introduce functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package introduce
 */

if ( ! function_exists( 'introduce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function introduce_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on introduce, use a find and replace
	 * to change 'introduce' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'introduce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		//'primary' => esc_html__( 'Primary', 'introduce' ),
		'blog_menu' => esc_html__( 'Menu for Blog', 'introduce' ),
		'one_page_menu' => esc_html__( 'Menu for One Page', 'introduce' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'introduce_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'introduce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function introduce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'introduce_content_width', 640 );
}
add_action( 'after_setup_theme', 'introduce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function introduce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'introduce' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'introduce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'introduce' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add footer widgets here.', 'introduce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'introduce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function introduce_scripts() {
	wp_enqueue_style( 'introduce-style', get_stylesheet_uri() );

	wp_enqueue_style( 'introduce-bootstrap-style', get_template_directory_uri() . '/style/bootstrap.css' );

	wp_enqueue_style( 'introduce-font-awesome-style', get_template_directory_uri() . '/style/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'introduce-overlay-bootstrap-style', get_template_directory_uri() . '/style/overlay-bootstrap.css' );

	wp_enqueue_style( 'introduce-fancybox-style', get_template_directory_uri() . '/style/fancybox/jquery.fancybox.css' );

	wp_enqueue_style( 'introduce-colorbox-style', get_template_directory_uri() . '/style/colorbox/colorbox.css' );

	wp_enqueue_style( 'introduce-content-style', get_template_directory_uri() . '/layouts/content-sidebar.css' );

	wp_enqueue_style( 'introduce-main-style', get_template_directory_uri() . '/style/main.css' );

	// js script enqueue
	wp_enqueue_script( 'introduce-bootstrap', get_template_directory_uri() . '/style/js/bootstrap.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-fancybox', get_template_directory_uri() . '/style/fancybox/jquery.fancybox.pack.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-fancybox', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.pack.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-colorbox', get_template_directory_uri() . '/style/js/jquery.colorbox.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-isotope', get_template_directory_uri() . '/style/js/isotope.pkgd.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-plugins', get_template_directory_uri() . '/style/js/plugins.js', array('jquery'), '', true );

	wp_enqueue_script( 'introduce-main', get_template_directory_uri() . '/style/js/main.js', array('jquery'), '', true );

	// only if front page template is homepage.php
	if( is_page_template( 'homepage.php' ) ) {
		wp_enqueue_style( 'introduce-one-page-css', get_template_directory_uri() . '/style/css/one-page.css' );
		wp_enqueue_script( 'introduce-one-page-js', get_template_directory_uri() . '/style/js/one-page.js' , array( 'jquery' ), null, true );
	}

	wp_enqueue_script( 'introduce-navigation', get_template_directory_uri() . '/style/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'introduce-skip-link-focus-fix', get_template_directory_uri() . '/style/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'introduce_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* WP Bootstrap Navwalker class include
*/
require ( get_template_directory(). "/inc/wp_bootstrap_navwalker.php" );

/**
* Introduce functions
*/
require get_template_directory() . '/inc/introduce-functions.php';

define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen

function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Attachments',

    // all post types to utilize (string|array)
    'post_type'     => array( 'portfolio' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );
