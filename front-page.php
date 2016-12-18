<?php
/**
 * The front page.
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
                            <?php echo $front_page_title; ?>
                        </h1>
                        <h2 class="subheading">
                            <?php echo $front_page_sub_title; ?>
                        </h2>
                        
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
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="post-preview">
                                <a href="<?php the_permalink();?>" title="Link to <?php the_title();?>">
                                   <h2 class="post-title"><?php the_title(); ?></h2>
                                </a>   
                                    <h3 class="post-subtitle">
                                        <?php echo strip_tags(the_excerpt(), '<br>');
                                        ?>
                                    </h3>
                                
                                <p class="post-meta">
                                    <?php garrick_posted_on(); ?>
                                </p>
                            </div>
                            <hr>
                </article><!-- #post-## -->

            <?php endwhile;

                the_posts_navigation();

             else :

                get_template_part( 'template-parts/content', 'none' );

            endif; 
            /*
            ?>
               <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            */?>
            </div><!-- col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 -->
        </div><!-- row -->
    </div><!-- container -->

<?php
// get_sidebar();
get_footer();