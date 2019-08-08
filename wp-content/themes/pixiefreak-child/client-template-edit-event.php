<?php 
/*
Template Name: Client Edit Event
*/
get_header('client');
$user = wp_get_current_user();
$roles = ( array ) $user->roles;
// $roles; // This returns an array
// Use this to return a single value
$admincheck = $roles[0];
if (!is_user_logged_in()) {
?>
<div class="client_login">
	<?php
	echo do_shortcode('[login-form redirect="/admin-login/"]');
	?>
</div>
<?php
} 
else if ($admincheck == 'client' || $admincheck == 'administrator' ) {
get_sidebar('client');
?>
        <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Edit Event</h2>
                    </div>
                    <div class="col-lg-2">
                    </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Edit Event</h5>
                        </div>
                        <div class="ibox-content">
                                <?php
                                
                               if (isset ($_POST['eventtitle'])) 
                                   {
                                        $postid = $_POST['postid'];
                                        $title = $_POST['eventtitle'];
                                        $eventdescription = $_POST['eventdescription'];
                                        $date = $_POST['date']; 
                                        $time = $_POST['time'];
                                        $month = $_POST['month'];
                                        $year = $_POST['year'];
                                        $location = $_POST['location'];
                                        $contactphone = $_POST['contactphone'];
                                        $contactemail = $_POST['contactemail'];
                                        
                                    }
                                else{};
                                
                                
                                if (isset ($_POST['title'])) 
                                   {
                                            $post_id = $_POST['idd'];
                                            $title = $_POST['title'];
                                            $eventdescription = $_POST['eventdescription'];
                                            $date =  $_POST['datee'];
                                            $time =  $_POST['time'];
                                            $month =  $_POST['month'];
                                            $year =  $_POST['year'];
                                            $location =  $_POST['location'];
                                            $price =  $_POST['price'];
                                            $per =  $_POST['per'];
                                            $contactphone =  $_POST['contactphone'];
                                            $contactemail =  $_POST['contactemail'];
                                            
                                            

                           
                                            // Update post
                                            $my_post = array(
                                            'ID'           => $post_id,
                                            'post_title'   => $title, // new title
                                            );
                                            
                                            // Update the post into the database
                                            wp_update_post( $my_post );

                                            // Update the post into the database
                                            update_field( 'eventtitle', $title, $post_id );
                                            update_field( 'eventdescription', $eventdescription, $post_id );
                                            update_field( 'eventdate', $date, $post_id );
                                            update_field( 'time', $time, $post_id );
                                            update_field( 'month', $month, $post_id );
                                            update_field( 'year', $year, $post_id );
                                            update_field( 'location', $location, $post_id );
                                            update_field( 'price', $price, $post_id );
                                            update_field( 'per', $per, $post_id );
                                            update_field( 'contactphone', $contactphone, $post_id );
                                            update_field( 'contactemail', $contactemail, $post_id );
                                            
                                            
                                            echo '<p class="events">Cheers! Event Updated.<a href="/client-offline-events/">Click Here to See all Events</a></p>';
                                            
    
                                    }
                                else{   ?>
                                   
                                   
                                 <div id="postbox">
                                        <form id="new_post" method="post" action="" enctype="multipart/form-data">

											<!-- Event Title -->
                                            <p>
                                              <label for="title">Event Title
                                              </label>
                                              <br />
                                              <input class="hide" type="text" name="idd" value="<?php echo $postid; ?>">
                                              <input type="text" id="title" value="<?php echo $title; ?>" tabindex="1" size="20" name="title" />
                                            </p>
                                            <!-- Event Description -->
                                            <p>
                                              <label for="title">Event Description</label>
                                              <br />
                                              <textarea name="eventdescription" value="<?php echo $eventdescription; ?>"></textarea>
                                            </p>
                                            <p>
                                                <label for="title">Current Event Description</label>
                                                <div class="">
                                                    <?php echo $eventdescription; ?>
                                                </div>
                                            </p>    
                                            <!-- Event Time -->
                                            <p>
                                              <label for="title">Event Time</label>
                                              <br />
                                              <input name="time" value="<?php echo $time; ?>"></input>
                                            </p>
                                            <!-- Event Date -->
                                            <p>
                                              <label for="title">Event Date</label>
                                              <br />
                                              <input name="datee" value="<?php echo $date; ?>"></input>
                                            </p>
                                            <!-- Event Month -->
                                            <p>
                                              <label for="title">Event Month</label>
                                              <br />
                                              <input  name="month" value="<?php echo $month; ?>"></input>
                                            </p>
                                            <!-- Event Year -->
                                            <p>
                                              <label for="title">Event Year</label>
                                              <br />
                                              <input name="year" value="<?php echo $year; ?>"></input>
                                            </p>
                                            <!-- Event Location -->
                                            <p>
                                              <label for="title">Event Location</label>
                                              <br />
                                              <input name="location" value="<?php echo $location; ?>"></input>
                                            </p>
                                            <!-- Contact Phone-->
                                            <p>
                                              <label for="title">Contact Phone</label>
                                              <br />
                                              <input name="contactphone" value="<?php echo $contactphone; ?>"></input>
                                            </p>
                                            <!-- Contact Email -->
                                            <p>
                                              <label for="title">Contact Email</label>
                                              <br />
                                              <input name="contactemail" value="<?php echo $contactemail; ?>"></input>
                                            </p>
											
											<p align="right">
                                              <input type="submit" value="Update Event" tabindex="6" id="submit" name="submit" />
                                            </p>
                                            <input type="hidden" name="action" value="Update" />
                                        </form>
                                    </div>  
                                 
                                 
                                    
                            <?php   }; ?>
                                    
                    </div>
                </div>
            </div>
        </div>

            


<?php
}
else{
?>
<div class="client_login"><p class="oops">OOPS! You are not Authorized to Access This Page.</p></div>
<?php
};
get_footer('client');
?>                
    
    
   
