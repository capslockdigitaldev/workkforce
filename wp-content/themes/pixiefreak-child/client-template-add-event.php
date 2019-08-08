<?php 
/*
    Template Name: Client Add Events
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
                    <h2>Create an Event</h2>
                </div>
                <div class="col-lg-2">
                </div>
    </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Create a new Event</h5>
                    </div>
                    <div class="ibox-content">
                    
                                                  
                    <?php 
                                    if(isset($_POST['title'])){
                                    
                                    //echo $_POST['title']; // print title variable value
                                    
                                    // create post object
                                    
                                    $title =  $_POST['title'];
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
                                    
                                    
                                    
                                    $my_post = array(
                                    'post_type' => 'events',
                                    'post_title' => $_POST['title'],
                                    'post_content' => $_POST['eventdescription'],
                                    'post_status' => 'publish', // and more status like publish,draft,private 
                                    
                                    );
                                    
                                    
                                    // i'm use wordpres predefine function/
                                    
                                    $post_id = wp_insert_post($my_post);
                                    ///
                                    
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
                                    
                                    
                                    
                                    echo 'New Event Created Successfully !';
                                    
                                    
                                    die; // stop script after form submit
                                    }

                    
                    ?>
                        
                        
                            <!-- New Event Form -->
                            
                            <div id="postbox" class="createevent">
                                <form method="post" enctype="multipart/form-data">
  
                                    <div class="form-group">
                                      <label for="title">Event Title:</label>
                                      <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                	
                                	<div class="form-group">
                                      <label for="pwd">Event Description :</label>
                                      <textarea class="form-control"  name="eventdescription"></textarea>
                                    </div>
                                	
                                	<div class="form-group">
                                      <label for="title">Event Image:</label>
                                      <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="date">Event Date</label>
                                          <select name="datee">
                                            <?php 
                                                $x = 01; 
                                                while($x <= 31) {
                                                    $num_padded = sprintf("%02d", $x);
                                                    echo $num_padded;
                                                    ?>
                                                    <option value="<?php echo $num_padded ?>"><?php echo $num_padded ?></option>
                                                    <?
                                                $x++;
                                                } 
                                            ?>  
                                          </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="title">Event Month
                                          </label>
                                          <select name="month">
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>  
                                          </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="year">Event Year
                                          </label>
                                          <select name="year">
                                            <?php 
                                                $x = 2010; 
                                                while($x <= 2029) {
                                                    ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                    <?
                                                $x++;
                                                } 
                                            ?>  
                                          </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="time">Event Time
                                        </label>
                                        <input name="time" type="text" Placeholder="Example 12:00 PM">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="location">Event Venue
                                        </label>
                                        <br />
                                        <input type="text"  name="location" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="location">Contact Phone
                                        </label>
                                        <br />
                                        <input type="text"  name="contactphone" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="location">Contact Email
                                        </label>
                                        <br />
                                        <input type="text"  name="contactemail" />
                                    </div>
                                    
                                    <br>
                                    
                                    <button type="submit" class="btn btn-default">Create Event</button>
                                
                                </form>
                            </div>
                </div>
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