<?php
/**
 * Template Name: Page Builder Ready
 *
 * @package Garrick
 */

get_header(); 
while ( have_posts() ) : the_post();
?>
    <!-- Main Content -->
    <div class="main-content-pagebuilder">

                <?php the_content(); ?>

		<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif; ?>

    </div>
<style>
.navbar-fixed-top a {
text-shadow: #333 1px 1px;
} 
</style>
<?php
endwhile; // End of the loop.
get_footer();