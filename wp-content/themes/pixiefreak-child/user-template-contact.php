<?php 
/*
Template Name: User Contact 
*/
get_header();

get_sidebar('left');
?>

		<div class="col-md-6 col-sm-6 col-12">
			<div class="main-content contact-us mt-4">
				<h2 class="mb-4 text-center">Contact Us</h2>  
					<div class="contact mb-4"><span><b><i class="far fa-comments"></i> &nbsp; Immediate Help</b><br><small>Open a Live Chat</small></span></div>
					<div class="contact mb-4"><span><b><i class="far fa-envelope"></i> &nbsp; Email PrimeTime Gaming</b><br><small>game@primetimesportz.com</small></span></div>
				    <div class="contact mb-4"><span><b><i class="fas fa-map-marker-alt"></i> &nbsp; Office</b><br><small>2805 Dallas Pkwy, Suite 610 <br> Plano, TX 75093</small></span></div>
				<br>

				<div class="abt-logo text-center mt-4">
				<img class="img-fluid mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/xr-logo1.png">
				</div>
			
			</div>
		</div>
<?php 
get_sidebar('right');
get_footer();
?>

