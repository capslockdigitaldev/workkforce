<?php 
/*
Template Name: User Tournaments and Matches PC
*/
get_header();

get_sidebar('left');
?>
        <div class="col-md-6 col-sm-6 col-12 p-0">
        <div class="main-content main-content mt-3">
        <div class="main-content support frontline text-left mt-3">
            <h4 class="">Tournaments</h4>
        </div>
        <hr class="thick tour mb-2">
            <div class="tabbable" id="tabs-937228">
                <ul class="nav nav-tabs">
                    <!-- li class="nav-item">
                        <a class="nav-link active" href="#tab1" data-toggle="tab">Tournaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab2" data-toggle="tab">Ladders</a>
                    </li -->
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="player-rank">
                            <div class="row">
                                
                                    
                                    <?php 
                                    
                                    if (isset($_REQUEST['game'])) {
                                    $game = $_REQUEST['game'];
                                    }
                                    else{
									 $game = $_COOKIE['game'];
									}
                                    
                                    if (isset($_REQUEST['platform'])) {
                                    $platfrom = $_REQUEST['platform'];
                                    }
									else{
										$platfrom = $_COOKIE['platform'];
									}

                                    
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
                                    $query -> query('post_type=tournaments&posts_per_page=-1'.'&paged='.$paged);
                                    if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $i++;
                                    
                                    
                                    
                                    
                                    
                                    $value = get_field( "platform" );
                                    $valu = get_field( "game" );
                                    
                                    
                                    
                                    if( $value == $platfrom && $valu == $game ) {
                                    
                                    
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
                                    }
                                    endwhile; 
                                    endif; ?>
                                    
                                    <?php //reset the following that was set above prior to loop
                                    $query = null; $query = $temp; ?>
                                
                                
                                </div>
                            </div>
                    </div>
                    
                    <div class="tab-pane" id="tab2">
                        <p> Wohoo! It Works</p>
                    </div>    
                    
                </div>
            </div>
          </div>
        </div>

<?php 
get_sidebar('right');
get_footer();
?>

