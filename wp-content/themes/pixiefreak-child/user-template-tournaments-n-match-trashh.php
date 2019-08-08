<?php 
/*
Template Name: User Tournaments and Matches XBOX
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
            <div class="tabbable" id="tabs-937228">
                <ul class="nav nav-tabs">
                    <!-- li class="nav-item">
                        <a class="nav-link active" href="#tab1" data-toggle="tab">Tournaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab2" data-toggle="tab">Leagues</a>
                    </li -->
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
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
                                $query -> query('post_type=tournaments&posts_per_page=10'.'&paged='.$paged);
                                
                                if ( $query->have_posts() ) : 
                                while ( $query->have_posts() ) : $query->the_post();
                                $i++;
                                
                                $value = get_field( "platform" );
                                
                                if( $value == 'xbox') {
                                
                                
                                ?>
                                <tr class="list_tournament">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <td class="tournament_image">
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                            <img class="featuretournament" src="<?php echo $image[0]; ?>">
                                            <?php endif; ?>   
                                        </td>
                                        <td class="main">
                                            <span class="title">Title - <?php the_field('tournament_type'); ?> <?php the_field('platform'); ?> </span>
                                            <span class="game">Game • <?php the_field('game'); ?></span>
                                            <span class="time">Day at 4:00</span>
                                        </td>                                    
                                        <td class="tournamentfee"><span>Entry Fee</br>Per Player</span><?php the_field('tournament_price'); ?></td>
                                        <td class="tournamentfee"><span>Registered</span>0/<?php the_field('brackets'); ?></td>
                                        <td class="tournamentfee"><span>Prize Pool</span>$150</td>
                                    </a>
                                </tr>
                                <?php
                                } else {
                                }
                                endwhile; ?>
                                
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
                    <div class="tab-pane" id="tab2">
                        <div class="player-rank">
                            <div class="row">
                                <table class="table ranking mt-2">

                                <tbody>
                                  <tr>
                                    <td class="border-top-0">Match</td>
                                    <td class="border-top-0">Platform</td>
                                    <td class="border-top-0">Start Date</td>
                                    <td class="border-top-0">End Date</td>
                                    <td class="border-top-0">Join Fee</td>
                                    <td class="border-top-0">Brackets</td>
                                    <td class="border-top-0">Type</td>
                                    
                                  </tr>
                                  <tr>
                                    <td class="border-top-0">Match</td>
                                    <td class="border-top-0">Platform</td>
                                    <td class="border-top-0">Start Date</td>
                                    <td class="border-top-0">End Date</td>
                                    <td class="border-top-0">Join Fee</td>
                                    <td class="border-top-0">Brackets</td>
                                    <td class="border-top-0">Type</td>
                                  </tr>

                                </tbody>
                                </table>
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

