<?php 
/*
Template Name: User Leaderboard 
*/
get_header();

get_sidebar('left');
?>


                        
                        
                                
                                



<div class="col-md-6 col-sm-6 col-12 p-0">
   <div class="main-content">
      <div class="main-content support frontline text-left mt-3">
         <h4>Leaderboard</h4>
      </div>
      <hr class="thick tour mb-2">
      <div class="tabbable" id="tabs-937228">
         <ul class="nav nav-tabs">
            <!--<li class="nav-item">-->
            <!--   <a class="nav-link active" href="#tab1" data-toggle="tab">WEEKLY</a>-->
            <!--</li>-->
            <!--<li class="nav-item">-->
            <!--   <a class="nav-link" href="#tab2" data-toggle="tab">MONTHLY</a>-->
            <!--</li>-->
            <!--<li class="nav-item">-->
            <!--   <a class="nav-link" href="#tab3" data-toggle="tab">LIFETIME</a>-->
            <!--</li>-->
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="tab1">
               <div class="player-rank">
                    <div class="row">
                        <?php 
                        
                        
                            // query
                            $the_query = new WP_Query(array(
                            'post_type'			=> 'leaderboards',
                            'posts_per_page'	=> 3,
                            'meta_key'			=> 'xp',
                            'orderby'			=> 'meta_value',
                            'order'				=> 'DESC'
                            ));
                            
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php 
                            $i = 1;
                            while( $the_query->have_posts() ) : $the_query->the_post(); 
                            
                            $month = get_field('month');
                            $week = get_field('week');
                            $year = get_field('year');
                            $currentmonth = date('m');
                            $currentweek = date('w');
                            $currentyear = date('y');
                            
                                ?>
                                <div class="col-md-4">
                                    <div class="player-show mt-2">
                                        <span class="pull-left text-center"><img class="rounded-circle"  src="<?php the_field('playerimage'); ?>"><br><?php the_field('name'); ?></span>
                                        <span class="pull-right">
                                        <small>Rank</small><br><?php echo $i; ?>
                                        <hr class="mt-1 mb-0">
                                        <small>Game Played</small><br><?php the_field('gamesplayed'); ?>
                                        <hr class="mt-1 mb-0">
                                        <small>XP earned</small><br><?php the_field('xp'); ?>
                                        </span>
                                    </div>
                                </div>
                            
                            
                        <?php 
                        $i++;
                        endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
                  </div>
                  <div class="row">
                     <table class="table ranking mt-2">
                        <tbody>
                           <tr>
                              <td class="border-top-0">RANKING</td>
                              <td class="border-top-0">PLAYER NAME</td>
                              <td class="border-top-0">GAMES PLAYED</td>
                              <td class="border-top-0">XP EARNED</td>
                           </tr>
                            <?php 
                            // query
                            $the_query = new WP_Query(array(
                            'post_type'			=> 'leaderboards',
                            'posts_per_page'	=> -1,
                            'meta_key'			=> 'xp',
                            'orderby'			=> 'meta_value',
                            'order'				=> 'DESC'
                            ));
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php 
                            $i = 1;
                            while( $the_query->have_posts() ) : $the_query->the_post(); 
                            
                            $month = get_field('month');
                            $week = get_field('week');
                            $year = get_field('year');
                            $currentmonth = date('m');
                            $currentweek = date('w');
                            $currentyear = date('y');
                            
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php the_field('name'); ?></td>
                                    <td><?php the_field('gamesplayed'); ?></td>
                                    <td><?php the_field('xp'); ?></td>
                                </tr>
                            
                            <?php 
                            $i++;
                            endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
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

