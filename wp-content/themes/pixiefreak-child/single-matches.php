<?php 
get_header();
get_sidebar('left');

            $winner = get_field('winner');
            
            $player1 = get_field('player1');
            $player1result = get_field('player1score');
            $player1id = get_field('user_one_id');
            
            $player2 = get_field('player2');
            $player2result = get_field('player2score');
            $player2id = get_field('user_one_id');
            
            if($winner == "")
            {
                if($player1result == $player2result)
                {
                    // adding 50 Xperinece Points to Both Players
                    $currentxrcredit = xprofile_get_field_data( 'xp', $player1id );
                    $addbalance = ('50' + $currentxrcredit);
                    xprofile_set_field_data( 'xp', $player1id , $addbalance );
                    
                    // adding 50 Xperinece Points to Both Players
                    $currentxrcredit = xprofile_get_field_data( 'xp', $player2id );
                    $addbalance = ('50' + $currentxrcredit);
                    xprofile_set_field_data( 'xp', $player2id , $addbalance );
                        
                }
                else if($player1result > $player2result)
                {
                    $id = get_the_ID();
                    update_field( "winner", $player1 ,$id );
                    
                        // adding 50 Xperinece Points to the Winning Player that is Player 1
                        $currentxrcredit = xprofile_get_field_data( 'xp', $player1id );
                        $addbalance = ('50' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $player1id , $addbalance );
                        
                        // adding 10 Xperinece Points to the Loosing Player that is Player 2
                        $currentxrcredit = xprofile_get_field_data( 'xp', $player2id );
                        $addbalance = ('10' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $player2id , $addbalance );
                        
                }
                else if($player1result < $player2result)
                {
                    $id = get_the_ID();
                    update_field( "winner", $player2 ,$id );
                    
                        // adding 10 Xperinece Points to the Loosing Player that is Player 1
                        $currentxrcredit = xprofile_get_field_data( 'xp', $player1id );
                        $addbalance = ('10' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $player1id , $addbalance );
                        
                        // adding 50 Xperinece Points to the Winning Player that is Player 2
                        $currentxrcredit = xprofile_get_field_data( 'xp', $player2id );
                        $addbalance = ('50' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $player2id , $addbalance );
                        
                        
                }
            }
        


?>


<div class="col-md-6 col-sm-6 col-12 p-0">
    
<?php 

if($_POST['inviuser'])
    {
            $user = $_POST['inviuser'];
            $message = $_POST['message'];
            $phone = $_POST['phone'];
            $country = '1';
            ihs_send_order_sms( $message, $phone, $country );
            
            $checkusername = get_userdatabylogin($user);
            $checkuseremail = get_user_by( 'email', $user );
            
            if($checkusername){
                if($checkuseremail){
                    
                    
                        global $user_login; // If user is already logged in.
                        if ( is_user_logged_in() ) : $userr = $user_login;  endif; 
                        
                        $post_id = array (
                        'post_type' => 'matchnotices',
                        'post_title' => 'Invititation By'.$userr,
                        'post_content' => $message,
                        'post_status' => 'publish',
                        );
                        
                        date_default_timezone_set('America/Los_Angeles');
                        $date = date('m/d/Y h:i:s a', time());
                        
                        
                        
                        $dates = date('Y-m-d');
                        
                        $post_i = wp_insert_post( $post_id );
                        
                        update_field( "user", $user, $post_i );
                        update_field( "time", $date , $post_i );
                        update_field( "date", $dates , $post_i );
                        update_field( "by", $userr , $post_i );
                        
                        
                        // send email
                        $headers = "";
                        $headers .= "From: Primetime.game <no-reply@primetime.game> \r\n";
                        $headers .= "Reply-To:" . $from . "\r\n" ."X-Mailer: PHP/" . phpversion();
                        $headers .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
                        
                        mail($user,"Challenge Accepted?",$message,$headers);
                        
                        echo "<p class='invii'>Invitiation sent!</p>";
                        
                }
            }
            else{
            }
              
    };
    
?>

<div class="even_banner match" >

    	<div class="left_hand">
                <?php 
                    $game_name = get_field( "game" );
                    echo $game_name;
                    if ($game_name == "nba"){
                        ?>
                        <img src="http://primetime.game/wp-content/uploads/2019/07/NBA2K19-Front.png">
                        <?
                    }
                    else if ($game_name == "nbal"){
                        ?>
                            <img src="http://primetime.game/wp-content/uploads/2019/07/Nba-Live.png">
                        <?
                    }
                    else if ($game_name == "fortnite"){
                        ?>
                        <img src="http://primetime.game/wp-content/uploads/2019/07/Fortnite-Front.png">
                        <?
                    }
                    else if ($game_name == "cod"){
                        ?>
                        <img src="http://primetime.game/wp-content/uploads/2019/07/COD-BO3-Front.png">
                        <?
                    }
                    else if ($game_name == "madden"){
                        ?>
                        <img src="http://primetime.game/wp-content/uploads/2019/07/madden19.png">
                        <?
                    }
                    else if ($game_name == "fifa"){
                        ?>
                        <img src="http://primetime.game/wp-content/uploads/2019/07/FIFA199.png">
                        <?
                    }
                ?> 
    	</div>
    	<div class="right_hand">
    		<h2>
    		    <?php 
                    $game_name = get_field( "game" );
                     if ($game_name == "nba"){ echo "NBA 2K19";}
                    else if ($game_name == "nbal"){echo "NBA Live 19";} 
                    else if ($game_name == "fortnite"){echo "Fortnite";}
                    else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                    else if ($game_name == "madden"){echo "MADDEN 19";}
                    else if ($game_name == "fifa"){echo "FIFA 19";}
                ?> - 
                <?php 
                    $game_name = get_field( "platform" );
                         if ($game_name == "ps4"){ echo "PlayStation 4";}
                    else if ($game_name == "xbox"){echo "XBOX";}
                    else if ($game_name == "pc"){echo "PC";}
                ?>
    		</h2>
    		<p>
    		    <?php 
                    $game_name = get_field( "game" );
                         if ($game_name == "nba"){ echo "NBA 2K19";}
                    else if ($game_name == "nbal"){echo "NBA Live 19";} 
                    else if ($game_name == "fortnite"){echo "Fortnite";}
                    else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                    else if ($game_name == "madden"){echo "MADDEN 19";}
                    else if ($game_name == "fifa"){echo "FIFA 19";}
                ?>
    		</p>
    	</div>	
    </div>
    <div class="each_event_description match_info">
        <div class="playingparties rob <?php if($player1 == $winner){ echo "winner"; } ?><?php if($winner == "draw"){ echo "draw"; } ?>">
                <div class="join">
                    <?php if($player1 == $winner){ echo "<p class='wintag'>winner</p>"; } ?> <?php if($winner == "draw"){ echo "<p class='wintag'>Draw</p>"; } ?>
                    <h2 class="jdm">Open Ladder Challenge</h2>
                    <h4>Game</h4>
                    <p>
                    <?php 
                    $game_name = get_field( "game" );
                         if ($game_name == "nba"){ echo "NBA 2K19";}
                    else if ($game_name == "nbal"){echo "NBA Live 19";} 
                    else if ($game_name == "fortnite"){echo "Fortnite";}
                    else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                    else if ($game_name == "madden"){echo "MADDEN 19";}
                    else if ($game_name == "fifa"){echo "FIFA 19";}
                    ?>
                    </p>
                    <h4>Game Platform</h4>
                    <p>
                    <?php 
                    $game_name = get_field( "platform" );
                    if ($game_name == "ps4"){ echo "PlayStation 4";}
                    else if ($game_name == "xbox"){echo "XBOX";}
                    else if ($game_name == "pc"){echo "PC";}
                    ?>
                    </p>
                    <h4>Opponent Username</h4>
                    <p><?php the_field('player1'); ?></p>
                    
                    <h4>Gamertag</h4>
                    <p>
                    <?php
                    $playertwoo = get_field('player2');
                    $pogt = get_field('player_one_gt');
                    if($playertwoo == "")
                    {
                        echo "Accept the Challenge to See This Field.";
                    }
                    else{
                        echo $pogt;
                    }
                    ?>    
                        
                    </p>
                    
                    <div class="matchresult">
                    <?php
                    
                    global $user_login; // If user is already logged in.
                    if ( is_user_logged_in() ) : $user = $user_login;  endif;
                    
                    $palyerone = get_field('player1');
                    $palyeronescore = get_field('player1score');
                    $palyertwo = get_field('player2');
                    $palyertwoscore = get_field('player2score');
                    
                    //showing results to the second player if they have submitted result
                    
                    if($user == $palyertwo && $palyertwoscore != "" && $palyeronescore != "")
                    {
                        echo "Players Score : ".$palyeronescore;
                    }
                    
                    //showing results to the Player One if they have submitted result
                    
                    if($user == $palyerone)
                        {
                            $joinedplayerone = get_field('player1');
                            $joinedplayertwo = get_field('player2');
                            $playeroneresult = get_field('player1score');
                            
                            if($joinedplayertwo == "")
                            {
                            echo "Match Status : Open";
                            }
                            else{
                            
                            if($_POST['submitresult'])
                                {
                                    $result = $_POST['result'];
                                    update_field( "player1score", $_POST['result'] , $_POST['match_id'] );
                                    echo "Your Score : ".$result;
                                }
                            else 
                                {
                                    if($playeroneresult == "")
                                       {
                                           $id = get_the_ID(); 
                                        ?>
                                            <form method="post">
                                                <input type="text" class="hidden" value="<?php echo $id; ?>" name="match_id">
                                                <input type="text" name="result">
                                                <input type="submit" name="submitresult" value="Submit Result">
                                            </form>
                                        <?
                                       }
                                       else{
                                           echo "Your Score : ".$playeroneresult;
                                       }
                                }
                            }
                        }
                    else
                        {
                            
                        }
                    ?>
                    </div>
                </div>
            </div>
        <div class="playingparties rob <?php if($player2 == $winner && $player2 != ""){ echo "winner"; } ?> <?php if($winner == "draw"){ echo "draw"; } ?>">
            <?php
                $playertwoo = get_field('player2');
                if($playertwoo == "")
                    {
                        if($_POST['joinmatch'])
                        {
                            update_field( "player2", $_POST['player_name'] , $_POST['match_id'] );
                            update_field( "player_two_gt", $_POST['player_gamertag'] , $_POST['match_id'] );
                            update_field( "user_two_id", $_POST['user_id'], $post_i );
                            
                            echo "<p class='JoinedMatch'>You've Joined the Match, Opponet Will be Notified!<a href='/active-matches'>Click here to go to your active matches</a></p>"; 
                        }
                        else
                            {   
                            ?>
                            <form method="post" class="join">
                                <h2 class="jdm">Join This Match</h2>
                                <?php 
                                if ( is_user_logged_in() )
                                                {
                                                    global $user_login; // If user is already logged in.
                                                    if ( is_user_logged_in() ) : $user = $user_login;  endif;
                                                    
                                                    $palyerone = get_field('player1');
                                                    
                                                    if($user == $palyerone)
                                                    {
                                                            echo "<div class='cant_accept'><p class='oo'>OOPS</p>";
                                                            echo "You are Awesome, Don't Challenge Yourself!</div>";
                                                    }
                                                    else{
                                                            $id = get_the_ID(); 
                                                            ?>
                                                            <input type="text" class="hidden" value="<?php echo $id; ?>" name="match_id">
                                                            <input type="text" name="user_id" class="hidden" value="<?php $userid = get_current_user_id(); echo $userid; ?>">
                                                            
                                                            <h4>Gamertag</h4>
                                                            <input class="editable" type="" value="<?php 
                                                                $game_name = get_field( "platform" );
                                                                     if ($game_name == "ps4")
                                                                        { 
                                                                            $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=psnid&user_id='.$useri); echo $psn;
                                                                        }
                                                                else if ($game_name == "xbox")
                                                                        {
                                                                            $useri = bp_loggedin_user_id(); $psn = bp_get_profile_field_data('field=xboxid&user_id='.$useri); echo $psn;
                                                                        }
                                                                else if ($game_name == "pc")
                                                                        {
                                                                            echo "PC";
                                                                        }
                                                            ?>" name="player_gamertag">
                                                            <h4>Username</h4>
                                                            <input class="noedit" type="" value="<?php echo $user ?>" name="player_name">
                                                            <h4>Game Platform</h4>
                                                            <input class="noedit" type="" value="<?php 
                                                                $game_name = get_field( "platform" );
                                                                     if ($game_name == "ps4"){ echo "PlayStation 4";}
                                                                else if ($game_name == "xbox"){echo "XBOX";}
                                                                else if ($game_name == "pc"){echo "PC";}
                                                            ?>">
                                                            <input type="submit" value="Challenge Accepted" name="joinmatch">
                                                            <?php
                                                        }
                                
                                                }
                                else
                                                {
                                                    echo "<div class='cant_accept'><p class='oo'>OOPS!</p>";
                                                    echo "You Must Be Logged in to Accept This Challenge!";
                                                    echo '<a class="cmlogin" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Log in</a>';
                                                    echo '<a class="cmsignup" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">New User? Sign up</a></div>';
                                                }
                                ?>
                            </form>
                            
                            <?php
                            
                            if ( is_user_logged_in() )
                                    {
                                        global $user_login; // If user is already logged in.
                                        if ( is_user_logged_in() ) : $user = $user_login;  endif;
                                        
                                        $palyerone = get_field('player1');
                                        if($user == $palyerone)
                                        {   
                                                ?>
                                                <form action="" method="post" class="join invited">
                                                    <label>Invite User</label>
                                                    <input type="text" name="inviuser" placeholder="Email or Username">
                                                
                                                    
                                                    <?php $actual_link = 'http://primetime.game'.$_SERVER['REQUEST_URI']; ?>
                                                    
                                                    <input type="text" class="hidden" value="<?php echo $id; ?>" name="match_id">
                                                    <input type="text" class="hidden" value="<?php echo $user ?> challenged you to a game of <?php 
                                                $game_name = get_field( "game" );
                                                     if ($game_name == "nba"){ echo "NBA 2K19";}
                                                else if ($game_name == "nbal"){echo "NBA Live 19";} 
                                                else if ($game_name == "fortnite"){echo "Fortnite";}
                                                else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                                                else if ($game_name == "madden"){echo "MADDEN 19";}
                                                else if ($game_name == "fifa"){echo "FIFA 19";}
                                                ?> on primetime.game. click here to join <?php echo $actual_link ?>" name="message">
                                                    <input type="text" Placeholder="(000)-000-0000" name="phone">
                                                    <input type="Submit" name="sendinvi" Value="Invite" >
                                                <form>
                                                <?
                                        }
                                        else{};
                                    }; 
                            
                        };
                    }
                else{
                    ?>
                    
                    <div class="join">
                        <?php if($player2 == $winner){ echo "<p class='wintag'>winner</p>"; } ?> <?php if($winner == "draw"){ echo "<p class='wintag'>Draw</p>"; } ?>
                        <h2 class="jdm">Challenge Accepted</h2>
                        <h4>Game</h4>
                        <p>
                        <?php 
                        $game_name = get_field( "game" );
                             if ($game_name == "nba"){ echo "NBA 2K19";}
                        else if ($game_name == "nbal"){echo "NBA Live 19";} 
                        else if ($game_name == "fortnite"){echo "Fortnite";}
                        else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                        else if ($game_name == "madden"){echo "MADDEN 19";}
                        else if ($game_name == "fifa"){echo "FIFA 19";}
                        ?>
                        </p>
                        <h4>Game Platform</h4>
                        <p>
                        <?php 
                        $game_name = get_field( "platform" );
                        if ($game_name == "ps4"){ echo "PlayStation 4";}
                        else if ($game_name == "xbox"){echo "XBOX";}
                        else if ($game_name == "pc"){echo "PC";}
                        ?>
                        </p>
                        <h4>Challenge Accepted By</h4>
                        <p><?php the_field('player2'); ?></p>
                        
                        <h4>Gamertag</h4>
                        <p><?php the_field('player_two_gt'); ?></p>
                        
                        
                        <div class="matchresult">
                            <?php
                            global $user_login; // If user is already logged in.
                            if ( is_user_logged_in() ) : $user = $user_login;  endif;
                            
                            $palyerone = get_field('player1');
                            $palyeronescore = get_field('player2score');
                            $palyertwo = get_field('player2');
                            $palyertwoscore = get_field('player2score');
                            
                            //showing results to the second player if they have submitted result
                            
                            if($user == $palyerone && $palyeronescore != "" && $palyertwoscore != "")
                            {
                                echo "Players Score : ".$palyertwoscore;
                            }
                            
                            //showing results to the Player Two if they have submitted result
                            
                            if($user == $palyertwo)
                                {
                                    $joinedplayerone = get_field('player1');
                                    $joinedplayertwo = get_field('player2');
                                    $playertworesult = get_field('player2score');
                                    $gayme = get_field('game');
                                    
                                    if($_POST['submittworesult'])
                                        {
                                            $result = $_POST['result'];
                                            update_field( "player2score", $_POST['result'] , $_POST['match_id'] );
                                            echo "Your Score : ".$result;
                                        }
                                    else 
                                        {
                                            if($playertworesult == "")
                                               {
                                                   $id = get_the_ID(); 
                                                ?>
                                                    <form method="post">
                                                        <input class="hidden" id="watthegame" value="<?php echo $gayme; ?>">
                                                        <input type="text" class="hidden" value="<?php echo $id; ?>" name="match_id">
                                                        <input type="text" id="wattheresult" name="result">
                                                        <input type="submit" name="submittworesult" value="Submit Result">
                                                    </form>
                                                <?
                                               }
                                               else{
                                                   echo "Your Score : ".$playertworesult;
                                               }
                                        }
                                    
                                }
                            else
                                {}
                            ?>
                        </div>
                    </div>
                    <?php
                }    
            ?>
        </div>    
    </div>
</div>
<?php
get_sidebar('right');
get_footer();
?>


