<?php 
/*
Template Name: User Active Matches
*/
get_header();

get_sidebar('left');




?>
        <div class="col-md-6 col-sm-6 col-12 p-0">
        <div class="main-content main-content mt-3">
        <div class="main-content support frontline text-left mt-3">
            <h4 class="">Active Matches</h4>
        </div>
        <hr class="thick tour mb-2">
            <div class="tabbable" id="tabs-937228">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="player-rank">
                            <div class="row">
                                
                                <?php
                                    
                                    if (isset($_REQUEST['migame'])) {
                                        $g_name = $_REQUEST['migame'];
                                    }
                                    else{
									 $g_name = '';
									}
									
                                    if (isset($_REQUEST['miplat'])) {
                                        $g_platform = $_REQUEST['miplat'];
                                    }
									else{
									$g_platform = '';
									}
									
									if (isset($_REQUEST['mitype'])) {
									    $g_type = $_REQUEST['mitype'];
                                    }
									else{
									$g_type = '';
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
                                    $query -> query('post_type=matches&posts_per_page=-1'.'&paged='.$paged);
                                    if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $i++;
                                    
                                    $player1 = get_field( "player1" );
                                    $player2 = get_field( "player2" );
                                    
                                global $user_login; // If user is already logged in.
                                if ( is_user_logged_in() ) : $user = $user_login;  endif;
                                
                                    if($player1 == $user || $player2 == $user) {
                                    ?>
                                        <div class="list_tournament list_game rob">
                                                <div class="tournament_image">
                                                    <?php 
                                                    $game_name = get_field( "game" );
                                                    if ($game_name == "nba"){
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/NBA2K19-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "nbal")
                                                    {
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/Nba-Live.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "fortnite"){
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/Fortnite-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "cod"){
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/COD-BO3-Front.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "madden"){
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/madden19.png">
                                                        <?
                                                    }
                                                    else if ($game_name == "fifa"){
                                                        ?>
                                                        <img class="featuretournament" src="http://primetime.game/wp-content/uploads/2019/07/FIFA199.png">
                                                        <?
                                                    }
                                                    
                                                    
                                                    ?>
                                                </div>
                                                <div class="main">
                                                    <span class="title">
                                                        <?php 
                                                            $game_name = get_field( "game" );
                                                            
                                                             if ($game_name == "nba"){ echo "NBA 2K19";}
                                                            else if ($game_name == "nbal"){ echo "NBA Live 19";}
                                                            else if ($game_name == "fortnite"){echo "Fortnite";}
                                                            else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                                                            else if ($game_name == "madden"){echo "MADDEN 19";}
                                                            else if ($game_name == "fifa"){echo "FIFA 19";}
                                                            ?> - 
                                                            <?php 
                                                            $game_name = get_field( "platform" );
                                                                 if ($game_name == "ps4"){ echo "PlayStation 4";}
                                                            else if ($game_name == "xbox"){echo "XBOX";}
                                                            else if ($game_name == "pc"){echo "PC";}
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Game</span>
                                                    <?php 
                                                    $game_name = get_field( "game" );
                                                         if ($game_name == "nba"){ echo "NBA 2K19";}
                                                    else if ($game_name == "nbal"){ echo "NBA Live 19";}     
                                                    else if ($game_name == "fortnite"){echo "Fortnite";}
                                                    else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                                                    else if ($game_name == "madden"){echo "MADDEN 19";}
                                                    else if ($game_name == "fifa"){echo "FIFA 19";}
                                                    ?>
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
                                                    <span>Ladder</span>
                                                    <?php 
                                                    $game_name = get_field( "type" );
                                                         if ($game_name == "solo"){ echo "Single Player";}
                                                    else if ($game_name == "duos"){echo "Team";}
                                                    ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <span>Opponent</span><?php the_field('player1'); ?>
                                                </div>
                                                <div class="tournamentfee">
                                                    <a href="<?php echo get_permalink(); ?>">View</a>
                                                </div>
                                            
                                            </div>
                                    <?php
                                    }
                                    else{
                                        
                                    }
                                
                                    
                                    endwhile; 
                                    endif; ?>
                                    
                                    <?php //reset the following that was set above prior to loop
                                    $query = null; $query = $temp; ?>
                                
                                    
                            </div>
                        </div>
                    </div>
                        
                    
                </div>
            </div>
          </div>
        </div>

<?php 
get_sidebar('right');
get_footer();
?>

