<?php 
get_header();
     
?>
	<div class="col-md-12 col-sm-12 col-12">
		<div class="main-content mt-4">
			<main id="public">
                <?php while ( have_posts() ) : the_post(); ?>
                
                            <ul class="publicrounds extraround">
	                           <p>Round Extra</p>
	                           <?
                                   $totalplayers = get_field( "totalplayers" );
                                   $plays = $totalplayers/2;
                                    
                                    if (($totalplayers & ($totalplayers - 1)) == 0)
    	                                {
    	                                   echo 'only straight round';
    	                                }
                                    else
    	                                {
    	                                   echo 'bye rounds';
    	                                }
	                            ?>
                            </ul>
                            
	            <? endwhile;
	            wp_reset_postdata(); ?>
	        </main>
		</div>
	</div>

<?php 
get_footer();
?>

