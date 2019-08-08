<?php 
/*
Template Name: Client Template Default Dashboard
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
	echo do_shortcode('[login-form]');?>
	<a class="fp" href="<?php echo get_bloginfo('url') ?>/forgot-password/">Forgot password? Click here</a>
</div>
<?php
} 
else if ($admincheck == 'client' || $admincheck == 'administrator' ) {
get_sidebar('client');
?>

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-2">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Users Online</h5>
							</div>
							<div class="ibox-content">
								<h1 class="no-margins"></h1>
								<div class="stat-percent font-bold text-success"> <i class="fa fa-bolt"></i></div>
								<small>Users</small>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Registered Users</h5>
							</div>
							<div class="ibox-content">
								<h1 class="no-margins"> <?php $users_count = count( get_users( array( 'fields' => array( 'ID' ), 'role' => 'user' ) ) ); echo $users_count; ?></h1>
								<div class="stat-percent font-bold text-success"> <i class="fa fa-bolt"></i></div>
								<small>Users</small>
							</div>
						</div>
					</div>
					
					
					
                <div class="col-lg-8">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Notifications</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                   		<thead>
	                   		<tr>
		                        <th>S No.</th>
		                        <th>Date</th>
		                        <th>Subject</th>
								<th>Message</th>
		                        
							</tr>
						</thead>
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

						if ( $query->have_posts() ) { 
						while ( $query->have_posts() ) : $query->the_post();
						$i++;
						?>
									<tr> 
										<td><?php echo $i; ?></td>
										<td><?php the_field('date'); ?></td>
										<td><?php the_field('description'); ?></td>
										<td><?php the_field('message'); ?></td>
		

									</tr>
							<?php endwhile; ?>
							
						</tbody>
						
                    </table>
                    <?php //pass in the max_num_pages, which is total pages ?>
                        <div class="pagenav">
                        <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                        <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                        </div>
                        
                        <?php } 
                        else{
                        ?>
                                <tr> 
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
						</table>
                        <?php
                        }
                        ?>
                        
                        <?php //reset the following that was set above prior to loop
                        $query = null; $query = $temp; ?>
                        </div>
					</div>
                </div>
            </div>
                
                <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Upcoming Events</h5>
                    </div>
                    <div class="ibox-content">
						<div class="table-responsive">
		                     <table class="table table-striped table-bordered table-hover dataTables-example" >
								<thead>
									<tr>
                                        <th>S No.</th>
                                        <th>Event Name</th>
                                        <th>Date</th>	                        
									</tr>
								</thead>
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
                        $query -> query('post_type=events&posts_per_page=10'.'&paged='.$paged);
                        
                        if ( $query->have_posts() ) : 
                        while ( $query->have_posts() ) : $query->the_post();
                        $i++;
                        ?>
                            <tr> 
                                <td><?php echo $i ?></td>
                                <td><?php the_title(); ?></td>
                                <td><?php the_field('date'); ?>/ <?php the_field('month'); ?> / <?php the_field('year'); ?></td>
                                
                                
                            
                            </tr>
                        <?php endwhile;?>
                        
                        </tbody>
                        <tfoot>
	                   		<tr>
		                        <th>S No.</th>
                                <th>Event Name</th>
                                <th>Date</th>
							</tr>
						</tfoot>
						</table>
                        
                        <?php //pass in the max_num_pages, which is total pages ?>
                        <div class="pagenav">
                        <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                        <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                        </div>
                        
                        <?php endif; ?>
                        
                        <?php //reset the following that was set above prior to loop
                        $query = null; $query = $temp; ?>
                   		</div>
					</div>
                </div>
            </div>
				<div class="col-lg-8">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Recent Transactions</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-wrench"></i>
									</a>
									<ul class="dropdown-menu dropdown-user">
										<li><a href="#" class="dropdown-item">Config option 1</a>
										</li>
										<li><a href="#" class="dropdown-item">Config option 2</a>
										</li>
									</ul>
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
												<th>S No.</th>
												<th>Description</th>
												<th>Amount</th>
												<th>Date & Time</th>
											</tr>
										</thead>
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
                                            $query -> query('post_type=transactions&posts_per_page=10'.'&paged='.$paged);
                                            
                                            if ( $query->have_posts() ) { 
                                            while ( $query->have_posts() ) : $query->the_post();
                                            $i++;
                                            ?>
                                            <tr> 
                                                <td><?php echo $i ?></td>
                                                <td><?php the_content(); ?></td>
                                                <td><?php the_field('amount'); ?></td>
                                                <td><?php the_field('time'); ?></td>
                                            </tr>
                                            
                                            <?php endwhile;?>
                                            
                                            </tbody>
                                            
                                            </table>
                                            
                                            <?php //pass in the max_num_pages, which is total pages ?>
                                            <div class="pagenav">
                                            <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                                            <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                                            </div>
                                            
                                             <?php } 
                                                else{
                                                ?>
                                                        <tr> 
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    </tbody>
                            					</table>
                                                <?php
                                                }
                                                    ?>
                                            
                                            <?php //reset the following that was set above prior to loop
                                            $query = null; $query = $temp; ?>




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