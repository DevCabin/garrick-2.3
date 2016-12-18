<?php
/**
 * Template part for displaying single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Garrick
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-preview">
                    <a href="post.html">
                       <?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        <h3 class="post-subtitle">
                            <?php the_excerpt(); ?>
                        </h3>
                    </a>
                    <p class="post-meta">
                    	<?php garrick_posted_on(); ?>
                    </p>
                </div>
                <hr>
	</article><!-- #post-## -->