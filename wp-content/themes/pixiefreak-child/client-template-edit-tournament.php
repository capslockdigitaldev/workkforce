<?php 
/*
Template Name: Client Edit Tournament
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
                        <h2>Edit Tournaments</h2>
                    </div>
                    <div class="col-lg-2">
                    </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Edit Tournament</h5>
                        </div>
                        <div class="ibox-content">
                                <?php
                                
                               if (isset ($_POST['oldtitle'])) 
                                   {
                                        $id = $_POST['postid'];
                                        $title = $_POST['oldtitle'];
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
                                    }
                                else{};
                                
                                
                                if (isset ($_POST['title'])) 
                                   {
                                            $id = $_POST['idd'];
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
                                            

                           
                                            // Update post
                                            $my_post = array(
                                            'ID'           => $id,
                                            'post_title'   => $title, // new title
                                            );
                                            
                                            // Update the post into the database
                                            wp_update_post( $my_post );

                            
                            
                                            // Update the post into the database
                                            update_field( 'tournament_price', $price, $id );
                                            update_field( 'platform', $platform, $id );
                                            update_field( 'game', $game, $id );
                                            update_field( 'registration_open_date', $Registeration_Start_Date, $id );
                                            update_field( 'registration_close_date_', $Registeration_Close_Date, $id );
                                            update_field( 'Tournament Start date', $Tournament_Start_Date, $id );
                                            update_field( 'Tournament End date', $Tournament_Close_Date, $id );
                                            update_field( 'tournament_type', $bracket_type, $id );
                                            update_field( 'bracket_type', $bracket_type, $id );
                                            update_field( 'brackets', $totalplayer, $id );
                                            update_field( 'tournament_rules', $description, $id );
                                            update_field( 'time', $totalplayer, $id );
                                            update_field( 'prizeone', $firstprize, $id );
                                            update_field( 'prizetwo', $secondprize, $id );
                                            update_field( 'prizethree', $thirdprize, $id );
                                            update_field( 'prizeimage', $prizethumb, $id );
                                            update_field( 'prizepool', $prizepool, $id );
                                            
                                            echo 'Post Updated';
    
                                    }
                                else{};
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                ?>
                                    <div id="postbox">
                                        <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
                                            <!-- Tournament Title -->
                                            <p>
                                              <label for="title">Tournament Title
                                              </label>
                                              <br />
                                              <input class="hide" type="text" name="idd" value="<?php echo $id; ?>">
                                              <input type="text" id="title" value="<?php echo $title; ?>" tabindex="1" size="20" name="title" />
                                            </p>
                                            <!-- Tournament Price -->
                                            <p>
                                              <label for="title">Tournament Price</label>
                                              <br />
                                              <input type="text" id="Price" value="<?php echo $price; ?>" tabindex="1" size="20" name="price" />
                                            </p>
                                            <!-- Tournament Platfrom -->
                                            <p>
                                              <label for="title">Tournament Platfrom</label>
                                              <br />
                                              <select name="platform">
                                                  <option value="<?php echo $platform; ?>"><?php echo $platform; ?></option>
                                                <option value="ps4">PlayStation 4</option>
                                                <option value="xbox">XBOX</option>
                                                <option value="pc">PC</option>
                                                <option value="stadia">Google Stadia</option>
                                              </select>
                                            </p>
                                            <!-- Tournament Game -->
                                            <p>
                                              <label for="title">Game
                                              </label>
                                              <br />
                                              <select name="game">
                                                    <option value="<?php echo $game; ?>"><?php echo $game; ?></option>
                                                    <option value="nba">NBA 2K19</option>
                                                    <option value="cod">CALL OF DUTY BLACK OPS 3</option>
                                                    <option value="fortnite">FORTNITE</option>
                                                    <option value="fifa">FIFA 19</option>
                                                    <option value="madden">MADDEN 19</option>
                                              </select>
                                            </p>
                                            <!-- Reg start Date -->
                                            <p>
                                              <label for="title">Registeration Start Date
                                              </label>
                                              <br />
                                              <input type="date" id="Price" value="<?php echo $Registeration_Start_Date; ?>" name="Registeration_Start_Date" />
                                            </p>
                                            <!-- Reg end Date -->
                                            <p>
                                              <label for="title">Registeration Close Date
                                              </label>
                                              <br />
                                              <input type="date" id="Price" value="<?php echo $Registeration_Close_Date; ?>" name="Registeration_Close_Date" />
                                            </p>
                                            <!-- Tournament Start Date -->
                                            <p>
                                              <label for="title">Tournament Start Date
                                              </label>
                                              <br />
                                              <input type="date" id="Price" value="<?php echo $Tournament_Start_Date; ?>" name="Tournament_Start_Date" />
                                            </p>
                                            <!-- Tournament end Date -->
                                            <p>
                                              <label for="title">Tournament Close Date
                                              </label>
                                              <br />
                                              <input type="date" id="Price" value="<?php echo $Tournament_Close_Date; ?>" name="Tournament_Close_Date" />
                                            </p>
                                            <!-- Tournament prize -->
                                            <p>
                                              <label for="title">prize pool
                                              </label>
                                              <br />
                                              <input type="text" name="prizepool" value="<?php echo $prizepool; ?>" />
                                            </p>
                                            <!-- Tournament Firstprize -->
                                            <p>
                                              <label for="title">First prize
                                              </label>
                                              <br />
                                              <input type="text" name="firstprize"  value="<?php echo $firstprize; ?>"/>
                                            </p>
                                            <!-- Tournament Secondprize -->
                                            <p>
                                              <label for="title">Second prize
                                              </label>
                                              <br />
                                              <input type="text" name="secondprize"  value="<?php echo $secondprize; ?>"/>
                                            </p>
                                            <!-- Tournament Thirdprize -->
                                            <p>
                                              <label for="title">Third prize
                                              </label>
                                              <br />
                                              <input type="text" name="thirdprize"  value="<?php echo $thirdprize; ?>"/>
                                            </p>
                                            <!-- Tournament Prize Thumbnail -->
                                            <p>
                                              <label for="title">Third prize
                                              </label>
                                              <br />
                                              <input type="file" name="prizethumb"  value="<?php echo $totalplayer; ?>"/>
                                            </p>
                                            <!-- Tournament Total Players -->
                                            <p>
                                              <label for="title">Total Players
                                              </label>
                                              <br />
                                              <select name="totalplayer">
                                                  <option value="<?php echo $bracket_type; ?>"><?php echo $bracket_type; ?></option>
                                                <?php $x = 1; while($x <= 32) { ?>
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
                                                  <option value="<?php ?>"><?php ?></option>
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
                                            <input type="hidden" name="action" value="Update" />
                                        </form>
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
    
    
   
