<?php 
/*
Template Name: User Support 
*/
get_header();

get_sidebar('left');
?>

			<div class="col-md-6 col-sm-6 col-12">
				<div class="main-content support text-left mb-4 mt-3">
					<h4>Support</h4>
				</div>
				<hr class="thick tour mb-2">
				
				<p class="supportfaq">Thanks for contacting Support, You Can Start at <a href="/user-faq/">Frequently Asked Questions</a></p>
				<div class="submit mb-4 d- pr-0">
				    <a href="<?php echo get_bloginfo('url') ?>/submit-game-results/">
				        <span class="pull-left">
				            Submit Game Results
				        </span>
				        <span class="pull-right">
				            <img class="img-fluid" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/game1.png">
				        </span>
				    </a>    
				</div>
				<div class="submit mb-4 d- pr-0">
				    <a href="<?php echo get_bloginfo('url') ?>/open-support-ticket/">
				        <span class="pull-left">
				            Open Support Ticket
				        </span>
				        <span class="pull-right">
				            <img class="img-fluid" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/ticket1.png">
				        </span>
				    </a>
				</div>
				<div class="submit mb-4 d- pr-0">
				    <a href="<?php echo get_bloginfo('url') ?>/report-a-problem/">
				        <span class="pull-left">
				            Report A Problem
				        </span>
				        <span class="pull-right">
				            <img class="img-fluid" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/problem1.png">
				        </span>
				    </a>
				</div>
				<div class="submit mb-4 d- pr-0">
				    <a id="openchat">
				        <span class="pull-left">
				            Begin Live Chat
				        </span>
				        <span class="pull-right">
				            <img class="img-fluid" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/chat1.png">
				        </span>
				    </a>
				</div>
				<br>

				<div class="abt-logo text-center mt-4">
				<img class="img-fluid mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/primelogo.png">
				</div>


			</div>
<?php 
get_sidebar('right');
get_footer();
?>

