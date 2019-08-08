<?php 
/*
Template Name: User Tournaments and Matches All
*/
get_header();

get_sidebar('left');
?>
        <div class="col-md-6 col-sm-6 col-12 p-0">
		    <div class="main-content">
    			<div class="main-content support frontline text-left mt-3">
                    <h4 class="">Tournaments</h4>
                </div>
                <hr class="thick tour mb-2">
                <!-- ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">PlayStation 4</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">XBOX</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">PC</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#tab4" data-toggle="tab">Google Stadia</a>
                    </li>
                </ul -->
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab1">
                        <div class="player-rank">
                            <div class="row">
                                <table class="table ranking mt-2 tourbody">
                                    z
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
                                  
                                    $loop = new WP_Query( array( 'post_type' => 'tournaments', 'paged' => $paged) );
                                    if ( $loop->have_posts() ) :
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $i++;
                                    ?>
                                            <div class="list_tournament list_game rob">
                                                <div class="tournament_image">
                                                    <?php 
                                                    $game_name = get_field( "game" );
                                                    if ($game_name == "nba"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/NBA2K19-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "nbal"){
                                                        ?>
                                                            <img class="featuretournament" src="/wp-content/uploads/2019/07/Nba-Live.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "fortnite"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/Fortnite-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "cod"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/COD-BO3-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "madden"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/madden19.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "fifa"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/FIFA199.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "tekken"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/tekken.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "mortal"){
                                                        ?>
                                                        <img class="featuretournament" src="/wp-content/uploads/2019/07/mortal-combat.png">
                                                        <?
                                                    }
                                                    
                                                    
                                                    ?>
                                                </div>
                                                <div class="tournamentfee tile">
                                                    <span>Tournament</span>
                                                    <?php the_title(); ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Starting on</span>
                                                    <?php the_field('Tournament Start date'); ?> at <?php the_field('time'); ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Platform</span>
                                                    <?php 
                                                    $game_name = get_field( "platform" );
                                                         if ($game_name == "ps4"){ echo "PlayStation 4";}
                                                    else if ($game_name == "xbox"){echo "XBOX";}
                                                    else if ($game_name == "pc"){echo "PC";}
                                                    ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Prize Pool</span>
                                                    <?php the_field('prizepool'); ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Total Players</span>
                                                    <?php the_field('brackets');?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <a href="<?php echo get_permalink(); ?>">Join</a>
                                                </div>
                                            </div>
                                    <?php
                                    endwhile; 
                                    ?>
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
                    
                    <!--div class="tab-pane" id="tab2">
                        <div class="player-rank">
                            <div class="row">
                                <table class="table ranking mt-2 tourbody">
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
                                  
                                    $loop = new WP_Query( array( 'post_type' => 'tournaments', 'paged' => $paged , 'meta_key' => 'platform', 'meta_value' => 'xbox' ) );
                                    if ( $loop->have_posts() ) :
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $i++;
                                    ?>
                                            <div class="list_tournament">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <div class="tournament_image">
                                                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                        <img class="featuretournament" src="<?php echo $image[0]; ?>">
                                                        <?php endif; ?>   
                                                    </div>
                                                    <div class="main">
                                                        <span class="title">Title - <?php the_title(); ?> </span>
                                                        <span class="game">Game - <?php the_field('game'); ?></span>
                                                        <span class="time"><?php the_field('Tournament Start date'); ?> at <?php the_field('time'); ?></span>
                                                    </div>                                    
                                                    <div class="tournamentfee"><span>Entry Fee</br>Per Player</span><?php the_field('tournament_price'); ?> XR Bucks</div>
                                                    <div class="tournamentfee"><span>Prize Pool</span><span><?php the_field('prizepool'); ?></span></div>
                                                    <div class="tournamentfee"><span>Total Players</span><span><?php the_field('brackets');?></span></div>
                                                </a>
                                            </div>  
                                    <?php
                                    endwhile; 
                                    ?>
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
                    
                    
                    <div class="tab-pane" id="tab3">
                        <div class="player-rank">
                            <div class="row">
                                <table class="table ranking mt-2 tourbody">
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
                                  
                                    $loop = new WP_Query( array( 'post_type' => 'tournaments', 'paged' => $paged , 'meta_key' => 'platform', 'meta_value' => 'pc' ) );
                                    if ( $loop->have_posts() ) :
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $i++;
                                    ?>
                                            <div class="list_tournament">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <div class="tournament_image">
                                                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                        <img class="featuretournament" src="<?php echo $image[0]; ?>">
                                                        <?php endif; ?>   
                                                    </div>
                                                    <div class="main">
                                                        <span class="title">Title - <?php the_title(); ?> </span>
                                                        <span class="game">Game - <?php the_field('game'); ?></span>
                                                        <span class="time"><?php the_field('Tournament Start date'); ?> at <?php the_field('time'); ?></span>
                                                    </div>                                    
                                                    <div class="tournamentfee"><span>Entry Fee</br>Per Player</span><?php the_field('tournament_price'); ?> XR Bucks</div>
                                                    <div class="tournamentfee"><span>Prize Pool</span><span><?php the_field('prizepool'); ?></span></div>
                                                    <div class="tournamentfee"><span>Total Players</span><span><?php the_field('brackets');?></span></div>
                                                </a>
                                            </div>  
                                    <?php
                                    endwhile; 
                                    ?>
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
                    
                    <div class="tab-pane" id="tab4">
                        Coming Soon
                    </div -->    
                </div>    
            </div>
		</div>

<?php 
get_sidebar('right');
get_footer();
?>

