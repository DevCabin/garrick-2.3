<?php
/**
 * Garrick functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Garrick
 */


/**
 * Required: set 'ot_theme_mode' filter to true.
 */

add_filter( 'ot_theme_mode', '__return_true' );


/**
 * Required: include OptionTree.
 */

require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */

require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

// Remove Option Tree Settings Menu

add_filter( 'ot_show_pages', '__return_false' );



if ( ! function_exists( 'garrick_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function garrick_setup() {



	/*



	 * Make theme available for translation.



	 * Translations can be filed in the /languages/ directory.



	 * If you're building a theme based on Garrick, use a find and replace



	 * to change 'garrick' to the name of your theme in all the template files.



	 */



	load_theme_textdomain( 'garrick', get_template_directory() . '/languages' );







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



		'primary' => esc_html__( 'Primary', 'garrick' ),



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

	add_theme_support( 'custom-background', apply_filters( 'garrick_custom_background_args', array(



		'default-color' => 'ffffff',



		'default-image' => '',



	) ) );


// set_post_thumbnail_size( 1900, 872, array( 'center', 'center')  ); // posts  - crop from the center

add_image_size( 'post-headers', 1900, 492, array( 'center', 'center') ); // pages - 872 pixels tall and unlimited width, crop from the center

add_image_size( 'page-headers', 1900, 492, array( 'center', 'center') ); // pages - 872 pixels tall and unlimited width, crop from the center

/* Remove Query String from Static Resources */


function remove_cssjs_ver( $src ) {

 if( strpos( $src, '?ver=' ) )

 $src = remove_query_arg( 'ver', $src );

 return $src;

}

add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );

add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

}

endif;

add_action( 'after_setup_theme', 'garrick_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */



function garrick_content_width() {



	$GLOBALS['content_width'] = apply_filters( 'garrick_content_width', 640 );



}

add_action( 'after_setup_theme', 'garrick_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function garrick_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'garrick' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'garrick' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );



}



add_action( 'widgets_init', 'garrick_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function garrick_scripts() {

	wp_enqueue_style( 'garrick-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'garrick-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'garrick-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// add_action( 'wp_enqueue_scripts', 'garrick_scripts' );
//add_action( 'wp_footer', 'garrick_scripts', 0 );

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


require get_template_directory() . '/inc/agg.php';


add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( get_bloginfo( 'name' ), 'garrick' ) . ' - ' . get_bloginfo( 'description' );
  }
  return $title;
}

// begin ACF
//https://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}
 
// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


// export
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_basic-landing-page',
		'title' => 'Basic Landing Page',
		'fields' => array (
			array (
				'key' => 'field_583112d6ae93e',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'instructions' => 'This is the background image for the main hero image. There will be a dark overlay added to the image so the text stands out, so most colors and image types should be OK. Dimensions should be 1900 x 492 pixels. Other sizes will be accepted but may not be ideal. ',
				'save_format' => 'url',
				'preview_size' => 'large',
				'library' => 'all',
			),
			array (
				'key' => 'field_58310f5affe85',
				'label' => 'Main Hero Title',
				'name' => 'main_hero_title',
				'type' => 'textarea',
				'instructions' => 'This is the biggest text at the top of the page, make it count!',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 3,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_58311076ffe86',
				'label' => 'Secondary Title',
				'name' => 'secondary_title',
				'type' => 'textarea',
				'instructions' => 'Not required, but sometimes nice to have.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_583110a6ffe87',
				'label' => 'Button Text',
				'name' => 'button_text',
				'type' => 'text',
				'instructions' => 'The CTA (call to action). Common examples are: Lean More, Sign Up, Try It now, Buy It Now, etc.',
				'default_value' => 'Learn More',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_583110f8ffe88',
				'label' => 'CTA Link',
				'name' => 'cta_link',
				'type' => 'text',
				'instructions' => 'Paste in the URL of the page or link the main CTA should take a visitor to when they click it. ',
				'default_value' => '',
				'placeholder' => '/signup-step-one/',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5831119c6aa8a',
				'label' => 'Text Below CTA',
				'name' => 'text_below_cta',
				'type' => 'wysiwyg',
				'instructions' => 'This is a good place to put a secondary offer or choice for hesitant visitors. Something like "or you can click this link to learn more about our pricing" and insert a link. ',
				'default_value' => 'Not ready to buy? Click HERE to see why we are so awesome.',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_58322e19c0cee',
				'label' => 'Page Content',
				'name' => 'page_content',
				'type' => 'wysiwyg',
				'instructions' => 'You can put anything you want to here. We recommend keeping any links to a minimum, adding "social proof" which can include testimonials, and clearly state the benefits of your offering. ',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_58322e86c0cef',
				'label' => 'Activate automatic footer CTA?',
				'name' => 'activate_automatic_footer_cta',
				'type' => 'radio',
				'instructions' => 'Choose "yes" to put another call to action in the footer using the same CTA info for the main one. 
	
	This is useful if you have a lot of content on the page, probably a good idea to leave it off if you do not have a lot of content on the page. ',
				'choices' => array (
					'Yes' => 'Yes',
					'No' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'No',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'landing-basic.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'discussion',
				2 => 'comments',
			),
		),
		'menu_order' => 0,
	));
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_business-landing',
		'title' => 'Business Landing',
		'fields' => array (
			array (
				'key' => 'field_58535ae12321b',
				'label' => 'Color Scheme',
				'name' => 'color_scheme',
				'type' => 'radio',
				'choices' => array (
					4 => 'Default (Blue)',
					1 => 'Red-Orange',
					2 => 'Light Blue',
					3 => 'Purple',
					5 => 'Orange',
					6 => 'Yellow',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 4,
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_585354baa672a',
				'label' => 'Logo Area',
				'name' => 'logo_area',
				'type' => 'radio',
				'required' => 1,
				'choices' => array (
					'sitename' => 'Site Name',
					'custom' => 'Custom Text',
					'image' => 'Custom Image',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'Site Name',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5853550b1d17e',
				'label' => 'Custom Text',
				'name' => 'custom_text',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_585354baa672a',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58535528f13f2',
				'label' => 'Custom Logo',
				'name' => 'custom_logo',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_585354baa672a',
							'operator' => '==',
							'value' => 'image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_583df30308451',
				'label' => 'Main Headline',
				'name' => 'main_headline',
				'type' => 'text',
				'default_value' => 'We Create Beautiful, Intuitive & Powerful Web Applications',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5854836d0c742',
				'label' => 'Use a CTA?',
				'name' => 'use_a_cta',
				'type' => 'true_false',
				'instructions' => 'Do you want a "click here" type button below your main header?',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5854834c0c740',
				'label' => 'CTA Text',
				'name' => 'cta_text',
				'type' => 'text',
				'instructions' => 'What should the button say? \'Learn More\', \'Click Here\', and \'Buy now\' are some good options.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5854836d0c742',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_585483570c741',
				'label' => 'CTA Link',
				'name' => 'cta_link',
				'type' => 'text',
				'instructions' => 'Where should this button take them? Paste in the url here. ',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5854836d0c742',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_585357e6f09a5',
				'label' => 'Custom Banner Image',
				'name' => 'custom_banner_image',
				'type' => 'image',
				'instructions' => 'If you leave this blank, a solid theme color will be used instead. Ideal dimensions are about 800 pixels tall by 1400 wide, experiment with the image until you are happy. ',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_583df30c08452',
				'label' => 'Services Subheading',
				'name' => 'services_subheading',
				'type' => 'text',
				'default_value' => 'We develop and market mobile application, websites and ecommerce solutions.',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58534ca4deef5',
				'label' => 'Services Content Block A',
				'name' => 'services_content_block_a',
				'type' => 'textarea',
				'instructions' => 'To change the icons, you can use anything from here: http://fontawesome.io/3.2.1/icons/',
				'default_value' => '<i class="icon-mobile-phone"></i>
	<h3>Block-A</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_58535d06f42b6',
				'label' => 'Services Content Block B',
				'name' => 'services_content_block_b',
				'type' => 'textarea',
				'default_value' => '<i class="icon-star"></i>
	<h3>Block-B</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_58535d25f42b7',
				'label' => 'Services Content Block C',
				'name' => 'services_content_block_c',
				'type' => 'textarea',
				'default_value' => '<i class="icon-thumbs-up-alt"></i>
	<h3>Block-C</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_583df403d758c',
				'label' => 'About Us Subheading',
				'name' => 'about_subheading',
				'type' => 'text',
				'default_value' => 'The most important thing to us is building products people love.',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_583df40cd758d',
				'label' => 'About Us Content',
				'name' => 'about_us_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_583df4acd758f',
				'label' => 'Contact Us Subheading',
				'name' => 'contact_us_subheading',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_583df413d758e',
				'label' => 'Contact Us Left Side',
				'name' => 'contact_us_left_side',
				'type' => 'wysiwyg',
				'instructions' => 'I suggest this free service : www.map-embed.com , embedding a map isn\'t as easy as it used to be.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_58534c3481297',
				'label' => 'Contact Us Right Side',
				'name' => 'contact_us_right_side',
				'type' => 'wysiwyg',
				'default_value' => '<h4>Our Location</h4>
	<p>123 Main Street</p>
	<hr class="grey"/>
	<h4>Email & Phone</h4>
	<p>your@email</p>
	<p>1-800-123-5432</p>
	<hr class="grey"/>
	<h4>Socialize With Us</h4>
	<div class="social">
			<a href="#fb"><i class="icon-facebook-sign"></i></a>
			<a href="#fb"><i class="icon-twitter-sign"></i></a>
			<a href="#fb"><i class="icon-google-plus-sign"></i></a>
	</div>',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'business-landing.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}


// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

function remove_acf_menu(){
    remove_menu_page( 'edit.php?post_type=acf-field-group' );
}
add_action( 'admin_menu', 'remove_acf_menu', 100 );

function remove_acf_menu2() {
	remove_menu_page('edit.php?post_type=acf');
}
add_action( 'admin_menu', 'remove_acf_menu2', 999);
