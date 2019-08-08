<?php 
/*
Template Name: User Home 
*/
get_header();

get_sidebar('left');
?>

	<div class="col-md-6 col-sm-6 col-12 p-0">
		<div class="main-content support frontline text-left mt-3">
			<h4 class="">My Dashboard</h4>
		</div>
	<hr class="thick tour mb-4">
		<div class="main-content frontline">
			<div class="leader-brd">
				<h3 class="mb-0">Welcome 
				<?php global $user_login; // If user is already logged in.
				if ( is_user_logged_in() ) : echo $user_login;  endif; ?>
                </h3>
			</div>
		</div>
	<div class="">
		<table class="table cashflow mt-0">
			<tbody>
				<tr>
					<td style="width: 75%;">
					Prime Cash<br><strong>$0.00</strong>
					</td>
					<td>
					<div class="deposit-cash"><a href="JavaScript:void(0);">Deposit Cash</a></div>
					</td>
					</tr>
					<tr>
					<td style="width: 75%;">
					Primetime Bucks<br><strong><?php $useri = bp_loggedin_user_id();
							$bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri); 
							echo $bpct; ?></strong>
					</td>
					<td>
					<div class="deposit-cash"><a id="modal-509828" href="#modal-container-509823" role="button" data-toggle="modal">Deposit Credits</a></div>
					</td>
					</tr>
					<tr>
					<td style="width: 75%;">
					Prime Membership<br>Inactive
					</td>
					<td>
					<div class="deposit-cash"><a href="JavaScript:void(0);">Add Frame</a></div>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="main-content frontline">
			<div class="leader-brd">
				<h3 class="mb-0">Recent Notification</h3>
			</div>
		</div>
	<table class="table cashflow mt-0">
		<tbody>
		    <?php 
                    $i = "0"; 
                    //get the current page
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    
                    //pagination fixes prior to loop
                    $temp =  $query;
                    $query = null;
                    
                    //custom loop using WP_Query
                    $query = new WP_Query( array( 
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC' 
                    ) ); 
                    
                    //set our query's pagination to $paged
                    $query -> query('post_type=notifications&posts_per_page=10'.'&paged='.$paged);
                    
                    if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post();
                    $i++;
                    $verify = get_field('userid');
                    $user = get_current_user_id();
                    if ($user == $verify) {
                    ?>
                    <tr>
                        <td style="width: 100%;"><?php the_field('message'); ?></td>
                    </tr>
                    <?php   }else{}endwhile; ?>
                    <?php //pass in the max_num_pages, which is total pages ?>
                    <div class="pagenav">
                    <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                    <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                    </div>
                    
                    <?php endif; ?>
                    
                    <?php //reset the following that was set above prior to loop
                    $query = null; $query = $temp; ?>
			
			
		</tbody>
	</table>
		<div class="main-content frontline">
			<div class="leader-brd">
				<h3 class="mb-0">Recent Invites</h3>
			</div>
		</div>
	<table class="table cashflow mt-0 invitestable">
		<tbody>
                        <?php 
                                    $i = "0"; 
                                    //get the current page
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    
                                    //pagination fixes prior to loop
                                    $temp =  $query;
                                    $query = null;
                                    
                                    //custom loop using WP_Query
                                    $query = new WP_Query( array( 
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'ASC' 
                                    ) ); 
                                    
                                    //set our query's pagination to $paged
                                  
                                    $loop = new WP_Query( array( 'post_type' => 'notices', 'paged' => $paged) );
                                    if ( $loop->have_posts() ) :
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $i++;
                                    
                                    
                                    global $current_user;
                                    get_currentuserinfo();
                                    $email =  $current_user->user_email;
                                    
                                    global $user_login;
                                    
                                    $user = get_field('user');
                                    
                                    if ($user == $email || $user == $user_login )
                                    {
                                     ?>
                                            <tr>
                                				<td style="width: 75%;"><?php the_content(); ?>
                                				</td>
                                				<td>
                                				<div class="deposit-cash"></div><?php the_field('time');  ?>
                                				</td>
                                			</tr>
                                     
                                     <?
                                    }
                                    endwhile; 
                                    endif;  
                                    $query = null; $query = $temp; 
                                ?>
		</tbody>
	</table>
  </div>
</div>

<?php 
get_sidebar('right');
get_footer();
?>

