<?php 
/*
Template Name: Client Template Notifications
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
                    <h2>Notifications</h2>
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
                        <h5>All Notifications</h5>
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
						<tfoot>
	                   		<tr>
		                        <th>S No.</th>
		                        <th>Date</th>
		                        <th>Subject</th>
								<th>Message</th>
		                        
							</tr>
						</tfoot>
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