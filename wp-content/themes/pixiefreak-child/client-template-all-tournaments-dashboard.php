<?php 
/*
Template Name: Client Template All Tournaments List Dashboard
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
                    <h2>Tournaments</h2>
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
                        <h5>All Tournaments</h5>
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
		                        <th>Tournament name</th>
		                        <th>Tournament ID</th>
								<th>Tournament Price</th>
		                        <th>Platform</th>
		                        <th>Game</th>
		                        <th>Registration open date</th>
								<th>Registration close date</th>
								<th>Tournament Start date</th>
								<th>Tournament End date</th>
								<th>Tournament Type</th>
								<th>Bracket Type</th>
								<th>Brackets</th>
								<th>Edit Tournament</th>
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
						$query -> query('post_type=tournaments&posts_per_page=10'.'&paged='.$paged);

						if ( $query->have_posts() ) : 
						while ( $query->have_posts() ) : $query->the_post();
						$i++;
						?>
									<tr> 
										<td>1</td>
										<td><?php the_title(); ?></td>
										<td><?php the_field('tournament_id'); ?></td>
										<td><?php the_field('tournament_price'); ?></td>
										<td><?php the_field('platform'); ?></td>
										<td><?php the_field('game'); ?></td>
										<td><?php the_field('registration_open_date'); ?></td>
										<td><?php the_field('registration_close_date_'); ?></td>
										<td><?php the_field('Tournament Start date'); ?></td>
										<td><?php the_field('Tournament End date'); ?></td>
										<td><?php the_field('tournament_type'); ?></td>
										<td><?php the_field('bracket_type'); ?></td>
										<td><?php the_field('brackets'); ?></td>
										<td>
										    <form action="/edit-tournament" method="post">
										        <input type="text" name="postid"                    class="hide" value="<?php echo $post->ID; ?>">
										        <input type="text" name="oldtitle"                     class="hide" value="<?php the_title(); ?>">
										        <input type="text" name="price"                     class="hide" value="<?php the_field('tournament_price'); ?>">
										        <input type="text" name="platform"                  class="hide" value="<?php the_field('platform'); ?>">
										        <input type="text" name="game"                      class="hide" value="<?php the_field('game'); ?>">
										        <input type="text" name="Registeration_Start_Date"  class="hide" value="<?php the_field('registration_open_date'); ?>">
										        <input type="text" name="Registeration_Close_Date"  class="hide" value="<?php the_field('registration_close_date_'); ?>">
										        <input type="text" name="Tournament_Start_Date"     class="hide" value="<?php the_field('Tournament Start date'); ?>">
										        <input type="text" name="Tournament_Close_Date"     class="hide" value="<?php the_field('Tournament End date'); ?>">
										        <input type="text" name="prizepool"                 class="hide" value="<?php the_field('prizepool'); ?>">
										        <input type="text" name="firstprize"                class="hide" value="<?php the_field('prizeone'); ?>">
										        <input type="text" name="secondprize"               class="hide" value="<?php the_field('prizetwo'); ?>">
										        <input type="text" name="thirdprize"                class="hide" value="<?php the_field('prizethree'); ?>">
										        <input type="text" name="prizethumb"                class="hide" value="<?php the_field('prizeimage'); ?>">
										        <input type="text" name="bracket_type"              class="hide" value="<?php the_field('bracket_type'); ?>">
										        <input type="text" name="description"               class="hide" value="<?php the_field('brackets'); ?>">
										        <input type="submit" value="Edit Tournament">
										    </form>
										</td>

									</tr>
							<?php endwhile; ?>
							
						</tbody>
						<tfoot>
	                   		<tr>
		                        <th>S No.</th>
		                        <th>Tournament name</th>
		                        <th>Tournament ID</th>
								<th>Tournament Price</th>
		                        <th>Platform</th>
		                        <th>Game</th>
		                        <th>Registration open date</th>
								<th>Registration close date</th>
								<th>Tournament Start date</th>
								<th>Tournament End date</th>
								<th>Tournament Type</th>
								<th>Bracket Type</th>
								<th>Brackets</th>
								<th>Edit Tournament</th>
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