<?php 
/*
Template Name: User Bracket Created
*/
get_header();

get_sidebar('left');
?>

<div class="col-md-6 col-sm-6 col-12 p-0">
		<div class="main-content support frontline text-left mt-3">
			<h4 class="">My Tournamnents</h4>
		</div>
			<hr class="thick tour mb-4">
			<div class="bracketc">
				<?php
					if(isset ($_POST['hostname']) )
	                    {
	                    	$hostname = $_POST['hostname'];
	                    	$tournamentname = $_POST['tournamentname'];
	                    	$tournamentdesc = $_POST['tournamentdesc'];
	                    	$game = $_POST['game'];
	                    	$type = $_POST['type'];
	                    	$players = $_POST['players'];
	                    	$startingdate = $_POST['startingdate'];
	                    	$startingtime = $_POST['startingtime'];
                            global $user_login;
                            $ccuser = $user_login;
                                $post_id = array (
                                'post_title' => $tournamentname,
                                'post_content' => $tournamentdesc,
                                'post_status' => 'publish',
                                'post_type' => 'publicbracket',
                                );
                                
                                $post_i = wp_insert_post( $post_id );
                                update_field( 'totalplayers', $players, $post_i );
                                update_field( 'creator', $ccuser, $post_i );
                                update_field( 'game', $game , $post_i );
                                update_field( 'type', $type , $post_i );
                                update_field( 'sdate', $startingdate , $post_i );
                                update_field( "ip", $localIP, $post_i );
                                update_field( 'stime', $startingtime, $post_i );
                                
                                echo '<p class="error">Cheers! New Tournament Created.</p>';
                                
                               


	                    }

				?>
			</div>
			
			                    <div class="player-rank">
                            <div class="row">
                                <table class="table ranking mt-2 tourbody">
                                <?php 
                                
                                global $user_login;
                                $cuser = $user_login;
                                //echo $cuser;
                                
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
                              
                                
                                $loop = new WP_Query( array( 'post_type' => 'publicbracket', 'paged' => $paged , 'meta_key' => 'creator', 'meta_value' => $cuser ) );
                                                if ( $loop->have_posts() ) :
                                                    while ( $loop->have_posts() ) : $loop->the_post();
                                
                                $i++;
                                
                                ?>
                                <div class="list_tournament">
                                            <a href="<?php echo get_permalink(); ?>">
                                            <div class="main">
                                                <span class="title">Tournament - <?php the_title(); ?><br>Game - <?php the_field('game'); ?></span>
                                            </div>
                                            <div class="main">
                                                <span class="title">Total Players - <?php the_field('totalplayers'); ?></span>
                                            </div>
                                            <div class="main">
                                                <span class="title">Starting on - <?php the_field('sdate'); ?></span>
                                            </div>
                                            <div class="main">
                                                <span class="title">Created by - <?php the_field('creator'); ?></span>
                                            </div>
                                            </a>
                                        </div>  
                                <?php
                                
                                endwhile; ?>
                                
                                
                                <?php //pass in the max_num_pages, which is total pages ?>
                                    <div class="pagenav">
                                        <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                                        <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                                    </div>
                                
                                <?php 
                                else:
                                 echo '<p class="error">OOPS! You have not Created any Tournament</p>';
                                
                                endif; ?>
                                </table>
                                <?php //reset the following that was set above prior to loop
                                $query = null; $query = $temp; ?>
                            </div>
                        </div>
</div>

<?php 
get_sidebar('right');
get_footer();
?>

