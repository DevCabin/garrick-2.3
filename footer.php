<?php
/**
 * @package Garrick
 */
if ( function_exists( 'ot_get_option' ) ) {

  $full = ot_get_option( 'full_design' );
  $pop_up_title = ot_get_option( 'pop_up_title' );
  $pu_desc = ot_get_option( 'pop_up_description' );
  $form_code = ot_get_option( 'form_code' );
  $pu_settings = ot_get_option( 'pu_settings' );
  $pu_full = ot_get_option( 'pu_full' );
  $timeout = ot_get_option( 'timeout' );

}
?>
    <!-- footer.php -->
    <hr>
    </div><!-- #content -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; <?php echo date("Y");?> <?php echo get_bloginfo( 'name' ); ?></p>
                </div>
            </div>
        </div>




    </footer>





    <!-- Custom Fonts -->
    <link href="<?php echo get_template_directory_uri(); ?>/inc/clean/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>





    <!-- jQuery -->
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/inc/clean/js/clean-blog.min.js"></script>




<?php wp_footer(); ?>

<?php include('growthpop.php');?>

</body>
</html>
