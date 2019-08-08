<?php 
/*
Template Name: User Games List 
*/
get_header();

get_sidebar('left');
?>

<div class="col-md-6 col-sm-6 col-12 p-0 text-center">
    <div class="loadingscreen">
        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png">
    </div>
    <div class="">
        <div class="main-content w-100 text-center">
           
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
                $query -> query('post_type=games&posts_per_page=-1'.'&paged='.$paged);
                if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                $i++; 
                ?>
                
                
                
                
                
                
            
                
               
                    <div class="col-md-2 m-0 p-1 gamecardmain">
                        <div class="flip-card">
                            <div class="flip-card-inner card cara<?php echo $i; ?>">
                            <div class="flip-card-front front">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <img class="img-fluid game flipfront" src="<?php echo $image[0]; ?>">
                                <?php endif; ?>
                                <a type="button" class="btn btn-primary play pla<?php echo $i; ?>">PLAY</a>
                            </div>
                                <div class="flip-card-back back flipback car<?php echo $i; ?>">
                                    <p>Choose a platform</p>
                                    <p><?php $xyz = get_the_title(); ?></p>
                                    <ul>
                                        
                                        <form action="<?php echo get_bloginfo('url') ?>/user-tournaments-and-matches/" method="post">
                                            <input name="game" style="display:none;" type="text" value="<?php the_field('name'); ?>">
                                            <input name="platform" style="display:none;" type="text" value="ps4">
                                            <button type="submit">
                                                <li class="text-center enabled">
                                                    <img class="img-fluid game enabled" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p1.png"><br>PS4
                                                </li>
                                            </button>
                                        </form>
                                        <form action="<?php echo get_bloginfo('url') ?>/user-tournaments-and-matches/" method="post">
                                            <input name="game" style="display:none;" type="text" value="<?php the_field('name'); ?>">
                                            <input name="platform" style="display:none;" type="text" value="xbox">
                                            <button type="submit">
                                            <li class="text-center enabled">
                                            <img class="img-fluid game enabled" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p2.png"><br>XBOX
                                            </li>
                                            </button>
                                        </form>
                                        <form action="<?php echo get_bloginfo('url') ?>/user-tournaments-and-matches/" method="post">
                                            <input name="game" style="display:none;" type="text" value="<?php the_field('name'); ?>">
                                            <input name="platform" style="display:none;" type="text" value="pc">
                                            <button type="submit">
                                            <li class="text-center enabled">
                                            <img class="img-fluid game" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p3.png"><br>PC
                                            </li>
                                            </button>
                                        </form>
                                        
                                        <li class="text-center disabled"><img class="img-fluid game" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p4.png"><br>STADIA</li>
                                        <li class="text-center disabled"><img class="img-fluid game" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p3.png"><br>ARCADE</li>
                                        <li class="text-center disabled"><img class="img-fluid game" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/p6.png"><br>STEAM</li>
                                    </ul>
                                    
                                    <p class="gn rob"><?php echo $xyz; ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                    
                    
                    
                    
                <?php endwhile;?>
                <?php //pass in the max_num_pages, which is total pages ?>
               
                <?php endif; ?>
                <?php //reset the following that was set above prior to loop
                $query = null; $query = $temp; ?>
        </div>
    </div>
    <div class="text-center mt-4">
		<img class="img-fluid mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/primelogo.png">
	</div>
</div>
<?php 
get_sidebar('right');
get_footer();
?>

