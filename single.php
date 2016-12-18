<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Garrick
 */

get_header(); 
while ( have_posts() ) : the_post(); 

$default_img_path = get_template_directory_uri() . "/inc/img/post-bg.jpg";
$img_path = $default_img_path;

if ( has_post_thumbnail() ) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'page-headers', true);
    $thumb_url = $thumb_url_array[0];

    $img_path = $thumb_url;

}

?>


    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('<?php echo $img_path; ?>')">
        <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <?php the_title( '<h1>', '</h1>' ); ?>
                        <!--h2 class="subheading">Problems look mighty small from 150 miles up</h2-->
                        <span class="meta">
                        	<?php garrick_posted_on(); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>



   <!-- Post Content -->
    <article id="primary" class="content-area">
        <div class="container main-content">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" id="main" role="main">

		
        		<?php
        			the_content( sprintf(
        				/* translators: %s: Name of current post. */
        				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'garrick' ), array( 'span' => array( 'class' => array() ) ) ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );

        			the_post_navigation();

        			// If comments are open or we have at least one comment, load up the comment template.
        			if ( comments_open() || get_comments_number() ) :
        				comments_template();
        			endif;
        		?>

        		</div>
            </div>
        </div>
    </article><!-- #primary -->

<?php
endwhile; // End of the loop.
get_footer();