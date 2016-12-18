<?php
function my_enqueue() { ?>
<script>
jQuery("#setting_timeout input#timeout").change(function(){
var slide_val = jQuery("#setting_timeout input#timeout").val();

var aggressive = "Pop Up Not Active";

	if (slide_val > 19) {
		var aggressive = "Passive (Low views, high conversion rate)";
	} else if (slide_val < 20 && slide_val > 10) {
		var aggressive = "Conservative (Moderate views, average conversion rate)";
	} else if (slide_val < 11 && slide_val > 5) {
		var aggressive = "Fairly Aggressive (High views, low conversion rate)";
	} else if (slide_val < 6 && slide_val > 0) {
		var aggressive = "Very Aggressive (Most views, lowest conversion rate)";
	}

//console.log(aggressive);

jQuery('#slide_val_alert').html(aggressive);

});

</script>    
<style>
	#slide_val_alert {
		font-weight: bold;
	}
</style>
<?php }

function gh_favicon() { ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/inc/gh-fist.png"/>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/inc/gh-fist.png"/>
<?php } 

add_action('admin_footer', 'my_enqueue');
add_action('admin_head', 'gh_favicon');
