<?php 
/*
Template Name: User Events
*/
get_header();
?>
<div class="only_phone"> 
<?
get_sidebar('left');
?>
</div>
<div class="events_page">
    <div class="events_block rob">
        
        <div class="eventsnavigation">
               <span class="nav_events" id="prev">
                    <?php 
                    if (isset($_POST["nextmonth"])) {
                        $prevmonth = $_POST["nextmonth"];
                        $prevmonth = $prevmonth - 1;
                    } else {    
                        $prevmonth = date("m");
                        $prevmonth = $prevmonth - 1;
                    }
                    
                    
                    
                    ?>
                    <form action="" method="post" >
                        <input class="hidden" type="text" name="nextmonth" value="<?php echo $prevmonth; ?>">
                        <input type="submit" value="<">
                    </form>
                </span>
                
                <h2>
                    <?php
                    
                    if (isset($_POST["nextmonth"])) {
                                $monthNum = $_POST["nextmonth"];  
                            } else {    
                                $monthNum = date("m");
                            }
                   // $monthNum  = 3;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    
                    echo $monthName;
                    ?>
                     Events
                </h2>
                
                <span class="nav_events" id="next">
                    <?php 
                    if (isset($_POST["nextmonth"])) {
                        $currentmonth = $_POST["nextmonth"];
                        $next = $currentmonth + 1;
                    } else {    
                         $currentmonth = date("m");
                        $next = $currentmonth + 1;
                    }
                    ?>
                    <form action="" method="post" >
                        <input class="hidden" type="text" name="nextmonth" value="<?php echo $next; ?>">
                        <input type="submit" value=">">
                        
                    </form>
                </span> 
        </div>
        
        
        <div class="events_list">
            <div class="days weeks">
                <div class="eventsmonth">Events This Month</div>
            </div>
                <?php   
                //custom loop using WP_Query
                $query = new WP_Query( array( 
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC' 
                ) ); 
                
                //set our query's pagination to $paged
                $query -> query('post_type=events&posts_per_page=-1'.'&paged='.$paged);
                $i = 0;
                if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                
                
                $month = get_field('month');
                
                    if (isset($_POST["nextmonth"])) {
                        $cmonth = $_POST["nextmonth"];  
                    } else {    
                        $cmonth = date("m");
                    }
                
               
                if ($cmonth == $month){
                    $i++;
                ?>
                
                <a href="<?php get_post_permalink(the_permalink()) ?>">
                     <div class="singleevent">
                        <div class="event_image">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>);"> <?php endif; ?>  
                        </div>
                        <div class="event_description">
                            <p class="timee"><?php the_field('eventtitle'); ?></p> 
                            <p class="location"><i class="far fa-calendar-alt"></i> <?php the_field('eventdate'); ?> - <?php the_field('month'); ?> - <?php the_field('year'); ?></p> 
                            <p class="location"><span><i class="far fa-clock"></i> <?php the_field('time'); ?></span>  <i class="fas fa-map-marker-alt"></i> <?php the_field('location'); ?></p> 
                        </div>
                    </div>
                </a>
                
                <? }
                else
                {
                    if ($i == 0){
                        echo '<div class="singleevent"><div class="event_description"><p class="location">OOPS! NO EVENTS</p></div></div>';
                        $i++;
                    }
                }
	            endwhile;?>
                <?php endif; ?>
                <?php //reset the following that was set above prior to loop
                $query = null; $query = $temp; 
                ?>
            
        </div>
        <div class="events_box">
            <div class="weekdays">
            </div>
            <div class="days weeks">
                <div class="eachweekday">Su</div>
                <div class="eachweekday">Mo</div>
                <div class="eachweekday">Tu</div>
                <div class="eachweekday">We</div>
                <div class="eachweekday">Th</div>
                <div class="eachweekday">Fr</div>
                <div class="eachweekday">Sa</div>
            </div>    
            <div class="days">
                
            <?php 
            $currentday = date(D);
            $currentdate = date("d");
            
            
            if (isset($_POST["nextmonth"])) 
                {
                    $currentmonths = $_POST["nextmonth"];
                    $currentmonth = $currentmonths + 1;
                } else {    
                     $currentmonth = date("m");
                }
            
            
            // $currentmonth = date("m");
            $currentyear = date(Y);
            $totaldays = cal_days_in_month(CAL_GREGORIAN,$currentmonth,$currentyear);
            
            $x = 1;
            $y = 1;
            $fullloop = 42;
            
            //Our YYYY-MM-DD date string.
            $date = "$currentyear"."-".$currentmonth."-"."1";
            
            //Convert the date string into a unix timestamp.
            $unixTimestamp = strtotime($date);
            
            //Get the day of the week using PHP's date function.
            $dayOfWeek = date("l", $unixTimestamp);
            
                    if ($dayOfWeek == Sunday)
                        {   $x = 1;
                        }
                        else if ($dayOfWeek == Monday)
                        {   
                            $x = 2;
                            $h = 1; 
                            while($h <= 1) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            }
                        }
                        else if ($dayOfWeek == Tuesday)
                        {    
                            $x = 3;
                            $h = 1; 
                            while($h <= 2) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            }
                        }
                        else if ($dayOfWeek == Wednesday)
                        {  
                            $x = 4;
                            $h = 1; 
                            while($h <= 3) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            }
                        }
                        else if ($dayOfWeek == Thursday)
                        {   
                            $x = 5;
                            $h = 1; 
                            while($h <= 4) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            }
                        }
                        else if ($dayOfWeek == Friday)
                        {   
                            $x = 6;
                            $h = 1; 
                            while($h <= 5) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            }
                        }
                        else if ($dayOfWeek == Saturday)
                        {   
                            $x = 7;
                            $h = 1; 
                            while($h <= 6) {
                                ?>
                                <div class="eachday">
                                    <div class="day">
                                    </div>
                                </div>
                                <?
                                 $h++;
                            } 
                        }
            
                         
            while($x <= $fullloop) 
                { ?>
                
                
                <div class="eachday <?php echo $x ?>">
                    
                     <?php
                        if ($y <= $totaldays) 
                        { 
                        
                        echo '<div class="day">'; 
                        echo $y;
                        
                        if ($y == 1 || $y == 21){
                            echo 'st';
                        }
                        else if ($y == 23){
                            echo 'rd';
                        }
                        else if ($y == 2){
                            echo 'nd';
                        }
                        else if ($y == 3){
                            echo 'rd';
                        }
                        else if ($y >= 4 && $y <= 20){
                            echo 'th';
                        }
                        else if ($y >= 21 && $y <= 31){
                            echo 'th';
                        }
                        echo '</div>';
                        
                        
                        
                        
                        
                        //custom loop using WP_Query
                        $query = new WP_Query( array( 
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC' 
                        ) ); 
                        
                        //set our query's pagination to $paged
                        $query -> query('post_type=events&posts_per_page=10'.'&paged='.$paged);
                        
                        if ( $query->have_posts() ) : 
                        while ( $query->have_posts() ) : $query->the_post();
                        $i++;
                        ?>
                            <?php 
                                $date = get_field('eventdate');
                                $month = get_field('month');
                                if (isset($_POST["nextmonth"])) {
                                $cmonth = $_POST["nextmonth"];  
                                } else {    
                                $cmonth = date("m");
                                }
                                
                                $j = 1;
                                if ($date == $y && $j <= 1 && $cmonth == $month)
                                { 
                                // echo $date;
                                // echo $y;
                                ?>
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>);"> <?php endif; ?>
                                    
                                    <?php $j++; ?>
                                    
			              <?php }
			                
			            endwhile;?>
                        <?php endif; ?>
                        <?php //reset the following that was set above prior to loop
                        $query = null; $query = $temp; 
                        ?>
                        
                        
                        
                        <?php
                        }
                      $y++;     
                     ?>
                </div>
                
                <? if ($x == 7)
                    {
                        echo '</div> <div class="days">';
                    };
                $x++;
                } ?>
            
            
            </div>
            
        </div>
    </div>
</div>

<?php 
get_footer();
?>

