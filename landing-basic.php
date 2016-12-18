<?php
/**
 * Template Name: Landing Page
 *
 * @package Garrick
 */

get_header(); 

while ( have_posts() ) : the_post();

/*
the_field('hero_image')
the_field('main_hero_title')
the_field('secondary_title')
the_field('button_text')
the_field('cta_link')
the_field('text_below_cta')
the_field('page_content')
the_field('activate_automatic_footer_cta')

*/
$cta_two = get_field('activate_automatic_footer_cta');
?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->

    <header class="intro-header" style="background-image: url('<?php the_field('hero_image') ?>');">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">

                            <h1 class="entry-title">
                                <?php the_field('main_hero_title'); ?>
                            </h1>

                            <!--hr class="small"-->

                            <span class="subheading">
                                <?php the_field('secondary_title'); ?>
                            </span>

                            <div class="landing-main-cta">
                                <a href="<?php the_field('cta_link'); ?>">
                                    <?php the_field('button_text'); ?>
                                </a>
                            </div>
                            <div class="after-the-cta">
                                <?php the_field('text_below_cta'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container main-content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <?php the_field('page_content'); ?>

            </div>
        </div>
    </div>

<div class="clear clearfix"></div>

<?php if ($cta_two == "Yes") { ?>
    <div class="bonus-cta" style="background-image: url('<?php the_field('hero_image') ?>');">
        <div class="overlay" style="height:250px;">
            <div class="landing-main-cta">
                <a href="<?php the_field('cta_link'); ?>">
                    <?php the_field('button_text'); ?>
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<style>
.landing-main-cta a {
    display: block;
    border-style: solid;
    border-radius: 3px;
    z-index: 3;
    width: 268px;
    height: 56px;
    background: rgba(214,62,75,1);
    box-shadow: none;
    text-shadow: none;
    color: #fff;
    border-width: 1px;
    border-color: #8f2831;
    font-size: 26px;
    line-height: 31px;
    font-weight: bold;
    text-align: center;
    background-repeat: no-repeat;
    margin: 0 auto;
    margin-top: 20px;
    padding-top: 10px;
    font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    text-transform: uppercase;
}
.landing-main-cta a:hover {
  background:rgba(203,47,58,1);
  box-shadow:none;
  color:#fff;
}
.landing-main-cta a:active {
  background:rgba(193,39,49,1);
  box-shadow:none;
  color:#fff;
}
.bonus-cta .landing-main-cta {
    padding-top: 75px;
}

.after-the-cta {
    font-size: .8em;
    font-style: italic;
}
.after-the-cta a {
    color: #1b7587;
}
.overlay {
    background-color: rgba(0,0,0,.4);
}

@media only screen and (min-width: 768px) {
    .intro-header .page-heading h1 {
        font-size: 40px;
    }
    .intro-header .page-heading .subheading {
        font-size: 20px;
    }
}
</style>

<?php
endwhile; // End of the loop.
get_footer();