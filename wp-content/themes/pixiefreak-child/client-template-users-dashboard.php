<?php 
/*
Template Name: Client Template Users List Dashboard
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
                    <h2>Users</h2>
 
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Users</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Username</th>
                        <th>Last active</th>
                        <th>Primetime Bucks</th>
						
                    </tr>
                    </thead>
                    <tbody>
                <?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

 
                          <div id="pag-top" class="pagination">
                         
                            <div class="pag-count" id="member-dir-count-top">
                         
                              <?php bp_members_pagination_count(); ?>
                         
                           </div>
                         
                           <div class="pagination-links" id="member-dir-pag-top">
                         
                              <?php bp_members_pagination_links(); ?>
                         
                           </div>
                         
                          </div>
                         
                        <?php do_action( 'bp_before_directory_members_list' ); $i= '0';?>
                         <?php while ( bp_members() ) : bp_the_member();  
                         $i++;?>
 				            <tr> 
						<td><?php echo $i; ?></td>
                        <td><?php bp_member_name(); ?></td>
                        
						<?php if ( bp_get_member_latest_update() ) : ?><span class="update"> <?php bp_member_latest_update(); ?></span><?php endif; ?>
                        <td><span class="activity"><?php bp_member_last_active(); ?></span></td>
                        
                    
						<?php
							do_action( 'bp_directory_members_item' );
						/***
						* If you want to show specific profile fields here you can,
						* but it'll add an extra query for each member in the loop
						* (only one regardless of the number of fields you show):
						*
						* bp_member_profile_data( 'field=the field name' );
					    */
						?>
						<td><?php bp_member_profile_data('field=XRWallet');?></td>

						<div class="action"><?php do_action( 'bp_directory_members_actions' ); ?></div>
						
                    </tr>
<?php endwhile; ?>
<?php do_action( 'bp_after_directory_members_list' ); ?> 
<?php bp_member_hidden_fields(); ?>
 
<?php else: ?>
 
   <div id="message" class="info">
      <p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
   </div>
 
<?php endif; ?>
                    
                 
                    

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Serial Number</th>
                        <th>Username</th>
                        <th>Last active</th>
                        <th>Primetime Bucks</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

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