<?php 
/*
    Template Name: Client Add User
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
                    <h2>Manage User</h2>
                </div>
                <div class="col-lg-2">
                </div>
    </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Add a User</h5>
                    </div>
                    <div class="ibox-content">
                        
    <?php 
				
			if (isset($_POST["fastname"])) {
			    
				
				
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
						
						//echo $user; 
						//echo $email;
						//echo $lname;
						//echo $phone;
						//echo $pass;
						
                        $usercheck = get_user_by( 'email', $email );
                        $userId = $usercheck->ID;
                    
						
						if($userId != '' )
						{
                            echo '<h2>OOPS! User Already Exists</h2>';
						}
					else
						{
							$default_newuser = array(
							'user_pass' => $pass,
							'user_login' => $username,
							'user_email' => $email,
							'first_name' => $user,
							'description' => $phone,
							'role' => 'user'
							); 
							$users = wp_insert_user( $default_newuser );
							
							xprofile_set_field_data( 'XRWallet', $users , '1000' );
							
							
							if ( ! is_wp_error( $users ) ) 
								{
								
								
                                    echo '<h2>Cheers! Registration complete</h2>'; 
								
								        
								}
								else{
								    
                                    echo '<h2>OOPS! Something Went Wrong</h2>';
									
								}
						}
						
			        }
			     else {   
				?>
                    
                        
                    <!-- New User Form -->
                    <div id="postbox">
                      <form id="" class="user-forms newform" action="" autocomplete="off" method="post" name="">
                                
                                <div class="form-group">
                                    <label> <?php echo 'Your Name'; ?><span class="after">*</span></label> 
                                    <input id="fastname" class="text-input form-control" name="fastname"  type="text" value="" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo 'User Name'; ?><span class="after">*</span></label>
                                    <input id="lastname" class="text-input form-control" name="lastname" type="text" value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label ><?php echo 'Email'; ?><span class="after">*</span></label> 
                                    <input id="email" class="text-input form-control" name="email" required="required" type="email" value="" required/>
                                </div>   
                                
                                <div class="form-group birth">
                                <label >Phone*</label>
                                <input id="otphonenumber" class="text-input form-control newphone" name="newphone" required="required" type="text" value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password"><?php echo 'Password'; ?><span class="after">*</span></label> 
                                    <input id="cpass" class="text-input form-control" name="cpass" required="required" type="password" value="" required/>
                                </div>
                                
                                
                                
                                <div class="notgroup text-center footer" style="padding: 0 44px;">
                                    <button type="submit" class="btn btn-primary newsubmit">Add User</button>
                            
                                </div>
                    </form> 
                </div>
                <?php
			     
			         
			     };
                
                ?>
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