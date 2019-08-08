<?php 
/*
Template Name: Client Add Tournament
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
                    <h2>Add Tournaments</h2>
                </div>
                <div class="col-lg-2">
                </div>
    </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Add a New Tournament</h5>
                    </div>
                    <div class="ibox-content">
                    <?php 
                    if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") 
                        {
                
                            // Do some minor form validation to make sure there is content
                            if (isset ($_POST['title'])) {
                                $title =  $_POST['title'];
                            } else {
                                echo 'Please enter a  title';
                            }
                            if (isset ($_POST['description'])) {
                                $description = $_POST['description'];
                            } else {
                                echo 'Please enter the content';
                            }
                            $tags = $_POST['post_tags'];
                            
                            $title = $_POST['title'];
                            $price = $_POST['price']; 
                            $platform = $_POST['platform'];
                            $game = $_POST['game'];
                            $Registeration_Start_Date = $_POST['Registeration_Start_Date'];
                            $Registeration_Close_Date = $_POST['Registeration_Close_Date'];
                            $Tournament_Start_Date = $_POST['Tournament_Start_Date'];
                            $Tournament_Close_Date = $_POST['Tournament_Close_Date'];
                            $prizepool = $_POST['prizepool'];
                            $firstprize = $_POST['firstprize'];
                            $secondprize = $_POST['secondprize'];
                            $thirdprize = $_POST['thirdprize'];
                            $prizethumb = $_POST['prizethumb'];
                            $totalplayer = $_POST['totalplayer'];
                            $bracket_type = $_POST['bracket_type'];
                            $description = $_POST['description'];
                            $randomid = mt_rand(100000,999999); 
                        
                            // Add the content of the form to $post as an array
                            $new_post = array(
                                'post_title'    => $title,
                                'post_content'  => $description,
                                'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
                                'post_type' => 'tournaments'  //'post',page' or use a custom post type if you want to
                            );
                            
                            
                            
                            
                            
                            
                            //save the new post
                                $post_i = wp_insert_post( $new_post );
                                update_field( 'tournament_price', $price, $post_i );
                                update_field( 'platform', $platform, $post_i );
                                update_field( 'game', $game, $post_i );
                                update_field( 'registration_open_date', $Registeration_Start_Date, $post_i );
                                update_field( 'registration_close_date_', $Registeration_Close_Date, $post_i );
                                update_field( 'Tournament_Start_date', $Tournament_Start_Date, $post_i );
                                update_field( 'Tournament_End_date', $Tournament_Close_Date, $post_i );
                                update_field( 'tournament_type', $bracket_type, $post_i );
                                update_field( 'bracket_type', $bracket_type, $post_i );
                                update_field( 'brackets', $totalplayer, $post_i );
                                update_field( 'tournament_rules', $description, $post_i );
                                update_field( 'time', $totalplayer, $post_i );
                                update_field( 'prizeone', $firstprize, $post_i );
                                update_field( 'prizetwo', $secondprize, $post_i );
                                update_field( 'prizethree', $thirdprize, $post_i );
                                update_field( 'prizeimage', $prizethumb, $post_i );
                                update_field( 'prizepool', $prizepool, $post_i );
                                update_field( 'tournament_id', $randomid, $post_i );
                                
                                
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
                                    $attach_id = media_handle_upload( $file, $post_i );
                                    }   
                                    }
                                    if ($attach_id > 0){
                                    //and if you want to set that image as Post  then use:
                                    update_post_meta($post_i,'_thumbnail_id',$attach_id);
                                    }
                                    
                                    ///
                                    
                                    
                                    // Add the content of the form to $post as an array
                                    $new_bracket = array(
                                    'post_title'    => $title,
                                    'post_content'  => $description,
                                    'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
                                    'post_type' => 'bracket'  //'post',page' or use a custom post type if you want to
                                    );    
                                    $post_id = wp_insert_post( $new_bracket );
                                    update_field( 'tournamentid', $randomid, $post_id );
                                    update_field( 'totalplayers', $totalplayer, $post_id );
                                
                                
                                
                                echo '<p class="error">Cheers! New Tournament Created.</p>';
                
                        } ?>
                    <!-- New Post Form -->
                    <div id="postbox">
                      <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
                        <!-- Tournament Title -->
                        <p>
                          <label for="title">Tournament Title
                          </label>
                          <br />
                          <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
                        </p>
                        <!-- Tournament Price -->
                        <p>
                          <label for="title">Tournament Price</label>
                          <br />
                          <input type="text" id="Price" value="" tabindex="1" size="20" name="price" />
                        </p>
                        <!-- Tournament Platfrom -->
                        <p>
                          <label for="title">Tournament Platfrom</label>
                          <br />
                          <select name="platform">
                            <option value="ps4">PlayStation 4</option>
                            <option value="xbox">XBOX</option>
                            <option value="pc">PC</option>
                            <option value="stadia">Google Stadia</option>
                          </select>
                        </p>
                        <p>
                          <label for="title">Game
                          </label>
                          <br />
                          <select name="game">
                                <option value="">Choose Game</option>
                                <option value="nba">NBA 2K19</option>
                                <option value="fortnite">FORTNITE</option>
                                <option value="cod">CALL OF DUTY BLACK OPS 3</option>
                                <option value="madden">MADDEN 19</option>
                                <option value="nbal">NBA LIVE 19</option>
                                <option value="tekken7">TEKKEN 7</option>
                                <option value="mortal">MORTAL KOMBAT</option>
                          </select>
                        </p>
                        <p>
                          <label for="title">Registeration Start Date
                          </label>
                          <br />
                          <input type="date" id="Price" value="" name="Registeration_Start_Date" />
                        </p>
                        <p>
                          <label for="title">Registeration Close Date
                          </label>
                          <br />
                          <input type="date" id="Price" value="" name="Registeration_Close_Date" />
                        </p>
                        <p>
                          <label for="title">Tournament Start Date
                          </label>
                          <br />
                          <input type="date" id="Price" value="" name="Tournament_Start_Date" />
                        </p>
                        <p>
                          <label for="title">Tournament Close Date
                          </label>
                          <br />
                          <input type="date" id="Price" value="" name="Tournament_Close_Date" />
                        </p>
                        <!-- Tournament prize -->
                        <p>
                          <label for="title">prize pool
                          </label>
                          <br />
                          <input type="text" name="prizepool" />
                        </p>
                        <!-- Tournament Firstprize -->
                        <p>
                          <label for="title">First prize
                          </label>
                          <br />
                          <input type="text" name="firstprize" />
                        </p>
                        <!-- Tournament Secondprize -->
                        <p>
                          <label for="title">Second prize
                          </label>
                          <br />
                          <input type="text" name="secondprize" />
                        </p>
                        <!-- Tournament Thirdprize -->
                        <p>
                          <label for="title">Third prize
                          </label>
                          <br />
                          <input type="text" name="thirdprize" />
                        </p>
                        <!-- Tournament Prize Thumbnail -->
                        <p>
                          <label for="title">Third prize
                          </label>
                          <br />
                          <input type="file" name="prizethumb" />
                        </p>
                        <!-- Tournament Total Players -->
                        <p>
                          <label for="title">Total Players
                          </label>
                          <br />
                          <select name="totalplayer">
                            <?php $x = 1; while($x <= 64) { ?>
                            <option value="<?php echo $x; ?>">
                              <?php echo $x; ?>
                            </option>
                            <?php $x++; }?>
                          </select>
                        </p>
                        <!-- Tournament type -->
                        <p>
                          <label for="title">Tournament type
                          </label>
                          <br />
                          <select name="bracket_type">
                            <option value="single">Single Elimination
                            </option>
                            <option value="double">Double Elimination
                            </option>
                          </select>
                        </p>
                        <!-- Tournament Description-->
                        <p>
                          <label for="description">Tournament Description
                          </label>
                          <br />
                          <textarea id="description" tabindex="3" name="description" cols="50" rows="6">
                          </textarea>
                        </p>
                        <p align="right">
                          <input type="submit" value="Publish" tabindex="6" id="submit" name="submit" />
                        </p>
                        <input type="hidden" name="action" value="new_post" />
                        <?php wp_nonce_field( 'new-post' ); ?>
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