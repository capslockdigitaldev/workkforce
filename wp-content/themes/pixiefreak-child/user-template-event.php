<?php 
/*
Template Name: User Events
*/
get_header();

get_sidebar('left');
?>

	<div class="col-md-6 col-sm-6 col-12">
		<div class="main-content mt-4">
		
		<?php echo do_shortcode("[ecs-list-events thumb='true' thumbwidth='100%' thumbheight='100%']"); ?>

		</div>
	</div>

<?php 
get_sidebar('right');
get_footer();
?>

