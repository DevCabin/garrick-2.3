<?php
/**
 * Template Name: Business Landing
 * @package Garrick
*/
if ( have_posts() ) : while ( have_posts() ) : the_post();
$bg_url = get_field('custom_banner_image');
$color_scheme = "4";
$color_scheme = get_field('color_scheme');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title><?php wp_title();?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="HandheldFriendly" content="true">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Import CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/biz/css/main.css?v2">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <?php /*
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/jquery.easing.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/jquery.scrollto.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/slabtext.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/jquery.nav.js"></script>
    */?>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/all-js.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/biz/js/main.js"></script>
</head>
<!-- To change color change the class "color-1" to "color-2, color-3 ... color-6" -->
<body class="home color-<?php echo $color_scheme;?>">
    <div id="header">
        <div class="container">

            <div class="row">

                    <i id="nav-button" class="icon-circle-arrow-down"></i>
                    <h2 id="logo"><span class="highlight">
                    <?php if(get_field('logo_area') == "custom")
                        { ?>
                        <a href="<?php echo site_url();?>"><?php the_field('custom_text'); ?></a>
                        <?php } 
                        elseif (get_field('logo_area')=="image") { ?>
                        <a href="<?php echo site_url();?>">
                            <img src="<?php the_field('custom_logo');?>" alt="<?php echo bloginfo('sitename');?> landing logo">
                        </a>
                        <?php }
                        else
                        { ?>
                        <a href="<?php echo site_url();?>"><?php echo bloginfo('sitename');?></a>
                    <?php } ?>                    
                    </span>
                    </h2>
                

                <div id="top-nav" class="">
                    <ul id="fixed-nav">
                        <li class="current"><a href="#home">Top</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#aboutus">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div><!-- End Header -->
    <!-- Big Full screen Banner -->


    <div class="hero bg-fixed bg-color" id="home" style="background-image: url('<?php echo $bg_url;?>');">

        <div class="slogan">
            <div  class="vcenter container">

                <div class="row">
                    <div class="span12">
                        <h1><?php if(get_field('main_headline'))
                        { 
                        the_field('main_headline'); 
                        } 
                        else 
                        { ?>We Create Beautiful, Intuitive &amp; Powerful Web Applications<?php } ?></h1>
                    <?php if(get_field('use_a_cta') == true) { ?>
                    <p class="hero__content" id="">
                        <a class="btn" href="<?php the_field('cta_link');?>">
                            <?php if (get_field('cta_text')) { 
                            the_field('cta_text'); 
                            } else { 
                            ?>CLICK HERE<?php } ?>
                        </a>
                    </p>
                    <?php } ?>

                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- End Full screen banner  -->
    <!-- Services Section -->
    <!-- class section-alt is to give a different color please edit css/style.css to change the color -->
    <div class="section section-alt" id="services">
        <div class="container">
            <div class="content">
                <div class="row" >
                    <div class="title">
                        <h2>Our Services</h2>
                        <div class="hr hr-small hr-center"><span class="hr-inner"></span></div>
                        <p><?php if(get_field('services_subheading')) { the_field('services_subheading'); } else { 
                            ?>We develop and market mobile application, websites and ecommerce solutions.
                        <?php } ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="span4 i-block">
<?php if(get_field('services_content_block_a')) { the_field('services_content_block_a'); } else { ?>

<i class="icon-mobile-phone"></i>
<h3>Block-A</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>

<?php } ?>                    

   
                    </div>
                    <div class="span4 i-block">

<?php if(get_field('services_content_block_b')) { the_field('services_content_block_b'); } else { ?>

<i class="icon-star"></i>
<h3>Block-B</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>

<?php } ?>   
                    
                    </div>
                    <div class="span4 i-block">

<?php if(get_field('services_content_block_c')) { the_field('services_content_block_c'); } else { ?>

<i class="icon-thumbs-up-alt"></i>
<h3>Block-C</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam</p>

<?php } ?>    

                    </div>
                </div>
                <div class="hr hr-invisible"></div>
            </div>
        </div>
    </div>
    <!-- End Services Section -->
    <!-- About Us section -->
    <div class="section" id="aboutus">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="span12">
                        <div class="title">
                            <h2>About Us</h2>
                            <div class="hr hr-small hr-center"><span class="hr-inner"></span></div>

                            <?php if(get_field('about_subheading')) { the_field('about_subheading'); } else { 
                            ?><p>The most important thing to us is building products people love.</p>
                            <?php } ?>

                        </div>
                         
                        <?php if(get_field('about_us_content')) { the_field('about_us_content'); } else { ?>
                           
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam. Quisque non feugiat erat. Mauris tristique id sem in blandit. Vestibulum pretium convallis orci. Suspendisse in aliquet leo. Donec ultricies fringilla augue, nec accumsan leo euismod et. Quisque non nisl non augue cursus rhoncus vel eget sem. Phasellus sed gravida nisi, ac lacinia dui. Aliquam pretium dapibus orci sed placerat. Nunc in condimentum massa, vitae consectetur ligula. Maecenas consequat in diam ut vulputate. Aenean vel ullamcorper elit.
                        </p>
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, justo sed tincidunt iaculis, nisl enim rutrum dolor, in posuere purus risus vel quam. Quisque non feugiat erat. Mauris tristique id sem in blandit. Vestibulum pretium convallis orci. Suspendisse in aliquet leo. Donec ultricies fringilla augue, nec accumsan leo euismod et. Quisque non nisl non augue cursus rhoncus vel eget sem. Phasellus sed gravida nisi, ac lacinia dui. Aliquam pretium dapibus orci sed placerat. Nunc in condimentum massa, vitae consectetur ligula. Maecenas consequat in diam ut vulputate. Aenean vel ullamcorper elit.
                        </p>

                        <?php } ?>
                       
                    </div>
                </div>
            </div>
        </div> 

    </div>
    <!-- Contact Section -->
    <div class="section" id="contact" >
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="span12">
                        <div class="title">
                            <h2>Contact Us</h2>
                            <div class="hr hr-small hr-center"><span class="hr-inner"></span></div>

                            <?php if(get_field('contact_us_subheading')) { the_field('contact_us_subheading'); } else { 
                            ?><p>We bring a personal and effective approach to every project we work on.</p>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="span8">
<?php if(get_field('contact_us_left_side')) { the_field('contact_us_left_side'); } else { ?>

                        <iframe width="620" height="300" frameborder="0" scrolling="no" marginheight="0" src="https://maps.google.com/maps?q=bob donuts san fancisco, &t=&z=14&ie=UTF8&iwloc=&output=embed" marginwidth="0"></iframe>

<?php } ?>
                    </div>
                    <div class="span4">


                    <?php if(get_field('contact_us_right_side')) { the_field('contact_us_right_side'); } else { ?>

<h4>Our Location</h4>
<p>123 Main Street</p>
<hr class="grey"/>
<h4>Email &amp; Phone</h4>
<p>info@website.com</p>
<p>1-800-123-5432</p>
<hr class="grey"/>
<h4>Socialize With Us</h4>
<div class="social">
    <a href="#fb"><i class="icon-facebook-sign"></i></a>
    <a href="#fb"><i class="icon-twitter-sign"></i></a>
    <a href="#fb"><i class="icon-google-plus-sign"></i></a>
</div>

                        <?php } ?>

                        

                    </div>
                </div>
            </div>
        </div> 

    </div>
    <!-- End Contact Section -->
    <div id="footer">
        &copy; <?php echo date('Y');?> <?php echo bloginfo('name'); ?>
        <div style="display:none;" rel="nofollow" id="attribution">Special Thanks to mRova http://www.mrova.com</div>
    </div>
</body>
</html>
            <?php endwhile;

                the_posts_navigation();

             else : ?>

                <h2>404 Nothing found</h2>
                
            <?php
            endif; 
            ?>
