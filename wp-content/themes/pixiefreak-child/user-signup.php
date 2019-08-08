<?php 
/*
Template Name: User Signup
*/
get_header();
get_sidebar('left');
?>

	<div class="col-md-6 col-sm-6 col-12">
		<div class="about-us mt-4 oo not-found">
		        <?php 
				
				    include('../wp-config.php');
                    global $wpdb;
                    
                    $user=$_POST['fastname']; 
                    $email=$_POST['email'];
                    $username=$_POST['lastname'];
                    $phone = $_POST['newphone'];
                    $pass= $_POST['cpass'];
                    $date=date('Y-m-d H:i:s');
                    //$table = $wpdb->prefix."users";
                    //$sel= "Select * from $table  where user_login= '".$email."'";
                    //$posts = $wpdb->get_results($sel);
                    //$rowCount = $wpdb->num_rows;
                    
                   // echo $user; 
                  //  echo $email;
                  //  echo $lname;
                  //  echo $phone;
                  //  echo $pass;
                    
                    $usercheck = get_user_by( 'email', $email );
                    $userId = $usercheck->ID;
                    
						
					if($userId != '')
						{
                            echo '<h2>OOPS! User Already Exists.</h2><br>
                            <p>Please try with another email address.</p> <br><a type="button" class="log" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">Register</a>';
						}
					else
						{
							$default_newuser = array(
							'user_pass' => $pass,
							'user_login' => $username,
							'user_email' => $email,
							'first_name' => $user,
							'description' => $phone,
							'role' => 'subscriber'
							); 
							$users = wp_insert_user( $default_newuser );
							
							xprofile_set_field_data( 'XRWallet', $users , '1000' );
							
							
							if ( ! is_wp_error( $users ) ) 
								{
								
								
                                    echo '<h2>Cheers! Registration complete</h2><br><a type="button" class="log" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Click Here to Login</a> '; 
								
								        $message ="Hello ".$user."! Thank you for signing up on Primetime.game";
								        $country = '1';
                                        ihs_send_order_sms( $message, $phone, $country );
								
								        // Welcome Email
								        
								        
                                        $headers = "";
                                        $headers .= "From: Primetime.game <no-reply@primetime.game> \r\n";
                                        $headers .= "Reply-To:" . $from . "\r\n" ."X-Mailer: PHP/" . phpversion();
                                        $headers .= 'MIME-Version: 1.0' . "\r\n";
                                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                        $subject = 'Welcome to Primetime.Game';
                                        
                                        mail($email,$subject,$message,$headers);
								}
								else{
								    
                                    echo '<h2>OOPS! Something Went Wrong.</h2><br>
                                    <p>Please try again.</p> <br><a type="button" class="log" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">Register</a>';
									
								}
						}
				?>
		</div>
	</div>

<?php
get_sidebar('right');
get_footer();
?>
