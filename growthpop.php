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
  $pu_active = ot_get_option( 'pu_active' );
  $pu_test = ot_get_option( 'pu_test' );
}
if ($pu_active == "on") {
?>
        <!-- Attach our CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reveal/reveal.css?v=3.1">   
        <!-- Attach necessary scripts -->
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reveal/jquery.reveal.js?v=1.4"></script>
        <a href="#" id="mod-link" data-reveal-id="growthPop"></a>    
        <div id="growthPop" class="reveal-modal">
          <div id="growthPopContent">
            <?php if ($pu_settings == "pu_simple") { ?>
            <h1><?php echo $pop_up_title; ?></h1>
            <p class="sub-t"><?php echo $pu_desc; ?></p>
            <?php echo $form_code; ?>
            <?php } else { echo $full; } ?>
          </div>

            <a id="closeModal" class="close-reveal-modal" href="#">&#215;</a>

        </div>
        
<script>
$(document).ready(function() {
    if(localStorage.getItem('popState') != 'shown'){
    setTimeout(function() {
             $('#mod-link').trigger('click');
     }, <?php echo $timeout;?>e3);

<?php if ($pu_test == "pu_test_off") { ?>
      localStorage.setItem('popState','shown')
<?php } elseif ($pu_test == "pu_test_on")  { ?>
	    localStorage.setItem('popState','testMode')
<?php } else { ?>
	    localStorage.setItem('popState','testMode')
<?php } ?>
    }
});


function trackClicks(event) {
  ga('send', 'event', {
    eventCategory: 'Garrick Pop Up',
    eventAction: 'click',
    eventLabel: 'Visitor Clicked The Pop Up Link'
  });
  console.log('Pop Up Link Clicked');
}

function trackClose(event) {
  ga('send', 'event', {
    eventCategory: 'Garrick Pop Up',
    eventAction: 'click',
    eventLabel: 'Visitor Closed the Pop Up'
  });
  console.log('Pop Up Closed');
}
$('#growthPopContent a').click(function() {
  trackClicks();
})
$('#closeModal').click(function() {
  trackClose();
})


</script>
<?php } ?>