<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Garrick
 */

if ( function_exists( 'ot_get_option' ) ) {
    $main_hero_image = ot_get_option( 'main_hero_image' );
    $hero_area_headline = ot_get_option( 'hero_area_headline' );
    $hero_area_sub_title = ot_get_option( 'hero_area_sub_title' );

    $bg_url = get_template_directory_uri() . "/inc/img/about-bg.jpg";
    $front_page_title = get_bloginfo( 'name' );
    $front_page_sub_title = get_bloginfo( 'description' );

    if($main_hero_image != ""){
        $bg_url = $main_hero_image;
    } 
    if($hero_area_headline != ""){
        $front_page_title = $hero_area_headline;
    } 
    if($hero_area_sub_title != ""){
        $front_page_sub_title = $hero_area_sub_title;
    } 

}
get_header(); ?>
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo $bg_url;?>')">
    
        <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>
                            <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                        </h1>
                        <h2 class="subheading">
                            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                        </h2>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

		<?php
		if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

            </div>
        </div>
    </div>

<?php
// get_sidebar();
get_footer();
