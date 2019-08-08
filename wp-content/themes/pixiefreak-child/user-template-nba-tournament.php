<?php 
/*
Template Name: User nba tournaments
*/
get_header();

get_sidebar('left');
?>

 
<div class="col-md-6 col-sm-6 col-12 p-0">
	<div class="main-content">
		<div class="main-content support frontline text-left mt-3">
            <h4 class="">NBA 2K19 Tournaments</h4>
        </div>
    	<hr class="thick tour mb-2">
             <div class="tab-content">
                <div class="tab-pane ative">
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
                              
                                
                                $loop = new WP_Query( array( 'post_type' => 'tournaments', 'paged' => $paged , 'meta_key' => 'game', 'meta_value' => 'nba' ) );
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
                                            <span class="game">Game • <?php the_field('game'); ?></span>
                                            <span class="time">Day at 4:00</span>
                                            </div>                                    
                                            <div class="tournamentfee"><span>Entry Fee</br>Per Player</span><?php the_field('tournament_price'); ?></div>
                                            <div class="tournamentfee"><span>Registered</span>0/<?php the_field('brackets'); ?></div>
                                            <div class="tournamentfee"><span>Prize Pool</span>$150</div>
                                            </a>
                                        </div>  
                                <?php
                                
                                endwhile; ?>
                                
                                
                                <?php //pass in the max_num_pages, which is total pages ?>
                                    <div class="pagenav">
                                        <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
                                        <div class="alignright"><?php next_posts_link('See More', $query->max_num_pages) ?></div>
                                    </div>
                                
                                <?php endif; ?>
                                
                                <?php //reset the following that was set above prior to loop
                                $query = null; $query = $temp; ?>
                                </table>
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

