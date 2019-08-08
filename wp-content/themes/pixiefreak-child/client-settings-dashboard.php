<?php 

/**
 * Template Name: Client Profile
 *
 * Allow users to update their profiles from Frontend.
 *
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
	echo do_shortcode('[login-form redirect="http://capslock.live/admin-login/"]');
	?>
</div>
<?php
} 
else if ($admincheck == 'client' || $admincheck == 'administrator' ) {
get_sidebar('client');
?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Settings</h2>
                    <!--ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Tables</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Data Tables</strong>
                        </li>
                    </ol -->
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Update Account Settings</h5>
                        </div>
                        <div class="ibox-content">
                            <h2>Bank Details</h2>
                             <?php 
                             //$user_id = bp_loggedin_user_id();
                           // echo $user_id;
                           // $bp_city = bp_get_profile_field_data('field=fullbeneficiaryname&user_id='.$user_id);
                           // echo $bp_city;
                             
							
							$fullbeneficiaryname = "fullbeneficiaryname";
							$accnumber = "accnumber";
							$abanumber = "abanumber";
							$banknumber = "banknumber";
							$bankaddress = "bankaddress";
							$user_id = bp_loggedin_user_id();

							$field_value1 = bp_get_profile_field_data( array(
								'field' => $fullbeneficiaryname,
								'user_id' => $user_id
							) );
							$field_value2 = bp_get_profile_field_data( array(
								'field' => $accnumber,
								'user_id' => $user_id
							) );
							$field_value3 = bp_get_profile_field_data( array(
								'field' => $abanumber,
								'user_id' => $user_id
							) );
							$field_value4 = bp_get_profile_field_data( array(
								'field' => $banknumber,
								'user_id' => $user_id
							) );
							$field_value5 = bp_get_profile_field_data( array(
								'field' => $bankaddress,
								'user_id' => $user_id
							) );
							
							
							if ( !empty($_POST['accnam'] ) && !empty( $_POST['accnum'] ) && !empty( $_POST['abanum'] ) && !empty( $_POST['bnknam'] ) && !empty( $_POST['bnkadd'] ) )  {


								$accnam = $_POST['accnam'];
								$accnum = $_POST['accnum'];
								$abanum = $_POST['abanum'];
								$bnknam = $_POST['bnknam'];
								$bnkadd = $_POST['bnkadd'];


								xprofile_set_field_data( 'fullbeneficiaryname', $user_id , $accnam );
								xprofile_set_field_data( 'accnumber', $user_id , $accnum );
								xprofile_set_field_data( 'abanumber', $user_id , $abanum );
								xprofile_set_field_data( 'banknumber', $user_id , $bnknam );
								xprofile_set_field_data( 'bankaddress', $user_id , $bnkadd );
										
							
?> <p class="cheers">Cheers! Bank Details Updated <span id="nocheers">x</span></p>  <?php }
							else{
							?>
								
							<?php };;	
								?>
                            <form  method="post" action="<?php the_permalink(); ?>">
                                <p class="form-password">
                                    <label>Full Beneficiary Name</label>
                                    <input name="accnam" class="form-control" type="text" value="<?php echo $field_value1; ?>"/>
                                </p>
                                <p class="form-password">
                                    <label>Bank Account Number</label>
                                    <input name="accnum" class="form-control" type="text" value="<?php echo $field_value2; ?>"/>
                                </p>
                                <p class="form-password">
                                    <label>ABA Number</label>
                                    <input name="abanum" class="form-control" type="text" value="<?php echo $field_value3; ?>"/>
                                </p>
                                <p class="form-password">
                                    <label>Bank Name</label>
                                    <input name="bnknam" class="form-control" type="text" value="<?php echo $field_value4; ?>"/>
                                </p>
                                <p class="form-password">
                                    <label>Bank Address</label>
                                    <input name="bnkadd" class="form-control" type="text" value="<?php echo $field_value5; ?>"/>
                                </p>
								<p class="form-password">
									<input class="btn btn-lg btn-primary" type="Submit" />
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