<?php 
/*
Template Name: All Brackets
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
                    <h2>View and Adjust Tournament Brackets</h2>
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
                        <h5>All Tournaments Brackets</h5>
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
		                        <th>Title</th>
		                        <th>Total Players</th>
								<th>game</th>
								<th>Make Changes</th>
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
						$query -> query('post_type=bracket&posts_per_page=10'.'&paged='.$paged);

						if ( $query->have_posts() ) : 
						while ( $query->have_posts() ) : $query->the_post();
						$i++;
						?>
									<tr> 
										<td><?php echo $i; ?></td>
										<td><?php the_title(); ?></td>
										<td><?php the_field('totalplayers'); ?></td>
										<td><?php the_field('game'); ?></td>
										
										<td>
										    <form action="/edit-bracket" method="post">
										        <input type="text" placeholder="bracket 1 player" name="id" class="hide" value="<?php echo $post->ID; ?>">
										        <input type="text" placeholder="bracket 1 player" name="bracket1player" class="hide" value="<?php the_field('bracket1player'); ?>">
                                                <input type="text" placeholder="bracket 2 player" name="bracket2player" class="hide" value="<?php the_field('bracket2player'); ?>">
                                                <input type="text" placeholder="bracket 3 player" name="bracket3player" class="hide" value="<?php the_field('bracket3player'); ?>">
                                                <input type="text" placeholder="bracket 4 player" name="bracket4player" class="hide" value="<?php the_field('bracket4player'); ?>">
                                                <input type="text" placeholder="bracket 5 player" name="bracket5player" class="hide" value="<?php the_field('bracket5player'); ?>">
                                                <input type="text" placeholder="bracket 6 player" name="bracket6player" class="hide" value="<?php the_field('bracket6player'); ?>">
                                                <input type="text" placeholder="bracket 7 player" name="bracket7player" class="hide" value="<?php the_field('bracket7player'); ?>">
                                                <input type="text" placeholder="bracket 8 player" name="bracket8player" class="hide" value="<?php the_field('bracket8player'); ?>">
                                                <input type="text" placeholder="bracket 9 player" name="bracket9player" class="hide" value="<?php the_field('bracket9player'); ?>">
                                                <input type="text" placeholder="bracket 10 player" name="bracket10player" class="hide" value="<?php the_field('bracket10player'); ?>">
                                                <input type="text" placeholder="bracket 11 player" name="bracket11player" class="hide" value="<?php the_field('bracket11player'); ?>">
                                                <input type="text" placeholder="bracket 12 player" name="bracket12player" class="hide" value="<?php the_field('bracket12player'); ?>">
                                                <input type="text" placeholder="bracket 13 player" name="bracket13player" class="hide" value="<?php the_field('bracket13player'); ?>">
                                                <input type="text" placeholder="bracket 14 player" name="bracket14player" class="hide" value="<?php the_field('bracket14player'); ?>">
                                                <input type="text" placeholder="bracket 15 player" name="bracket15player" class="hide" value="<?php the_field('bracket15player'); ?>">
                                                <input type="text" placeholder="bracket 16 player" name="bracket16player" class="hide" value="<?php the_field('bracket16player'); ?>">
                                                <input type="text" placeholder="bracket 17 player" name="bracket17player" class="hide" value="<?php the_field('bracket17player'); ?>">
                                                <input type="text" placeholder="bracket 18 player" name="bracket18player" class="hide" value="<?php the_field('bracket18player'); ?>">
                                                <input type="text" placeholder="bracket 19 player" name="bracket19player" class="hide" value="<?php the_field('bracket19player'); ?>">
                                                <input type="text" placeholder="bracket 20 player" name="bracket20player" class="hide" value="<?php the_field('bracket20player'); ?>">
                                                <input type="text" placeholder="bracket 21 player" name="bracket21player" class="hide" value="<?php the_field('bracket21player'); ?>">
                                                <input type="text" placeholder="bracket 22 player" name="bracket22player" class="hide" value="<?php the_field('bracket22player'); ?>">
                                                <input type="text" placeholder="bracket 23 player" name="bracket23player" class="hide" value="<?php the_field('bracket23player'); ?>">
                                                <input type="text" placeholder="bracket 24 player" name="bracket24player" class="hide" value="<?php the_field('bracket24player'); ?>">
                                                <input type="text" placeholder="bracket 25 player" name="bracket25player" class="hide" value="<?php the_field('bracket25player'); ?>">
                                                <input type="text" placeholder="bracket 26 player" name="bracket26player" class="hide" value="<?php the_field('bracket26player'); ?>">
                                                <input type="text" placeholder="bracket 27 player" name="bracket27player" class="hide" value="<?php the_field('bracket27player'); ?>">
                                                <input type="text" placeholder="bracket 28 player" name="bracket28player" class="hide" value="<?php the_field('bracket28player'); ?>">
                                                <input type="text" placeholder="bracket 29 player" name="bracket29player" class="hide" value="<?php the_field('bracket29player'); ?>">
                                                <input type="text" placeholder="bracket 30 player" name="bracket30player" class="hide" value="<?php the_field('bracket30player'); ?>">
                                                <input type="text" placeholder="bracket 31 player" name="bracket31player" class="hide" value="<?php the_field('bracket31player'); ?>">
                                                <input type="text" placeholder="bracket 32 player" name="bracket32player" class="hide" value="<?php the_field('bracket32player'); ?>">
                                                <input type="text" placeholder="bracket 33 player" name="bracket33player" class="hide" value="<?php the_field('bracket33player'); ?>">
                                                <input type="text" placeholder="bracket 34 player" name="bracket34player" class="hide" value="<?php the_field('bracket34player'); ?>">
                                                <input type="text" placeholder="bracket 35 player" name="bracket35player" class="hide" value="<?php the_field('bracket35player'); ?>">
                                                <input type="text" placeholder="bracket 36 player" name="bracket36player" class="hide" value="<?php the_field('bracket36player'); ?>">
                                                <input type="text" placeholder="bracket 37 player" name="bracket37player" class="hide" value="<?php the_field('bracket37player'); ?>">
                                                <input type="text" placeholder="bracket 38 player" name="bracket38player" class="hide" value="<?php the_field('bracket38player'); ?>">
                                                <input type="text" placeholder="bracket 39 player" name="bracket39player" class="hide" value="<?php the_field('bracket39player'); ?>">
                                                <input type="text" placeholder="bracket 40 player" name="bracket40player" class="hide" value="<?php the_field('bracket40player'); ?>">
                                                <input type="text" placeholder="bracket 41 player" name="bracket41player" class="hide" value="<?php the_field('bracket41player'); ?>">
                                                <input type="text" placeholder="bracket 42 player" name="bracket42player" class="hide" value="<?php the_field('bracket42player'); ?>">
                                                <input type="text" placeholder="bracket 43 player" name="bracket43player" class="hide" value="<?php the_field('bracket43player'); ?>">
                                                <input type="text" placeholder="bracket 44 player" name="bracket44player" class="hide" value="<?php the_field('bracket44player'); ?>">
                                                <input type="text" placeholder="bracket 45 player" name="bracket45player" class="hide" value="<?php the_field('bracket45player'); ?>">
                                                <input type="text" placeholder="bracket 46 player" name="bracket46player" class="hide" value="<?php the_field('bracket46player'); ?>">
                                                <input type="text" placeholder="bracket 47 player" name="bracket47player" class="hide" value="<?php the_field('bracket47player'); ?>">
                                                <input type="text" placeholder="bracket 48 player" name="bracket48player" class="hide" value="<?php the_field('bracket48player'); ?>">
                                                <input type="text" placeholder="bracket 49 player" name="bracket49player" class="hide" value="<?php the_field('bracket49player'); ?>">
                                                <input type="text" placeholder="bracket 50 player" name="bracket50player" class="hide" value="<?php the_field('bracket50player'); ?>">
                                                <input type="text" placeholder="bracket 51 player" name="bracket51player" class="hide" value="<?php the_field('bracket51player'); ?>">
                                                <input type="text" placeholder="bracket 52 player" name="bracket52player" class="hide" value="<?php the_field('bracket52player'); ?>">
                                                <input type="text" placeholder="bracket 53 player" name="bracket53player" class="hide" value="<?php the_field('bracket53player'); ?>">
                                                <input type="text" placeholder="bracket 54 player" name="bracket54player" class="hide" value="<?php the_field('bracket54player'); ?>">
                                                <input type="text" placeholder="bracket 55 player" name="bracket55player" class="hide" value="<?php the_field('bracket55player'); ?>">
                                                <input type="text" placeholder="bracket 56 player" name="bracket56player" class="hide" value="<?php the_field('bracket56player'); ?>">
                                                <input type="text" placeholder="bracket 57 player" name="bracket57player" class="hide" value="<?php the_field('bracket57player'); ?>">
                                                <input type="text" placeholder="bracket 58 player" name="bracket58player" class="hide" value="<?php the_field('bracket58player'); ?>">
                                                <input type="text" placeholder="bracket 59 player" name="bracket59player" class="hide" value="<?php the_field('bracket59player'); ?>">
                                                <input type="text" placeholder="bracket 60 player" name="bracket60player" class="hide" value="<?php the_field('bracket60player'); ?>">
                                                <input type="text" placeholder="bracket 61 player" name="bracket61player" class="hide" value="<?php the_field('bracket61player'); ?>">
                                                <input type="text" placeholder="bracket 62 player" name="bracket62player" class="hide" value="<?php the_field('bracket62player'); ?>">
                                                <input type="text" placeholder="bracket 63 player" name="bracket63player" class="hide" value="<?php the_field('bracket63player'); ?>">
                                                <input type="text" placeholder="bracket 64 player" name="bracket64player" class="hide" value="<?php the_field('bracket64player'); ?>">
                                                
                                                <input type="text" placeholder="bracket 1 result" name="bracket1result" class="hide" value="<?php the_field('bracket1result'); ?>">
                                                <input type="text" placeholder="bracket 2 result" name="bracket2result" class="hide" value="<?php the_field('bracket2result'); ?>">
                                                <input type="text" placeholder="bracket 3 result" name="bracket3result" class="hide" value="<?php the_field('bracket3result'); ?>">
                                                <input type="text" placeholder="bracket 4 result" name="bracket4result" class="hide" value="<?php the_field('bracket4result'); ?>">
                                                <input type="text" placeholder="bracket 5 result" name="bracket5result" class="hide" value="<?php the_field('bracket5result'); ?>">
                                                <input type="text" placeholder="bracket 6 result" name="bracket6result" class="hide" value="<?php the_field('bracket6result'); ?>">
                                                <input type="text" placeholder="bracket 7 result" name="bracket7result" class="hide" value="<?php the_field('bracket7result'); ?>">
                                                <input type="text" placeholder="bracket 8 result" name="bracket8result" class="hide" value="<?php the_field('bracket8result'); ?>">
                                                <input type="text" placeholder="bracket 9 result" name="bracket9result" class="hide" value="<?php the_field('bracket9result'); ?>">
                                                <input type="text" placeholder="bracket 10 result" name="bracket10result" class="hide" value="<?php the_field('bracket10result'); ?>">
                                                <input type="text" placeholder="bracket 11 result" name="bracket11result" class="hide" value="<?php the_field('bracket11result'); ?>">
                                                <input type="text" placeholder="bracket 12 result" name="bracket12result" class="hide" value="<?php the_field('bracket12result'); ?>">
                                                <input type="text" placeholder="bracket 13 result" name="bracket13result" class="hide" value="<?php the_field('bracket13result'); ?>">
                                                <input type="text" placeholder="bracket 14 result" name="bracket14result" class="hide" value="<?php the_field('bracket14result'); ?>">
                                                <input type="text" placeholder="bracket 15 result" name="bracket15result" class="hide" value="<?php the_field('bracket15result'); ?>">
                                                <input type="text" placeholder="bracket 16 result" name="bracket16result" class="hide" value="<?php the_field('bracket16result'); ?>">
                                                <input type="text" placeholder="bracket 17 result" name="bracket17result" class="hide" value="<?php the_field('bracket17result'); ?>">
                                                <input type="text" placeholder="bracket 18 result" name="bracket18result" class="hide" value="<?php the_field('bracket18result'); ?>">
                                                <input type="text" placeholder="bracket 19 result" name="bracket19result" class="hide" value="<?php the_field('bracket19result'); ?>">
                                                <input type="text" placeholder="bracket 20 result" name="bracket20result" class="hide" value="<?php the_field('bracket20result'); ?>">
                                                <input type="text" placeholder="bracket 21 result" name="bracket21result" class="hide" value="<?php the_field('bracket21result'); ?>">
                                                <input type="text" placeholder="bracket 22 result" name="bracket22result" class="hide" value="<?php the_field('bracket22result'); ?>">
                                                <input type="text" placeholder="bracket 23 result" name="bracket23result" class="hide" value="<?php the_field('bracket23result'); ?>">
                                                <input type="text" placeholder="bracket 24 result" name="bracket24result" class="hide" value="<?php the_field('bracket24result'); ?>">
                                                <input type="text" placeholder="bracket 25 result" name="bracket25result" class="hide" value="<?php the_field('bracket25result'); ?>">
                                                <input type="text" placeholder="bracket 26 result" name="bracket26result" class="hide" value="<?php the_field('bracket26result'); ?>">
                                                <input type="text" placeholder="bracket 27 result" name="bracket27result" class="hide" value="<?php the_field('bracket27result'); ?>">
                                                <input type="text" placeholder="bracket 28 result" name="bracket28result" class="hide" value="<?php the_field('bracket28result'); ?>">
                                                <input type="text" placeholder="bracket 29 result" name="bracket29result" class="hide" value="<?php the_field('bracket29result'); ?>">
                                                <input type="text" placeholder="bracket 30 result" name="bracket30result" class="hide" value="<?php the_field('bracket30result'); ?>">
                                                <input type="text" placeholder="bracket 31 result" name="bracket31result" class="hide" value="<?php the_field('bracket31result'); ?>">
                                                <input type="text" placeholder="bracket 32 result" name="bracket32result" class="hide" value="<?php the_field('bracket32result'); ?>">
                                                <input type="text" placeholder="bracket 33 result" name="bracket33result" class="hide" value="<?php the_field('bracket33result'); ?>">
                                                <input type="text" placeholder="bracket 34 result" name="bracket34result" class="hide" value="<?php the_field('bracket34result'); ?>">
                                                <input type="text" placeholder="bracket 35 result" name="bracket35result" class="hide" value="<?php the_field('bracket35result'); ?>">
                                                <input type="text" placeholder="bracket 36 result" name="bracket36result" class="hide" value="<?php the_field('bracket36result'); ?>">
                                                <input type="text" placeholder="bracket 37 result" name="bracket37result" class="hide" value="<?php the_field('bracket37result'); ?>">
                                                <input type="text" placeholder="bracket 38 result" name="bracket38result" class="hide" value="<?php the_field('bracket38result'); ?>">
                                                <input type="text" placeholder="bracket 39 result" name="bracket39result" class="hide" value="<?php the_field('bracket39result'); ?>">
                                                <input type="text" placeholder="bracket 40 result" name="bracket40result" class="hide" value="<?php the_field('bracket40result'); ?>">
                                                <input type="text" placeholder="bracket 41 result" name="bracket41result" class="hide" value="<?php the_field('bracket41result'); ?>">
                                                <input type="text" placeholder="bracket 42 result" name="bracket42result" class="hide" value="<?php the_field('bracket42result'); ?>">
                                                <input type="text" placeholder="bracket 43 result" name="bracket43result" class="hide" value="<?php the_field('bracket43result'); ?>">
                                                <input type="text" placeholder="bracket 44 result" name="bracket44result" class="hide" value="<?php the_field('bracket44result'); ?>">
                                                <input type="text" placeholder="bracket 45 result" name="bracket45result" class="hide" value="<?php the_field('bracket45result'); ?>">
                                                <input type="text" placeholder="bracket 46 result" name="bracket46result" class="hide" value="<?php the_field('bracket46result'); ?>">
                                                <input type="text" placeholder="bracket 47 result" name="bracket47result" class="hide" value="<?php the_field('bracket47result'); ?>">
                                                <input type="text" placeholder="bracket 48 result" name="bracket48result" class="hide" value="<?php the_field('bracket48result'); ?>">
                                                <input type="text" placeholder="bracket 49 result" name="bracket49result" class="hide" value="<?php the_field('bracket49result'); ?>">
                                                <input type="text" placeholder="bracket 50 result" name="bracket50result" class="hide" value="<?php the_field('bracket50result'); ?>">
                                                <input type="text" placeholder="bracket 51 result" name="bracket51result" class="hide" value="<?php the_field('bracket51result'); ?>">
                                                <input type="text" placeholder="bracket 52 result" name="bracket52result" class="hide" value="<?php the_field('bracket52result'); ?>">
                                                <input type="text" placeholder="bracket 53 result" name="bracket53result" class="hide" value="<?php the_field('bracket53result'); ?>">
                                                <input type="text" placeholder="bracket 54 result" name="bracket54result" class="hide" value="<?php the_field('bracket54result'); ?>">
                                                <input type="text" placeholder="bracket 55 result" name="bracket55result" class="hide" value="<?php the_field('bracket55result'); ?>">
                                                <input type="text" placeholder="bracket 56 result" name="bracket56result" class="hide" value="<?php the_field('bracket56result'); ?>">
                                                <input type="text" placeholder="bracket 57 result" name="bracket57result" class="hide" value="<?php the_field('bracket57result'); ?>">
                                                <input type="text" placeholder="bracket 58 result" name="bracket58result" class="hide" value="<?php the_field('bracket58result'); ?>">
                                                <input type="text" placeholder="bracket 59 result" name="bracket59result" class="hide" value="<?php the_field('bracket59result'); ?>">
                                                <input type="text" placeholder="bracket 60 result" name="bracket60result" class="hide" value="<?php the_field('bracket60result'); ?>">
                                                <input type="text" placeholder="bracket 61 result" name="bracket61result" class="hide" value="<?php the_field('bracket61result'); ?>">
                                                <input type="text" placeholder="bracket 62 result" name="bracket62result" class="hide" value="<?php the_field('bracket62result'); ?>">
                                                <input type="text" placeholder="bracket 63 result" name="bracket63result" class="hide" value="<?php the_field('bracket63result'); ?>">
                                                <input type="text" placeholder="bracket 64 result" name="bracket64result" class="hide" value="<?php the_field('bracket64result'); ?>">
                                                                                                
                                                
                                                
                                                
                                                <input type="text" placeholder="2bracket 1 player" name="2bracket1player" class="hide" value="<?php the_field('2bracket1player'); ?>">
                                                <input type="text" placeholder="2bracket 2 player" name="2bracket2player" class="hide" value="<?php the_field('2bracket2player'); ?>">
                                                <input type="text" placeholder="2bracket 3 player" name="2bracket3player" class="hide" value="<?php the_field('2bracket3player'); ?>">
                                                <input type="text" placeholder="2bracket 4 player" name="2bracket4player" class="hide" value="<?php the_field('2bracket4player'); ?>">
                                                <input type="text" placeholder="2bracket 5 player" name="2bracket5player" class="hide" value="<?php the_field('2bracket5player'); ?>">
                                                <input type="text" placeholder="2bracket 6 player" name="2bracket6player" class="hide" value="<?php the_field('2bracket6player'); ?>">
                                                <input type="text" placeholder="2bracket 7 player" name="2bracket7player" class="hide" value="<?php the_field('2bracket7player'); ?>">
                                                <input type="text" placeholder="2bracket 8 player" name="2bracket8player" class="hide" value="<?php the_field('2bracket8player'); ?>">
                                                <input type="text" placeholder="2bracket 9 player" name="2bracket9player" class="hide" value="<?php the_field('2bracket9player'); ?>">
                                                <input type="text" placeholder="2bracket 10 player" name="2bracket10player" class="hide" value="<?php the_field('2bracket10player'); ?>">
                                                <input type="text" placeholder="2bracket 11 player" name="2bracket11player" class="hide" value="<?php the_field('2bracket11player'); ?>">
                                                <input type="text" placeholder="2bracket 12 player" name="2bracket12player" class="hide" value="<?php the_field('2bracket12player'); ?>">
                                                <input type="text" placeholder="2bracket 13 player" name="2bracket13player" class="hide" value="<?php the_field('2bracket13player'); ?>">
                                                <input type="text" placeholder="2bracket 14 player" name="2bracket14player" class="hide" value="<?php the_field('2bracket14player'); ?>">
                                                <input type="text" placeholder="2bracket 15 player" name="2bracket15player" class="hide" value="<?php the_field('2bracket15player'); ?>">
                                                <input type="text" placeholder="2bracket 16 player" name="2bracket16player" class="hide" value="<?php the_field('2bracket16player'); ?>">
                                                <input type="text" placeholder="2bracket 17 player" name="2bracket17player" class="hide" value="<?php the_field('2bracket17player'); ?>">
                                                <input type="text" placeholder="2bracket 18 player" name="2bracket18player" class="hide" value="<?php the_field('2bracket18player'); ?>">
                                                <input type="text" placeholder="2bracket 19 player" name="2bracket19player" class="hide" value="<?php the_field('2bracket19player'); ?>">
                                                <input type="text" placeholder="2bracket 20 player" name="2bracket20player" class="hide" value="<?php the_field('2bracket20player'); ?>">
                                                <input type="text" placeholder="2bracket 21 player" name="2bracket21player" class="hide" value="<?php the_field('2bracket21player'); ?>">
                                                <input type="text" placeholder="2bracket 22 player" name="2bracket22player" class="hide" value="<?php the_field('2bracket22player'); ?>">
                                                <input type="text" placeholder="2bracket 23 player" name="2bracket23player" class="hide" value="<?php the_field('2bracket23player'); ?>">
                                                <input type="text" placeholder="2bracket 24 player" name="2bracket24player" class="hide" value="<?php the_field('2bracket24player'); ?>">
                                                <input type="text" placeholder="2bracket 25 player" name="2bracket25player" class="hide" value="<?php the_field('2bracket25player'); ?>">
                                                <input type="text" placeholder="2bracket 26 player" name="2bracket26player" class="hide" value="<?php the_field('2bracket26player'); ?>">
                                                <input type="text" placeholder="2bracket 27 player" name="2bracket27player" class="hide" value="<?php the_field('2bracket27player'); ?>">
                                                <input type="text" placeholder="2bracket 28 player" name="2bracket28player" class="hide" value="<?php the_field('2bracket28player'); ?>">
                                                <input type="text" placeholder="2bracket 29 player" name="2bracket29player" class="hide" value="<?php the_field('2bracket29player'); ?>">
                                                <input type="text" placeholder="2bracket 30 player" name="2bracket30player" class="hide" value="<?php the_field('2bracket30player'); ?>">
                                                <input type="text" placeholder="2bracket 31 player" name="2bracket31player" class="hide" value="<?php the_field('2bracket31player'); ?>">
                                                <input type="text" placeholder="2bracket 32 player" name="2bracket32player" class="hide" value="<?php the_field('2bracket32player'); ?>">
                                                
                                                
                                                <input type="text" placeholder="2bracket 1 result" name="2bracket1result" class="hide" value="<?php the_field('2bracket1result'); ?>">
                                                <input type="text" placeholder="2bracket 2 result" name="2bracket2result" class="hide" value="<?php the_field('2bracket2result'); ?>">
                                                <input type="text" placeholder="2bracket 3 result" name="2bracket3result" class="hide" value="<?php the_field('2bracket3result'); ?>">
                                                <input type="text" placeholder="2bracket 4 result" name="2bracket4result" class="hide" value="<?php the_field('2bracket4result'); ?>">
                                                <input type="text" placeholder="2bracket 5 result" name="2bracket5result" class="hide" value="<?php the_field('2bracket5result'); ?>">
                                                <input type="text" placeholder="2bracket 6 result" name="2bracket6result" class="hide" value="<?php the_field('2bracket6result'); ?>">
                                                <input type="text" placeholder="2bracket 7 result" name="2bracket7result" class="hide" value="<?php the_field('2bracket7result'); ?>">
                                                <input type="text" placeholder="2bracket 8 result" name="2bracket8result" class="hide" value="<?php the_field('2bracket8result'); ?>">
                                                <input type="text" placeholder="2bracket 9 result" name="2bracket9result" class="hide" value="<?php the_field('2bracket9result'); ?>">
                                                <input type="text" placeholder="2bracket 10 result" name="2bracket10result" class="hide" value="<?php the_field('2bracket10result'); ?>">
                                                <input type="text" placeholder="2bracket 11 result" name="2bracket11result" class="hide" value="<?php the_field('2bracket11result'); ?>">
                                                <input type="text" placeholder="2bracket 12 result" name="2bracket12result" class="hide" value="<?php the_field('2bracket12result'); ?>">
                                                <input type="text" placeholder="2bracket 13 result" name="2bracket13result" class="hide" value="<?php the_field('2bracket13result'); ?>">
                                                <input type="text" placeholder="2bracket 14 result" name="2bracket14result" class="hide" value="<?php the_field('2bracket14result'); ?>">
                                                <input type="text" placeholder="2bracket 15 result" name="2bracket15result" class="hide" value="<?php the_field('2bracket15result'); ?>">
                                                <input type="text" placeholder="2bracket 16 result" name="2bracket16result" class="hide" value="<?php the_field('2bracket16result'); ?>">
                                                <input type="text" placeholder="2bracket 17 result" name="2bracket17result" class="hide" value="<?php the_field('2bracket17result'); ?>">
                                                <input type="text" placeholder="2bracket 18 result" name="2bracket18result" class="hide" value="<?php the_field('2bracket18result'); ?>">
                                                <input type="text" placeholder="2bracket 19 result" name="2bracket19result" class="hide" value="<?php the_field('2bracket19result'); ?>">
                                                <input type="text" placeholder="2bracket 20 result" name="2bracket20result" class="hide" value="<?php the_field('2bracket20result'); ?>">
                                                <input type="text" placeholder="2bracket 21 result" name="2bracket21result" class="hide" value="<?php the_field('2bracket21result'); ?>">
                                                <input type="text" placeholder="2bracket 22 result" name="2bracket22result" class="hide" value="<?php the_field('2bracket22result'); ?>">
                                                <input type="text" placeholder="2bracket 23 result" name="2bracket23result" class="hide" value="<?php the_field('2bracket23result'); ?>">
                                                <input type="text" placeholder="2bracket 24 result" name="2bracket24result" class="hide" value="<?php the_field('2bracket24result'); ?>">
                                                <input type="text" placeholder="2bracket 25 result" name="2bracket25result" class="hide" value="<?php the_field('2bracket25result'); ?>">
                                                <input type="text" placeholder="2bracket 26 result" name="2bracket26result" class="hide" value="<?php the_field('2bracket26result'); ?>">
                                                <input type="text" placeholder="2bracket 27 result" name="2bracket27result" class="hide" value="<?php the_field('2bracket27result'); ?>">
                                                <input type="text" placeholder="2bracket 28 result" name="2bracket28result" class="hide" value="<?php the_field('2bracket28result'); ?>">
                                                <input type="text" placeholder="2bracket 29 result" name="2bracket29result" class="hide" value="<?php the_field('2bracket29result'); ?>">
                                                <input type="text" placeholder="2bracket 30 result" name="2bracket30result" class="hide" value="<?php the_field('2bracket30result'); ?>">
                                                <input type="text" placeholder="2bracket 31 result" name="2bracket31result" class="hide" value="<?php the_field('2bracket31result'); ?>">
                                                <input type="text" placeholder="2bracket 32 result" name="2bracket32result" class="hide" value="<?php the_field('2bracket32result'); ?>">
                                                
                                                <input type="text" placeholder="3bracket 1 player" name="3bracket1player" class="hide" value="<?php the_field('3bracket1player'); ?>">
                                                <input type="text" placeholder="3bracket 2 player" name="3bracket2player" class="hide" value="<?php the_field('3bracket2player'); ?>">
                                                <input type="text" placeholder="3bracket 3 player" name="3bracket3player" class="hide" value="<?php the_field('3bracket3player'); ?>">
                                                <input type="text" placeholder="3bracket 4 player" name="3bracket4player" class="hide" value="<?php the_field('3bracket4player'); ?>">
                                                <input type="text" placeholder="3bracket 5 player" name="3bracket5player" class="hide" value="<?php the_field('3bracket5player'); ?>">
                                                <input type="text" placeholder="3bracket 6 player" name="3bracket6player" class="hide" value="<?php the_field('3bracket6player'); ?>">
                                                <input type="text" placeholder="3bracket 7 player" name="3bracket7player" class="hide" value="<?php the_field('3bracket7player'); ?>">
                                                <input type="text" placeholder="3bracket 8 player" name="3bracket8player" class="hide" value="<?php the_field('3bracket8player'); ?>">
                                                <input type="text" placeholder="3bracket 9 player" name="3bracket9player" class="hide" value="<?php the_field('3bracket9player'); ?>">
                                                <input type="text" placeholder="3bracket 10 player" name="3bracket10player" class="hide" value="<?php the_field('3bracket10player'); ?>">
                                                <input type="text" placeholder="3bracket 11 player" name="3bracket11player" class="hide" value="<?php the_field('3bracket11player'); ?>">
                                                <input type="text" placeholder="3bracket 12 player" name="3bracket12player" class="hide" value="<?php the_field('3bracket12player'); ?>">
                                                <input type="text" placeholder="3bracket 13 player" name="3bracket13player" class="hide" value="<?php the_field('3bracket13player'); ?>">
                                                <input type="text" placeholder="3bracket 14 player" name="3bracket14player" class="hide" value="<?php the_field('3bracket14player'); ?>">
                                                <input type="text" placeholder="3bracket 15 player" name="3bracket15player" class="hide" value="<?php the_field('3bracket15player'); ?>">
                                                <input type="text" placeholder="3bracket 16 player" name="3bracket16player" class="hide" value="<?php the_field('3bracket16player'); ?>">
                                                
                                                <input type="text" placeholder="3bracket 1 result" name="3bracket1result" class="hide" value="<?php the_field('3bracket1result'); ?>">
                                                <input type="text" placeholder="3bracket 2 result" name="3bracket2result" class="hide" value="<?php the_field('3bracket2result'); ?>">
                                                <input type="text" placeholder="3bracket 3 result" name="3bracket3result" class="hide" value="<?php the_field('3bracket3result'); ?>">
                                                <input type="text" placeholder="3bracket 4 result" name="3bracket4result" class="hide" value="<?php the_field('3bracket4result'); ?>">
                                                <input type="text" placeholder="3bracket 5 result" name="3bracket5result" class="hide" value="<?php the_field('3bracket5result'); ?>">
                                                <input type="text" placeholder="3bracket 6 result" name="3bracket6result" class="hide" value="<?php the_field('3bracket6result'); ?>">
                                                <input type="text" placeholder="3bracket 7 result" name="3bracket7result" class="hide" value="<?php the_field('3bracket7result'); ?>">
                                                <input type="text" placeholder="3bracket 8 result" name="3bracket8result" class="hide" value="<?php the_field('3bracket8result'); ?>">
                                                <input type="text" placeholder="3bracket 9 result" name="3bracket9result" class="hide" value="<?php the_field('3bracket9result'); ?>">
                                                <input type="text" placeholder="3bracket 10 result" name="3bracket10result" class="hide" value="<?php the_field('3bracket10result'); ?>">
                                                <input type="text" placeholder="3bracket 11 result" name="3bracket11result" class="hide" value="<?php the_field('3bracket11result'); ?>">
                                                <input type="text" placeholder="3bracket 12 result" name="3bracket12result" class="hide" value="<?php the_field('3bracket12result'); ?>">
                                                <input type="text" placeholder="3bracket 13 result" name="3bracket13result" class="hide" value="<?php the_field('3bracket13result'); ?>">
                                                <input type="text" placeholder="3bracket 14 result" name="3bracket14result" class="hide" value="<?php the_field('3bracket14result'); ?>">
                                                <input type="text" placeholder="3bracket 15 result" name="3bracket15result" class="hide" value="<?php the_field('3bracket15result'); ?>">
                                                <input type="text" placeholder="3bracket 16 result" name="3bracket16result" class="hide" value="<?php the_field('3bracket16result'); ?>">
                                                
                                                
                                                <input type="text" placeholder="4bracket 1 player" name="4bracket1player" class="hide" value="<?php the_field('4bracket1player'); ?>">
                                                <input type="text" placeholder="4bracket 2 player" name="4bracket2player" class="hide" value="<?php the_field('4bracket2player'); ?>">
                                                <input type="text" placeholder="4bracket 3 player" name="4bracket3player" class="hide" value="<?php the_field('4bracket3player'); ?>">
                                                <input type="text" placeholder="4bracket 4 player" name="4bracket4player" class="hide" value="<?php the_field('4bracket4player'); ?>">
                                                <input type="text" placeholder="4bracket 5 player" name="4bracket5player" class="hide" value="<?php the_field('4bracket5player'); ?>">
                                                <input type="text" placeholder="4bracket 6 player" name="4bracket6player" class="hide" value="<?php the_field('4bracket6player'); ?>">
                                                <input type="text" placeholder="4bracket 7 player" name="4bracket7player" class="hide" value="<?php the_field('4bracket7player'); ?>">
                                                <input type="text" placeholder="4bracket 8 player" name="4bracket8player" class="hide" value="<?php the_field('4bracket8player'); ?>">
                                                
                                                <input type="text" placeholder="4bracket 1 result" name="4bracket1result" class="hide" value="<?php the_field('4bracket1result'); ?>">
                                                <input type="text" placeholder="4bracket 2 result" name="4bracket2result" class="hide" value="<?php the_field('4bracket2result'); ?>">
                                                <input type="text" placeholder="4bracket 3 result" name="4bracket3result" class="hide" value="<?php the_field('4bracket3result'); ?>">
                                                <input type="text" placeholder="4bracket 4 result" name="4bracket4result" class="hide" value="<?php the_field('4bracket4result'); ?>">
                                                <input type="text" placeholder="4bracket 5 result" name="4bracket5result" class="hide" value="<?php the_field('4bracket5result'); ?>">
                                                <input type="text" placeholder="4bracket 6 result" name="4bracket6result" class="hide" value="<?php the_field('4bracket6result'); ?>">
                                                <input type="text" placeholder="4bracket 7 result" name="4bracket7result" class="hide" value="<?php the_field('4bracket7result'); ?>">
                                                <input type="text" placeholder="4bracket 8 result" name="4bracket8result" class="hide" value="<?php the_field('4bracket8result'); ?>">
                                                
                                                <input type="text" placeholder="5bracket 1 player" name="5bracket1player" class="hide" value="<?php the_field('5bracket1player'); ?>">
                                                <input type="text" placeholder="5bracket 2 player" name="5bracket2player" class="hide" value="<?php the_field('5bracket2player'); ?>">
                                                <input type="text" placeholder="5bracket 3 player" name="5bracket3player" class="hide" value="<?php the_field('5bracket3player'); ?>">
                                                <input type="text" placeholder="5bracket 4 player" name="5bracket4player" class="hide" value="<?php the_field('5bracket4player'); ?>">
                                                
                                                <input type="text" placeholder="5bracket 1 result" name="5bracket1result" class="hide" value="<?php the_field('5bracket1result'); ?>">
                                                <input type="text" placeholder="5bracket 2 result" name="5bracket2result" class="hide" value="<?php the_field('5bracket2result'); ?>">
                                                <input type="text" placeholder="5bracket 3 result" name="5bracket3result" class="hide" value="<?php the_field('5bracket3result'); ?>">
                                                <input type="text" placeholder="5bracket 4 result" name="5bracket4result" class="hide" value="<?php the_field('5bracket4result'); ?>">
                                                
                                                <input type="text" placeholder="6bracket 1 player" name="6bracket1player" class="hide" value="<?php the_field('6bracket1player'); ?>">
                                                <input type="text" placeholder="6bracket 2 player" name="6bracket2player" class="hide" value="<?php the_field('6bracket2player'); ?>">

                                                <input type="text" placeholder="6bracket 1 result" name="6bracket1result" class="hide" value="<?php the_field('6bracket1result'); ?>">
                                                <input type="text" placeholder="6bracket 2 result" name="6bracket2result" class="hide" value="<?php the_field('6bracket2result'); ?>">
                                                
                                                <input type="text" placeholder="winner" name="winner" class="hide" value="<?php the_field('winner'); ?>">
                                                <input type="submit" value="Update Bracket">
										    </form>
										</td>

									</tr>
							<?php endwhile; ?>
							
						</tbody>
						<tfoot>
	                   		<tr>
		                        <th>S No.</th>
		                        <th>Title</th>
		                        <th>Total Players</th>
								<th>game</th>
								<th>Make Changes</th>
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