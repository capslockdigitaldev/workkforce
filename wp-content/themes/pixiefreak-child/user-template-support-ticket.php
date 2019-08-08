<?php 
/*
Template Name: User Support Raise Ticket 
*/
get_header();

get_sidebar('left');
?>

	<div class="col-md-6 col-sm-6 col-12">
		<div class="main-content support frontline text-left mt-3">
			<h4 class="">Open Support Ticket</h4>
		</div>
		<hr class="thick tour mb-4">
		<div class="main-content support mt-4">
		<?php echo do_shortcode('[contact-form-7 id="1122" title="Open Support Ticket"]'); ?>
        </div>
        <div class="abt-logo text-center mt-4">
			<img class="img-fluid mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/primelogo.png">
		</div>
	</div>

<?php 
get_sidebar('right');
get_footer();
?>

