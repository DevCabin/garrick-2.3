<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Garrick
 */

get_header(); 

while ( have_posts() ) : the_post();

$default_img_path = get_template_directory_uri() . "/inc/img/about-bg.jpg";
if(ot_get_option( 'main_hero_image' ) !="") {
    $default_img_path = ot_get_option( 'main_hero_image' );
    // if set up, use the home page hero image
}
// else use the flash
$img_path = $default_img_path;

if ( has_post_thumbnail() ) {
    // and if there is a "post thumb" for the page, use it.
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'page-headers', true);
    $thumb_url = $thumb_url_array[0];
    $img_path = $thumb_url;
}
?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->

    <header class="intro-header" style="background-image: url('<?php echo $img_path; ?>')">
        <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">

                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        <hr class="small">

                        <!--span class="subheading">This is what I do.</span-->

                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <?php the_content(); ?>

		<?php if ( comments_open() || get_comments_number() ) :

				comments_template();

			endif;
		?>

            </div>
        </div>
    </div>
<?php
endwhile; // End of the loop.
get_footer();