<?php 
/*
Template Name: User Profile
*/
get_header();

get_sidebar('left');
?>
	<div class="col-md-6 col-sm-6 col-12 p-0">
		<div class="main-content">
			<div class="main-content support frontline text-left mt-3">
            <h4 class="">My Profile</h4>
        </div>
        <hr class="thick tour mb-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">GENERAL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">PROFILE</a>
                    </li>
                    <!-- li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">BANK</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">ID/LOCATION VEREFICTAION</a>
                    </li -->
                    <li class="nav-item">
                    <a class="nav-link" href="#tab5" data-toggle="tab">CLAIM OFFER</a>
                    </li>
                </ul>
                <div class="tab-content">
                    
                        <?php
                        if (isset($_POST['submit1'])) {
                            $ps = $_POST['playstation'];
                            $xb = $_POST['xbox'];
                            $st = $_POST['steam'];
                            $mg = $_POST['mgamer'];
                            $usedid = get_current_user_id(); 
                            xprofile_set_field_data( 'psnid', $usedid , $ps );
                            xprofile_set_field_data( 'xboxid', $usedid , $xb );
                            xprofile_set_field_data( 'steamid', $usedid , $st );
                            xprofile_set_field_data( 'mobilegamertag', $usedid , $mg );
                            ?> <p class="noti tab" >Gamerstag Updated</p> <?
                        }
                        
                        if (isset($_POST['submit2'])) {
                            $fb = $_POST['facebook'];
                            $ig = $_POST['ig'];
                            $yt = $_POST['youtube'];
                            $tw = $_POST['twitter'];
                            $usedid = get_current_user_id(); 
                            xprofile_set_field_data( 'Facebook', $usedid , $fb );
                            xprofile_set_field_data( 'Instagram', $usedid , $ig );
                            xprofile_set_field_data( 'Youtube', $usedid , $yt );
                            xprofile_set_field_data( 'Twitter', $usedid , $tw );
                            ?> <p class="noti tab" >Social Links Updated</p> <?
                        }?>
                        
                        
                        
                    <div class="tab-pane active" id="tab1">
                        <div class="sixty userpro">
            				<?php
            				/* Get user info. */
            				global $current_user, $wp_roles;
            				//get_currentuserinfo(); //deprecated since 3.1
            
            				/* Load the registration file. */
            				//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
            				$error = array();    
            				/* If profile was saved, update profile. */
            				if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
            
            				/* Update user password. */
            				if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
            				if ( $_POST['pass1'] == $_POST['pass2'] )
            				wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
            				else
            				$error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
            				}
            
            				/* Update user information. */
            				if ( !empty( $_POST['url'] ) )
            				wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
            				if ( !empty( $_POST['email'] ) ){
            				if (!is_email(esc_attr( $_POST['email'] )))
            				$error[] = __('The Email you entered is not valid.  please try again.', 'profile');
            				elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            				$error[] = __('This email is already used by another user.  try a different one.', 'profile');
            				else{
            				wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
            				}
            				}
            
            				if ( !empty( $_POST['first-name'] ) )
            				update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
            				if ( !empty( $_POST['last-name'] ) )
            				update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
            				if ( !empty( $_POST['description'] ) )
            				update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
            
            				/* Redirect so the page will show updated info.*/
            				/*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
            				if ( count($error) == 0 ) {
            				//action hook for plugins and extra fields saving
            				do_action('edit_user_profile_update', $current_user->ID);
            				?>
            				<p class="noti tab" >Cheers!Profile Information Updated</p> 
            				<?php  
            				// wp_redirect( get_permalink() );
            				// exit;
            				}
            				}
            				?>
            
            				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            				<div id="post-<?php the_ID(); ?>">
            				<div class="entry-content entry">
            				<?php the_content(); ?>
            				<?php if ( !is_user_logged_in() ) : ?>
            				<p class="warning">
            				<?php _e('You must be logged in to edit your profile.', 'profile'); ?>
            				</p><!-- .warning -->
            				<?php else : ?>
            				<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
            				<form method="post" id="adduser" action="<?php the_permalink(); ?>">
            				<p class="form-username">
            				<label for="first-name"><?php _e('Your Name', 'profile'); ?></label>
            				<input class="form-control" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
            				</p><!-- .form-username -->
            				
            				<p class="form-username">
            				<label for="last-name"><?php _e('Phone', 'profile'); ?></label>
            				<input class="form-control" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'description', $current_user->ID ); ?>" />
            				</p><!-- .form-username -->
            				
            				<p class="form-email">
            				<label for="email"><?php _e('E-mail *', 'profile'); ?></label>
            				<input class="form-control" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
            				</p><!-- .form-email -->
            				<p class="form-url">
            				<label for="url"><?php _e('Website', 'profile'); ?></label>
            				<input class="form-control" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
            				</p><!-- .form-url -->
            				<p class="form-password">
            				<label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
            				<input class="form-control" name="pass1" type="password" id="pass1" />
            				</p><!-- .form-password -->
            				<p class="form-password">
            				<label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
            				<input class="form-control" name="pass2" type="password" id="pass2" />
            				</p>
            				<!-- .form-password -->
            				<!-- p class="form-textarea">
            				<label for="description"><?php //_e('Additional  Information', 'profile') ?></label>
            				<textarea class="form-control" name="description" id="description" rows="3" cols="50"><?php //the_author_meta( 'description', $current_user->ID ); ?></textarea>
            				</p><!-- .form-textarea -->
            
            				<?php 
            				//action hook for plugin and extra fields
            				// do_action('edit_user_profile',$current_user); 
            				?>
            				<p class="form-submit">
            				<?php echo $referer; ?>
            				<input name="updateuser" type="submit" id="updateuser" class="btn btn-lg btn-primary" value="<?php _e('Update', 'profile'); ?>" />
            				<?php wp_nonce_field( 'update-user' ) ?>
            				<input name="action" type="hidden" id="action" value="update-user" />
            				</p><!-- .form-submit -->
            				</form><!-- #adduser -->
            				<?php endif; ?>
            				</div><!-- .entry-content -->
            				</div><!-- .hentry .post -->
            				<?php endwhile; ?>
            				<?php else: ?>
            				<p class="no-data">
            				<?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
            				</p><!-- .no-data -->
            				<?php endif; ?>
            				</div>
                            <div class="forty userpro">
            					<div class="ibox ">
            						<div class="ibox-title">
            							<h5>Update Profile Photo</h5>
            						</div>
            						<div class="ibox-content">
            							<?php 
            							if($_POST){
            								if (!function_exists('wp_generate_attachment_metadata')){
            									require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            									require_once(ABSPATH . "wp-admin" . '/includes/file.php');
            									require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            								}
            								if($_FILES)
            								{
            									foreach ($_FILES as $file => $array)
            									{
            										if($_FILES[$file]['error'] !== UPLOAD_ERR_OK){return "upload error : " . $_FILES[$file]['error'];}//If upload error
            										$attach_id = media_handle_upload($file,$new_post);
            
            										$usedid = get_current_user_id(); 
            										$addimage = wp_get_attachment_url($attach_id);;
            
            										xprofile_set_field_data( 'propic', $usedid , $addimage );
            										//echo wp_get_attachment_url($attach_id);//upload file URL
            										
            										?> <p class="noti tab">Cheers! Profile Picture Updated.</p> <?
            									}
            								}
            							}
            							
            							$user_id = bp_loggedin_user_id();
            							$bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id);
            							
            							
            							?>   
                                        <?php	if ($bp_city == "") {
                                        ?><img class="propic" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/profile-picture.png"><?php
                                        } else { $bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id); 
                                        ?><img class="propic" src="<?php echo $bp_city; ?>"><?php
                                        } ?>
            							
            							
            							<form id="proforum" method="post" enctype="multipart/form-data">
            								 <label for="profile" class="btnup">Upload New Photo</label>
            								<input id ="profile" type="file" style="visibility:hidden;" name="imagefile" />
            								<input class="btn btn-primary" style="visibility:hidden;" id="prosub" type="submit" name="Submit" value="Update" />
            							</form>
            						</div>
            					</div>
            				</div>
                        </div>
                    <div class="tab-pane" id="tab2">
                        <div class="full userpro">
                            PLATFORM GAMERTAGS:
                            <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                                <p class="form-username">
                                    <label>PS4</label>
                                    <input class="form-control" name="playstation" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=psnid&user_id='.$useri); echo $psn; ?>">
                                </p>
                                <p class="form-username">
                                    <label>XBOX</label>
                                    <input class="form-control" name="xbox" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=xboxid&user_id='.$useri); echo $psn; ?>">
                                </p>
                                <p class="form-username">
                                    <label>Steam ID</label>
                                    <input class="form-control" name="steam" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=steamid&user_id='.$useri); echo $psn; ?>">
                                </p><p class="form-username">
                                    <label>Mobile Gamerstag</label>
                                    <input class="form-control" name="mgamer" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=mobilegamertag&user_id='.$useri); echo $psn; ?>">
                                </p>
                				<p class="form-submit">
                				    <input class="btn btn-primary" name="submit1" type="submit" value="update">
                				</p>
            				</form>
                        </div>
                        <div class="full userpro">
                           SOCIAL LINKS:
                            <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                                <p class="form-username">
                                    <label>Facebook</label>
                                    <input class="form-control" name="facebook" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=Facebook&user_id='.$useri); echo $psn; ?>">
                                </p>
                                <p class="form-username">
                                    <label>Instagram</label>
                                    <input class="form-control" name="ig" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=Instagram&user_id='.$useri); echo $psn; ?>">
                                </p>
                                <p class="form-username">
                                    <label>Youtube</label>
                                    <input class="form-control" name="youtube" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=Youtube&user_id='.$useri); echo $psn; ?>">
                                </p><p class="form-username">
                                    <label>Twitter</label>
                                    <input class="form-control" name="twitter" type="text" value="<?php $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=Twitter&user_id='.$useri); echo $psn; ?>">
                                </p>
                				<p class="form-submit">
                				    <input class="btn btn-primary" name="submit2" type="submit" value="update">
                				</p>
            				</form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                    </div>
                    <div class="tab-pane" id="tab4">
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="full userpro">
                           OFFERS:
                            <p>OOPS! No Offers available right now. Come Back Soon :)</p>
                        </div>
                    </div>
                </div>    


















				
			</div>
		</div>		
		
 <script>
document.getElementById("profile").onchange = function() {
    document.getElementById("prosub").click();
};
</script> 
		
<?php 
get_sidebar('right');
get_footer();
?>

