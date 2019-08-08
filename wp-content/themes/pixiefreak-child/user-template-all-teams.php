<?php 
/*
Template Name: My teams
*/
get_header();

get_sidebar('left');




?>
        <div class="col-md-6 col-sm-6 col-12 p-0">
        <div class="main-content main-content mt-3">
        <div class="main-content support frontline text-left mt-3">
            <h4 class="">My Teams</h4>
        </div>
        <hr class="thick tour mb-2">
            <div class="tabbable" id="tabs-937228">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="player-rank">
                            
                            
                            <?php 
                            
                            if($_POST['create_team'])
                                {
                                    $teamname = $_POST['team_name'];
                                    $team_creator = $_POST['team_creator'];
                                    
                                    
                                    $my_post = array(
                                    'post_type' => 'team',
                                    'post_title' => $_POST['team_name'],
                                    'post_content' => '',
                                    'post_status' => 'publish', // and more status like publish,draft,private 
                                    );
                                   
                                    // Creating New Team
                                    
                                    $post_id = wp_insert_post($my_post);
                                    ///
                                    
                                    update_field( 'created_by', $team_creator, $post_id );
                                    update_field( 'player1', $team_creator, $post_id );
                                    
                                    
                                    if (!function_exists('wp_generate_attachment_metadata')){
                                    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                                    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                                    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                                    }
                                    if ($_FILES) {
                                    foreach ($_FILES as $file => $array) {
                                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                                    return "upload error : " . $_FILES[$file]['error'];
                                    }
                                    $attach_id = media_handle_upload( $file, $post_id );
                                    }   
                                    }
                                    if ($attach_id > 0){
                                    //and if you want to set that image as Post  then use:
                                    update_post_meta($post_id,'_thumbnail_id',$attach_id);
                                    }
                                    
                                    ///
                                    
                                    echo 'team created!';
                                }
                            ?>
                            
                          <?php global $user_login; 
                          
                            if ( is_user_logged_in() ){
                                ?>
                            <div class="row teams_li">
                                
                                
                                <div class="matchbox">
                                       <a id="modal-50555" href="#modal-container-50555" role="button" data-toggle="modal">Create Team <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                <h2>My Teams</h2>
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
                                    $query -> query('post_type=team&posts_per_page=-1'.'&paged='.$paged);
                                    if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $i++;
                                    
                                                global $user_login; // If user is already logged in.
                                                if ( is_user_logged_in() ) : $user = $user_login;  endif; 
                                                
                                                $palyerone = get_field('created_by');
                                                if($user == $palyerone)
                                                {   
                                    
                                    
                                                 ?>       <div class="list_tournament list_game rob">
                                                            <div class="tournament_image">
                                                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                                    <img src="<?php echo $image[0]; ?>"> <?php endif; ?>
                                                            </div>
                                                            
                                                            <div class="main">
                                                                <span class="title">
                                                                    <?php the_title(); ?>
                                                                </span>
                                                            </div>
                                                            
                                                            
                                                            <div class="tournamentfee">
                                                                <br>
                                                                <span>Created By</span>
                                                                <?php 
                                                                $cname = get_field( "created_by" );
                                                                echo $cname;
                                                                ?>
                                                            </div>
                                                            <div class="tournamentfee">
                                                                <span>Since</span>
                                                                <?php 
                                                                $cname = get_field( "date" );
                                                                echo $cname;
                                                                ?>
                                                            </div>
                                                            
                                                            <div class="tournamentfee">
                                                                <a href="<?php echo get_permalink(); ?>">View Team</a>
                                                            </div>
                                                        
                                                        </div>
                                        <?
                                                }
                                                else {}
                                    endwhile; 
                                    endif; ?>
                                    
                                    <?php //reset the following that was set above prior to loop
                                    $query = null; $query = $temp; ?>
                                
                                    
                            </div>
                            
                            <div class="row teams_li">
                                <h2>Member in</h2>
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
                                    $query -> query('post_type=team&posts_per_page=-1'.'&paged='.$paged);
                                    if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $i++;
                                    
                                    global $user_login; // If user is already logged in.
                                                if ( is_user_logged_in() ) : $user = $user_login;  endif; 
                                                
                                                $palyer1 = get_field('player1');
                                                $palyer2 = get_field('player2');
                                                $palyer3 = get_field('player3');
                                                $palyer4 = get_field('player4');
                                                $palyer5 = get_field('player5');
                                                $palyer6 = get_field('player6');
                                                $palyer7 = get_field('player7');
                                                $palyer8 = get_field('player8');
                                                $palyer9 = get_field('player9');
                                                $palyer10 = get_field('player10');
                                                
                                                if($user == $palyer1 || $user == $palyer2 || $user == $palyer3 || $user == $palyer4 || $user == $palyer5 || $user == $palyer6 || $user == $palyer7 ||$user == $palyer8 ||$user == $palyer9 ||$user == $palyer10 )
                                                {   
                                                    
                                                 ?>       <div class="list_tournament list_game rob">
                                                            <div class="tournament_image">
                                                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                                    <img src="<?php echo $image[0]; ?>"> <?php endif; ?>
                                                            </div>
                                                            
                                                            <div class="main">
                                                                <span class="title">
                                                                    <?php the_title(); ?>
                                                                </span>
                                                            </div>
                                                            
                                                            
                                                            <div class="tournamentfee">
                                                                <br>
                                                                <span>Created By</span>
                                                                <?php 
                                                                $cname = get_field( "created_by" );
                                                                echo $cname;
                                                                ?>
                                                            </div>
                                                            <div class="tournamentfee">
                                                                <span>Since</span>
                                                                <?php 
                                                                $cname = get_field( "date" );
                                                                echo $cname;
                                                                ?>
                                                            </div>
                                                            
                                                            <div class="tournamentfee">
                                                                <a href="<?php echo get_permalink(); ?>">View Team</a>
                                                            </div>
                                                        
                                                        </div>
                                        <? }
                                        else{}
                                    endwhile; 
                                    endif; ?>
                                    
                                    <?php //reset the following that was set above prior to loop
                                    $query = null; $query = $temp; ?>
                                
                                    
                            </div>
                            
                                <?php
                            }
                            else{
                                ?>
                              <div class="row teams_li oo not-found">
                                  <h2>OOPS!</h2>
                                  <p>You Must Be Logged in to Build your Squad!</p>
                                  <a class="cmlogin" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Log in</a>
                                  <a class="cmsignup" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">New User? Sign up</a>
                              </div>  
                            <?php
                            }
                          ?>
                            

                        
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

