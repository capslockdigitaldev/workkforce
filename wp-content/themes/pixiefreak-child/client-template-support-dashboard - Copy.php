<?php 
/*
Template Name: Client Support 
*/
get_header('client');
$user = wp_get_current_user();
$roles = ( array ) $user->roles;
// $roles; // This returns an array
// Use this to return a single value
$admincheck = $roles[0];
if (!is_user_logged_in()) {
?>
<div class="client_login">
	<?php
	echo do_shortcode('[login-form redirect="/admin-login/"]');
	?>
</div>
<?php
} 
else if ($admincheck == 'client' || $admincheck == 'administrator' ) {
get_sidebar('client');
?>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Support</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Need Help? We Love Helping</h5>
                    </div>
                    <div class="ibox-content">
							<?php
							if ( !empty($_POST['yourname'] ) && !empty( $_POST['email'] ) && !empty( $_POST['subject'] ) && !empty( $_POST['message'] ) )  {

								$to      = 'hello@capslockdigital.org';
								$subject = $_POST['subject'];
								$name = $_POST['yourname'];
								$email = $_POST['email'];
								$message = $_POST['message'];
								$headers = 'From: help@xrsports.gg' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();

								mail($to, $subject, $message, $headers);		
							
?> <p class="cheers">Cheers! Message Sent <span id="nocheers">x</span></p>  <?php }
							else{
							?>
								
							<?php };;	
						?>
						<form method="post" action="<?php the_permalink(); ?>" >
                                <p class="form-password">
                                    <label>Your Name</label>
                                    <input class="form-control" name="yourname" type="text" placeholder="Your Name"/>
                                </p>
                                <p class="form-password">
                                    <label>Your Email</label>
                                    <input class="form-control" name="email" type="text" placeholder="Your Email"/>
                                </p>
                                <p class="form-password">
                                    <label>Subject</label>
                                    <input class="form-control" name="subject" type="text" placeholder="Subject"/>
                                </p>
								<p class="form-password">
									<label>Message</label>
									<textarea class="form-control" name="message" rows = "5" cols = "50" name = "description">Go ahead! We are Listining...</textarea>
								</p>
                                <p class="form-password">
                                    <input class="btn btn-lg btn-primary" type="Submit"/>
                                </p>
                            </form>
					</div>
                </div>
            </div>
            </div>
        </div>

            
<?php
}
else{
?>
<div class="client_login"><p class="oops">OOPS! You are not Authorized to Access This Page.</p></div>
<?php
};
get_footer('client');
?>