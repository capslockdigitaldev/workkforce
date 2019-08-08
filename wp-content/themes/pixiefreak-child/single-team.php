<?php 
get_header();
get_sidebar('left');

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
                        'post_type' => 'notices',
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
                        
                        echo "<p class='invii'>Invitiation sent!</p>";
                        
                    
                    
                        // send email
                        $headers = "";
                        $headers .= "From: Primetime.game <no-reply@primetime.game> \r\n";
                        $headers .= "Reply-To:" . $from . "\r\n" ."X-Mailer: PHP/" . phpversion();
                        $headers .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
                        
                        mail($user,"Invitation To Team",$message,$headers);
                    
                    
                }
            }
            else{
            }
              
    };
    
?>

<div class="even_banner match" >

    	<div class="left_hand team_banner">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>"> <?php endif; ?>
        </div>

    	<div class="right_hand">
    		<h2><?php the_title(); ?></h2>
    		<p>Created By - <?php the_field("created_by"); ?></p>
    	</div>	
 </div>
    <div class="each_event_description match_info">
        
        <div class="playingparties rob teamplayer ">
        
        <?php 
            $player = get_field("player1");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player2");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player3");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player4");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player5");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player6");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player7");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player8");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player9");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
            $player = get_field("player10");
            if($player != ""){
                echo '<p><i class="fas fa-user-shield"></i>'.$player.'</p>';
            }
            
        ?>
        
        </div>
        

        <div class="playingparties rob ">
            <h4>Invite a Player</h4>
            <?
			    global $user_login; // If user is already logged in.
                if ( is_user_logged_in() ) : $user = $user_login;  endif; 
                        
				$palyerone = get_field('created_by');
					if($user == $palyerone)
					{   
					        ?>
					        <form action="" method="post" class="join invited">
					            
					            <input type="text" name="inviuser" placeholder="Email or Username">
					        
					            
					            <?php $actual_link = 'http://primetime.game'.$_SERVER['REQUEST_URI']; ?>
					            
					            <input type="text" class="hidden" name="match_id" value="<?php echo $id; ?>">
					            <input type="text" class="hidden" name="message" value="Abi have Invited you to join their team on primetime.game click here to join <?php echo $actual_link ?>">
					            <input type="text" Placeholder="(000)-000-0000" name="phone">
					            <input type="Submit" name="sendinvi" Value="Invite" >
					        <form>
					        <?
					}
					else{};  
			?> 
        </div>	
        

    </div>
</div>
<?php
get_sidebar('right');
get_footer();
?>


