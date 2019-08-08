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
            $country = '91';
            ihs_send_order_sms( $message, $phone, $country );
            
            
            
            




           // $email_from = "no-reply@primetime.game";
           // $full_name = 'Primetime Gaming';
           // $from_mail = $full_name.'<'.$email_from.'>';
           // $from = $from_mail;
          //  $headers = $from;

                
            // send email
          //  mail("$user","Invitation For Tournament",$message, $headers);
             
            
            
            
            
            
            $checkusername = get_userdatabylogin($user);
            $checkuseremail = get_user_by( 'email', $user );
            
            if($checkusername){
                if($checkuseremail){
                        
                        $post_id = array (
                        'post_type' => 'notices',
                        'post_title' => 'test',
                        'post_content' => 'test',
                        'post_status' => 'publish',
                        );
                        
                        
                        date_default_timezone_set('America/Los_Angeles');
                        $date = date('m/d/Y h:i:s a', time());
                        
                        global $user_login; // If user is already logged in.
                        if ( is_user_logged_in() ) : $userr = $user_login;  endif; 
                        
                        $dates = date('Y-m-d');
                        
                        $post_i = wp_insert_post( $post_id );
                        
                        update_field( "user", $user, $post_i );
                        update_field( "time", $date , $post_i );
                        update_field( "date", $dates , $post_i );
                        update_field( "by", $userr , $post_i );
                        
                        
                        
                }
            
            echo "<p class='invii'>Invitiation sent!</p>";
            
            }
            else{
            }
            
            
            
        
        
              
    }; 
    ?>   
    
<?php
    /* Join The Tournament Function */ 
    if(isset  ($_POST['userplayer']) && ($_POST['touridd']) ) 
        {
                $price = $_POST['price'];
                $player = $_POST['userplayer'];
                $platform = $_POST['platform'];
                $touurid = $_POST['touridd'];
                
                $j = $_POST['joined'];
                $msg = ucwords($_POST['message']);
                $newjoin = $j + 1;
                $loop = new WP_Query( array( 'post_type' => 'bracket', 'paged' => $paged , 'meta_key' => 'tournamentid', 'meta_value' => $touurid ) );
                        if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post();
                                    $current_id = get_the_ID();
                                    $x = 0;
                                    while($x <= 64)
                                        {
                                            $isplayer = get_field('bracket'.$x.'player');
                                            $braketupdate = 'bracket'.$x.'player';
                                            if($isplayer == "") 
                                                {
                                                    echo $isplayer;
                                                    $postInfoo = array('post_type' => 'bracket', 'ID' => $current_id);
                                                    $idd = wp_update_post($postInfoo);
                                                    update_post_meta( $idd, $braketupdate, $player);
                                                    update_post_meta( $id, 'joined' , $newjoin );
                                                    //echo yay;
                                                    $x = 64;
                                                    $url = get_permalink();
                                                    echo 'Cheers! You have Joined this Tournament <a href="'.$url.'">Click here to See the Tournament Bracket</a>';
                                                        // $message = $msg;
                                                        // global $current_user, $wp_roles;
                                                        //$phone =  the_author_meta( 'description', $current_user->ID );
                                                        // $country = '1';
                                                        //ihs_send_order_sms( $message, $phone, $country );
                                                        //header("Refresh:0");
                                                        
                                                }
                                            else{ $x++; } 
                                        }
                                    endwhile;
                                    endif;
                            wp_reset_postdata();
            }
   
    
    /* Result Submittion of First Round */        
    if(isset ($_POST['score']) && $_POST['score'] != "")
        {
                $post_type = 'bracket';
                $id_post = $_POST['postid'];                
                $field = $_POST['fieldname'];
                $fieldtwo = $_POST['fieldnametwo'];
                $score = $_POST['score'];
                $scoretwo = $_POST['fieldresulttwo'];
                $otherplayer = $_POST['fieldplayertwo'];
                $otherplayerfield = $_POST['updateuser'];
                $nextroundfield = $_POST['updatefield'];
                $current_user = wp_get_current_user();
                $userlogged = $current_user->user_login ;
                $postInfo = array('post_type' => $post_type,'ID' => $id_post);
                $id = wp_update_post($postInfo);
                update_post_meta( $id, $field , $_POST['score'] );
                $count = get_post_meta( $id, 'joined2', true );
                $count++;
                update_post_meta( $id, 'joined2', $count );
                if ( is_wp_error( $post_id ) ) 
                    { echo $post_id->get_error_message(); }
                else 
                    {
                        if ($scoretwo == "")
                            {   
                                /* Other Player Havent Shared the  Result Yet */
                            }
                        else if($score > $scoretwo)
                            {   
                                /* Current Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('50' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array('post_type' => $post_type,'ID' => $id_post );
                                $idd = wp_update_post($postInfoo);
                                // update_post_meta( $idd, $nextroundfield , $score );
                                update_post_meta( $idd, $otherplayerfield , $userlogged );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'xp', $usedid );
                                $finalpoints = '10';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $userlogged );
                                    }
                                    else{ 
                                        echo 'nahh'; 
                                    }
                            }
                        else
                            {
                                /* Other Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('10' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array(
                                'post_type' => $post_type,
                                'ID' => $id_post
                                );
                                $idd = wp_update_post($postInfoo);
                                //update_post_meta( $idd, $nextroundfield , $scoretwo );
                                update_post_meta( $idd, $otherplayerfield , $otherplayer );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'XRWallet', $usedid );
                                $finalpoints = '5';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $otherplayer );
                                    }
                                    else{
                                        echo 'nahh';
                                    }
                            }  
                        }
                    }
                                
   
    /* Result Submittion of Second Round */
    if(isset ($_POST['nscore']) && $_POST['nscore'] != "")
        {
            $post_type = 'bracket';
            $id_post = $_POST['npostid'];                
            $field = $_POST['nfieldname'];
            $fieldtwo = $_POST['nfieldnametwo'];
            $score = $_POST['nscore'];
            $scoretwo = $_POST['nfieldresulttwo'];
            $otherplayer = $_POST['nfieldplayertwo'];
            $otherplayerfield = $_POST['nupdateuser'];
            $nextroundfield = $_POST['nupdatefield'];
            $current_user = wp_get_current_user();
            $userlogged = $current_user->user_login ;
            $winnerstatus = $_POST['addwinner'];
            
            if ($winnerstatus == 'yes' ){
                echo 'yass';
            }
            else{
                echo 'nahh';
            }
            
            $postInfo = array('post_type' => $post_type,'ID' => $id_post);
            $id = wp_update_post($postInfo);
            update_post_meta( $id, $field , $_POST['nscore'] );
            if ( is_wp_error( $post_id ) ) 
            {   echo $post_id->get_error_message();  }
            else 
            {   if ($scoretwo == "")
                    {   
                        /* Other Player Havent Shared the  Result Yet */
                    }
                else if($score > $scoretwo)
                    {
                        /* Current Player is Winning Here */
                                
                        $userrid = get_current_user_id(); 
                        $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                        $addbalance = ('50' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $userrid , $addbalance );
                    }
                else
                    {   
                        /* Other Player is Winning Here */
                        
                        $userrid = get_current_user_id(); 
                        $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                        $addbalance = ('10' + $currentxrcredit);
                        xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                        $postInfoo = array('post_type' => $post_type,'ID' => $id_post);
                        $idd = wp_update_post($postInfoo);
                        update_post_meta( $idd, $otherplayerfield , $otherplayer );
                    }  
            }
        }
    
    
    /* Result Submittion of Third Round */
    if(isset ($_POST['mscore']) && $_POST['mscore'] != "")
        {
            $post_type = 'bracket';
            $id_post = $_POST['mpostid'];                
            $field = $_POST['mfieldname'];
            $fieldtwo = $_POST['mfieldnametwo'];
            $score = $_POST['mscore'];
            $scoretwo = $_POST['mfieldresulttwo'];
            $otherplayer = $_POST['mfieldplayertwo'];
            $otherplayerfield = $_POST['mupdateuser'];
            $nextroundfield = $_POST['mupdatefield'];
            $current_user = wp_get_current_user();
            $userlogged = $current_user->user_login ;
            $postInfo = array(
            'post_type' => $post_type,
            'ID' => $id_post
            );
            $id = wp_update_post($postInfo);
            update_post_meta( $id, $field , $_POST['mscore'] );
                    if ( is_wp_error( $post_id ) ) 
                    {
                        echo $post_id->get_error_message();
                    }
                    else 
                    {
                        if ($scoretwo == "")
                        {
                             /* Other Player Havent Shared the  Result Yet */
                        }
                        else if($score > $scoretwo)
                        {   
                            /* Current Player is Winning Here */
                            
                            $userrid = get_current_user_id(); 
                            $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                            $addbalance = ('50' + $currentxrcredit);
                            xprofile_set_field_data( 'xp', $userrid , $addbalance );
                    
                            $postInfoo = array(
                            'post_type' => $post_type,
                            'ID' => $id_post
                            );
                            $idd = wp_update_post($postInfoo);
                            // update_post_meta( $idd, $nextroundfield , $score );
                            update_post_meta( $idd, $otherplayerfield , $userlogged );
                        }
                        else
                        {
                            /* Other Player is Winning Here */
                            
                            $userrid = get_current_user_id(); 
                            $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                            $addbalance = ('10' + $currentxrcredit);
                            xprofile_set_field_data( 'xp', $userrid , $addbalance );
                    
                            $postInfoo = array(
                            'post_type' => $post_type,
                            'ID' => $id_post
                            );
                            $idd = wp_update_post($postInfoo);
                            //update_post_meta( $idd, $nextroundfield , $scoretwo );
                            update_post_meta( $idd, $otherplayerfield , $otherplayer );
                        }  
                    }
        }
    
    /* Result Submittion of Fourth Round */        
    if(isset ($_POST['oscore']) && $_POST['oscore'] != "")
        {
                $post_type = 'bracket';
                $id_post = $_POST['opostid'];                
                $field = $_POST['ofieldname'];
                $fieldtwo = $_POST['ofieldnametwo'];
                $score = $_POST['oscore'];
                $scoretwo = $_POST['ofieldresulttwo'];
                $otherplayer = $_POST['ofieldplayertwo'];
                $otherplayerfield = $_POST['oupdateuser'];
                $nextroundfield = $_POST['oupdatefield'];
                $current_user = wp_get_current_user();
                $userlogged = $current_user->user_login ;
                $postInfo = array('post_type' => $post_type,'ID' => $id_post);
                $id = wp_update_post($postInfo);
                update_post_meta( $id, $field , $_POST['oscore'] );
                $count = get_post_meta( $id, 'joined2', true );
                $count++;
                update_post_meta( $id, 'joined2', $count );
                if ( is_wp_error( $post_id ) ) 
                    { echo $post_id->get_error_message(); }
                else 
                    {
                        if ($scoretwo == "")
                            {   
                                /* Other Player Havent Shared the  Result Yet */
                            }
                        else if($score > $scoretwo)
                            {   
                                /* Current Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('50' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array('post_type' => $post_type,'ID' => $id_post );
                                $idd = wp_update_post($postInfoo);
                                // update_post_meta( $idd, $nextroundfield , $score );
                                update_post_meta( $idd, $otherplayerfield , $userlogged );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'xp', $usedid );
                                $finalpoints = '10';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $userlogged );
                                    }
                                    else{ 
                                        echo 'nahh'; 
                                    }
                            }
                        else
                            {
                                /* Other Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('10' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array(
                                'post_type' => $post_type,
                                'ID' => $id_post
                                );
                                $idd = wp_update_post($postInfoo);
                                //update_post_meta( $idd, $nextroundfield , $scoretwo );
                                update_post_meta( $idd, $otherplayerfield , $otherplayer );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'XRWallet', $usedid );
                                $finalpoints = '5';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $otherplayer );
                                    }
                                    else{
                                        echo 'nahh';
                                    }
                            }  
                        }
                    } 
        
    /* Result Submittion of Fifth Round */        
    if(isset ($_POST['pscore']) && $_POST['pscore'] != "")
        {
                $post_type = 'bracket';
                $id_post = $_POST['ppostid'];                
                $field = $_POST['pfieldname'];
                $fieldtwo = $_POST['pfieldnametwo'];
                $score = $_POST['pscore'];
                $scoretwo = $_POST['pfieldresulttwo'];
                $otherplayer = $_POST['pfieldplayertwo'];
                $otherplayerfield = $_POST['pupdateuser'];
                $nextroundfield = $_POST['pupdatefield'];
                $current_user = wp_get_current_user();
                $userlogged = $current_user->user_login ;
                $postInfo = array('post_type' => $post_type,'ID' => $id_post);
                $id = wp_update_post($postInfo);
                update_post_meta( $id, $field , $_POST['pscore'] );
                $count = get_post_meta( $id, 'joined2', true );
                $count++;
                update_post_meta( $id, 'joined2', $count );
                if ( is_wp_error( $post_id ) ) 
                    { echo $post_id->get_error_message(); }
                else 
                    {
                        if ($scoretwo == "")
                            {   
                                /* Other Player Havent Shared the  Result Yet */
                            }
                        else if($score > $scoretwo)
                            {   
                                /* Current Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('50' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array('post_type' => $post_type,'ID' => $id_post );
                                $idd = wp_update_post($postInfoo);
                                // update_post_meta( $idd, $nextroundfield , $score );
                                update_post_meta( $idd, $otherplayerfield , $userlogged );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'xp', $usedid );
                                $finalpoints = '10';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $userlogged );
                                    }
                                    else{ 
                                        echo 'nahh'; 
                                    }
                            }
                        else
                            {
                                /* Other Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('10' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array(
                                'post_type' => $post_type,
                                'ID' => $id_post
                                );
                                $idd = wp_update_post($postInfoo);
                                //update_post_meta( $idd, $nextroundfield , $scoretwo );
                                update_post_meta( $idd, $otherplayerfield , $otherplayer );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'XRWallet', $usedid );
                                $finalpoints = '5';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $otherplayer );
                                    }
                                    else{
                                        echo 'nahh';
                                    }
                            }  
                        }
                    }
                    
        /* Result Submittion of Sixth Round */        
    if(isset ($_POST['qscore']) && $_POST['qscore'] != "")
        {
                $post_type = 'bracket';
                $id_post = $_POST['qpostid'];                
                $field = $_POST['qfieldname'];
                $fieldtwo = $_POST['qfieldnametwo'];
                $score = $_POST['qscore'];
                $scoretwo = $_POST['qfieldresulttwo'];
                $otherplayer = $_POST['qfieldplayertwo'];
                $otherplayerfield = $_POST['qupdateuser'];
                $nextroundfield = $_POST['qupdatefield'];
                $current_user = wp_get_current_user();
                $userlogged = $current_user->user_login ;
                $postInfo = array('post_type' => $post_type,'ID' => $id_post);
                $id = wp_update_post($postInfo);
                update_post_meta( $id, $field , $_POST['qscore'] );
                $count = get_post_meta( $id, 'joined2', true );
                $count++;
                update_post_meta( $id, 'joined2', $count );
                if ( is_wp_error( $post_id ) ) 
                    { echo $post_id->get_error_message(); }
                else 
                    {
                        if ($scoretwo == "")
                            {   
                                /* Other Player Havent Shared the  Result Yet */
                            }
                        else if($score > $scoretwo)
                            {   
                                /* Current Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('50' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array('post_type' => $post_type,'ID' => $id_post );
                                $idd = wp_update_post($postInfoo);
                                // update_post_meta( $idd, $nextroundfield , $score );
                                update_post_meta( $idd, $otherplayerfield , $userlogged );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'xp', $usedid );
                                $finalpoints = '10';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $userlogged );
                                    }
                                    else{ 
                                        echo 'nahh'; 
                                    }
                            }
                        else
                            {
                                /* Other Player is Winning Here */
                                
                                $userrid = get_current_user_id(); 
                                $currentxrcredit = xprofile_get_field_data( 'xp', $userrid );
                                $addbalance = ('10' + $currentxrcredit);
                                xprofile_set_field_data( 'xp', $userrid , $addbalance );
                                
                                $postInfoo = array(
                                'post_type' => $post_type,
                                'ID' => $id_post
                                );
                                $idd = wp_update_post($postInfoo);
                                //update_post_meta( $idd, $nextroundfield , $scoretwo );
                                update_post_meta( $idd, $otherplayerfield , $otherplayer );
                                $usedid = get_current_user_id(); 
                                $currentpoints = xprofile_get_field_data( 'XRWallet', $usedid );
                                $finalpoints = '5';
                                $addbalance = ($finalpoints + $currentpoints);
                                xprofile_set_field_data( 'xp', $usedid , $addbalance);
                                $winnerstatus = $_POST['addwinner'];
                                    if ($winnerstatus == 'yes' ){
                                       update_post_meta( $idd, 'winner' , $otherplayer );
                                    }
                                    else{
                                        echo 'nahh';
                                    }
                            }  
                        }
                    }
?>
    
<div class="main-content frontline mt-3">
    <?php while ( have_posts() ) : the_post(); ?>   
    <div class="leader-brd"><h3 class="mb-0"><?php the_title(); ?></h3></div>
        <?php $id = get_field( "tournament_id" );?>
        <div class="tabb">
            <div class="tabbable" id="tabs-937228">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#front1" data-toggle="tab">OVERVIEW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#front2" data-toggle="tab">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#front3" data-toggle="tab">BRACKETS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#front4" data-toggle="tab">MEDIA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#front5" data-toggle="tab">INVITE</a>
                    </li>
                </ul>
        			    	<div class="tab-content">
            				    <div class="tab-pane active" id="front1">
                				    <div class="tab-dec banner_tour">
                				        
                                        <?php  $game = get_field('game'); 
                                               
                                               if ($game == apex){
                                                ?><img src="/wp-content/uploads/2019/05/Apex.jpg"><?php   
                                               }
                                               else if ($game == fortnite){
                                                ?><img src="/wp-content/uploads/2019/05/FORTNITE-2.png"><?php   
                                               }
                                               else if ($game == codbo4){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty.png"><?php   
                                               }
                                               else if ($game == fifa){
                                                ?><img src="/wp-content/uploads/2019/05/fifa19.png"><?php   
                                               }
                                               else if ($game == nascar){
                                                ?><img src="/wp-content/uploads/2019/05/nascar.png"><?php   
                                               }
                                               else if ($game == nba){
                                                ?><img src="/wp-content/uploads/2019/05/NBA.png"><?php   
                                               }
                                               else if ($game == nbal){
                                                ?><img src="/wp-content/uploads/2019/05/NBA.png"><?php   
                                               }
                                               else if ($game == madden){
                                                ?><img src="/wp-content/uploads/2019/05/MADDEN.png"><?php   
                                               }
                                               else if ($game == csgo){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty-1.png"><?php   
                                               }
                                               else if ($game == nhl){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty-2.png"><?php   
                                               }
                                               else if ($game == mlb){
                                                ?><img src="/wp-content/uploads/2019/05/mlb.jpg"><?php   
                                               }
                                               else if ($game == codbo3){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty.png"><?php   
                                               }
                                               else if ($game == codmwr){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty.png"><?php   
                                               }
                                               else if ($game == rocketleague){
                                                ?><img src="/wp-content/uploads/2019/05/ocket-league.png"><?php   
                                               }
                                               else if ($game == supersmash){
                                                ?><img src="/wp-content/uploads/2019/05/call-of-duty-3.png"><?php   
                                               }
                                               else if ($game == pubg){
                                                ?><img src="/wp-content/uploads/2019/05/pubg.png"><?php   
                                               }
                                               else if ($game == mortal){
                                                ?><img src="/wp-content/uploads/2019/08/mortalbanner.png"><?php   
                                               }
                                               else if ($game == tekken){
                                                ?><img src="/wp-content/uploads/2019/08/tekkenbanner.png"><?php   
                                               }
                                               else{
                                                 echo $game;
                                               }
                                        ?>
                                        
                                        
                                        <div class=" p-2"><?php the_content(); ?></div>
                        			</div>
                				</div>
            					<div class="tab-pane" id="front2">
            					    <div class="tab-dec">
            					       <?php if ( is_user_logged_in() ){?> 
            					        <div class="join tournamnet">
            					            <?php 
            					            $tourid = get_field( "tournament_id" );
                                                $loop = new WP_Query( array( 'post_type' => 'bracket', 'paged' => $paged , 'meta_key' => 'tournamentid', 'meta_value' => $tourid ) );
                                                    if ( $loop->have_posts() ) :
                                                        while ( $loop->have_posts() ) : $loop->the_post();
                                                               $x = 1;
                                                               while($x <= 64){
                                                                                $isplayer = get_field('bracket'.$x.'player');
                                                                                $braketupdate = 'bracket'.$x.'player';
                                                                                global $user_login; // If user is already logged in.
                                                                                
                                                                                // echo '<br>player'.$x.'is'.$isplayer;
                                                                                // echo '<br>current user is'.$user_login;
                                                                                
                                                                                if($isplayer == $user_login) 
                                                                                {
                                                                                    echo 'You have already joined! <a href="/bracket/national-basketball-championship/">Click here to See the Tournament Bracket</a>';
                                                                                    
                                                                                    $joinedstatus = "joined";
                                                                                    $x = 64;
                                                                                }
                                                                                else if($isplayer == "") 
                                                                                {
                                                                                    echo '<a class="btn btn-primary jointoggle">Join</a>';    
                                                                                    $x = 64;
                                                                                }
                                                                        $x++; 
                                                               }
                                                        endwhile;
                                                    endif;
                                            wp_reset_postdata();
            					           

            					            
            					           // $useri = bp_loggedin_user_id(); 
            					           // $ps = bp_get_profile_field_data('field=psnid&user_id='.$useri); 
            					           // $psn = bp_get_profile_field_data('field=xboxid&user_id='.$useri); 
            					           // $psnn = bp_get_profile_field_data('field=steamid&user_id='.$useri); 
            					           // $psnnn = bp_get_profile_field_data('field=mobilegamertag&user_id='.$useri);
            					           // $currenttournamentplatform = get_field( "platform" );
            					           // $currenttournamentprice = get_field( "tournament_price" );
            					            
            					           //// if( $currenttournamentplatform == 'ps4' && $ps == "" ) 
                            // //                     {
                            // //                         echo'<p class="error">Please Update Your PlayStation 4 Gamerstag Before you Join This Tournament</p>';
                                                    
                            // //                     }
                            // //                 else if ($currenttournamentplatform == 'ps4' && $ps != "")
                            // //                     {
                            // //                         $bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri);
                            // //                             if ($currenttournamentprice > $bpct) 
                            // //                                 {
                            // //                                     echo'<p class="error">You Dont have Sufficient Primetime Bucks!<a id="modal-509828" href="#modal-container-509823" role="button" data-toggle="modal"> Click Here To Add Primetime Bucks to your Wallet</a></p>';  
                            // //                                 }
                            // //                             else
                            // //                                 {
                            //                                 ?>
                                                                <form action="" method="post" class="joiningform">
                                                                
                                                                <label>Tournament Price</label>
                                                                <input type="text" name="price" Value="<?php echo $currenttournamentprice ?> Primetime Bucks" >
                                                                
                                                                <label>Player Name</label>
                                                                <input type="text" name="userplayer" Value="<?php global $user_login; // If user is already logged in.
                                                                if ( is_user_logged_in() ) : echo $user_login;  endif; ?>" >
                                                                
                                                                <label>Playstation ID</label>
                                                                <input type="text" name="platform" Value="<?php echo $ps ?>" >
                                                                
                                                                <?php $tourrid = get_field( "tournament_id" );?>
                                                                <input class="hidden" type="text" name="touridd" value="<?php echo $tourrid; ?>">
                                                                
                                                                <?php $gam = get_field( "game" ); $plat = get_field( "platform" );  $tsd = get_field( "Tournament Start date" );  $timejoin = get_field( "time" ); $msghere = 'Cheers! '.$user_login.' You Have Joined the '.$gam.' '.$plat.' on '.$tsd.'. Be Ready at '.$timejoin ; ?>
                                                                <input class="hidden" type="text" name="message" value="<?php echo $msghere ?>">
                                                                
                                                                <?php $tourid = get_field( "tournament_id" );
                                                                $loop = new WP_Query( array( 'post_type' => 'bracket', 'paged' => $paged , 'meta_key' => 'tournamentid', 'meta_value' => $tourid ) );
                                                                if ( $loop->have_posts() ) :
                                                                while ( $loop->have_posts() ) : $loop->the_post();?>
                                                                
                                                                <?php $joined = get_field( "joined" );?>
                                                                <input class="hidden" type="text" name="joined" value="<?php  echo $joined; ?>">
                                                                
                                                                <?php   endwhile;
                                                                endif;
                                                                wp_reset_postdata(); ?>
                                                                
                                                                <input type="submit" Value="Join Now">
                                                                </form>
                                                             <?php
                                                //             }  
                                                // // } ?>
            					        </div>
            					        <?php }
                                        else{ 
            					                echo '<div class="join tournamnet"><p class="error">You Must Be Logged In to Join This Tournament!</p></div>';
            					            } ?> 
            					    </div>
            					</div>
            					<div class="tab-pane" id="front3">
            					    <div class="tab-dec">
                                        <div class="div2" id="div2">
                                            <div class="div1" id="div1">
                                                <main id="tournament">
                                                <?php $tourid = get_field( "tournament_id" );
                                                      $loop = new WP_Query( array( 'post_type' => 'bracket', 'paged' => $paged , 'meta_key' => 'tournamentid', 'meta_value' => $tourid ) );
                                                    if ( $loop->have_posts() ) :
                                                        while ( $loop->have_posts() ) : $loop->the_post();
                                                                $iswin = get_field('winner');
                                                                if($iswin == "") {} else { ?>
                                                                <p class="winner_win"><i class="fas fa-crown"> Winner</i><span><?php the_field('winner'); ?></span> </p>
                                                                <?php }?>
                                                <! --------------------------------------------–– Round 1 --------------------------------------------–– >                 
                                                                
                                                                <!–– Bracket Round 1 ––>
                                                                <ul class="round round-1 result">
                                                                <p>Round 1</p>
                                                                <?
                                                                $u ="0";
                                                                    $x = 1;
                                                                    $y = get_field( "totalplayers" );
                                                                    if ($y%2 != 0)
                                                                        {
                                                                            $y + 1;
                                                                        }
                                                                    $z = $y/2;
                                                                        while($x <= $z) 
                                                                            {  
                                                                                    $u++;
                                                                                     $isplayer = get_field('bracket'.$u.'player');
                                                                                    if($isplayer == "") 
                                                                                    {
                                                                                    ?>
                                                                                    <li class="game game-bottom"><span class="inv">N/A</span></li>
                                                                                    <?
                                                                                    }
                                                                                    else 
                                                                                    { ?>
                                                                                    <li class="game game-bottom"><?php the_field('bracket'.$u.'player'); ?> 
                                                                                        <span>
                                                                                        <?
                                                                                        $current_user = wp_get_current_user();
                                                                                        $userlogged = $current_user->user_login ;
                                                                                        $userlogged;
                                                                                        $playinguser = get_field('bracket'.$u.'player');
                                                                                        $haveresult = get_field('bracket'.$u.'result');
                                                                                        
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                              { 
                                                                                                 $id_post = get_the_ID();
                                                                                               // echo  $id_post;
                                                                                                $fieldname = 'bracket'.$u.'result';
                                                                                                $twoo = $u + 1;
                                                                                                $fieldnametwo = 'bracket'.$twoo.'result';
                                                                                                $fieldresulttwo = get_field('bracket'.$twoo.'result');
                                                                                                $fieldplayertwo = get_field('bracket'.$twoo.'player');
                                                                                                $updatedfield = '2bracket'.$x.'result';
                                                                                                $updateduser = '2bracket'.$x.'player';
                                                                                                //echo $fieldname;
                                                                                        ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                    <form class="formtoggle" action="" method="post">
                                                                                                        <div class="outer">
                                                                                                            <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                            <div class="logo-image text-center">
                                                                                                            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                            </div>
                                                                                                            <p>Submit Match Result</p>
                                                                                                            <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="score" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="postid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="updatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="updateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field( "joined" );
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 2)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                        </div>    
                                                                                                </form>
                                                                                        <?php
                                                                                              }
                                                                                            else 
                                                                                              { 
                                                                                                the_field('bracket'.$u.'result'); 
                                                                                              }
                                                                                        ?>
                                                                                        </span>
                                                                                    </li>
                                                                                    <?php } 
                                                                                    $u++;
                                                                                    $isplayer = get_field('bracket'.$u.'player');
                                                                                    if($isplayer == "") 
                                                                                    {
                                                                                    ?>
                                                                                    <li class="game game-bottom spa"><span class="inv">N/A</span></li>
                                                                                    <?
                                                                                    }
                                                                                    else 
                                                                                    {
                                                                                    ?>
                                                                                    <li class="game game-bottom spa"><?php the_field('bracket'.$u.'player'); ?> <span>
                                                                                        <?
                                                                                        $current_user = wp_get_current_user();
                                                                                        $userlogged = $current_user->user_login ;
                                                                                        $userlogged;
                                                                                        $playinguser = get_field('bracket'.$u.'player');
                                                                                        $haveresult = get_field('bracket'.$u.'result');
                                                                                       
                                                                                            if($haveresult == "" && $userlogged == $playinguser) 
                                                                                              { 
                                                                                                 $id_post = get_the_ID();
                                                                                               // echo  $id_post;
                                                                                                $fieldname = 'bracket'.$u.'result';
                                                                                                $twoo = $u - 1;
                                                                                                $fieldnametwo = 'bracket'.$twoo.'result';
                                                                                                $fieldresulttwo = get_field('bracket'.$twoo.'result');
                                                                                                $fieldplayertwo = get_field('bracket'.$twoo.'player');
                                                                                                $updatedfield = '2bracket'.$x.'result';
                                                                                                $updateduser = '2bracket'.$x.'player';
                                                                                                
                                                                                                //echo $fieldname;
                                                                                        ?>          
                                                                                        <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                        <form class="formtoggle" action="" method="post">
                                                                                                       
                                                                                                        <div class="outer">
                                                                                                            <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                             <div class="logo-image text-center">
                                                                                                            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                            </div>
                                                                                                            <p>Submit Match Result</p>
                                                                                                            <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="score" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="postid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="fieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="updatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="updateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field( "joined" );
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 2)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                                
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                        </div>    
                                                                                                </form>
                                                                                        <?php
                                                                                              }
                                                                                            else 
                                                                                              { 
                                                                                                the_field('bracket'.$u.'result'); 
                                                                                              }
                                                                                        ?>
                                                                                        
                                                                                    </span></li>
                                                                                   
                                                                                    <?php
                                                                                    }
                                                                                    
                                                                             $x++;
                                                                            }?>
                                                                </ul>
                                                                
                                                                <!–– Bracket Image Round 1 ––>
                                                                <ul class="round round-1 bracket"><?
                                                                $u ="0";
                                                                    $x = 1;
                                                                    $y = get_field( "totalplayers" );
                                                                    $z = $y/4;
                                                                        while($x <= $z) 
                                                                            { ?>
                                                                            <li><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/brack.png"></li>
                                                                            
                                                                             <?php 
                                                                             $x++;
                                                                            };
                                                                            ?>
                                                                </ul> 
                                                
                                                <! --------------------------------------------–– Round 2 --------------------------------------------–– >                
                                                                
                                                                <!–– Bracket Round 2 ––>
                                                                <ul class="round round-2 result"><p>Round 2</p>
                                                                 <?php
    
                                                                        $u ="0";
                                                                        $x = 1; 
                                                                        while($x <= $z) 
                                                                        {
                                                                            $u++;
                                                                            $isplayer = get_field('2bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                <li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><?php the_field('2bracket'.$u.'player'); ?> 
                                                                                    <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('2bracket'.$u.'player');
                                                                                    $haveresult = get_field('2bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '2bracket'.$u.'result';
                                                                                            $twoo = $u + 1;
                                                                                            $fieldnametwo = '2bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('2bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('2bracket'.$twoo.'player');
                                                                                            $updatedfield = '3bracket'.$x.'result';
                                                                                            $updateduser = '3bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                    ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="outer">
                                                                                                        <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                        <div class="logo-image text-center">
                                                                                                        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                        </div>
                                                                                                        <p>Submit Match Result</p>
                                                                                                        <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="nscore" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="npostid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="nupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field("joined");
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 4)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                    </div>    
                                                                                                </form>
                                                                                            
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('2bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li>
                                                                                <? } 
                                                                                $u++;
                                                                                $isplayer = get_field('2bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-bottom"><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                
                                                                                <li class="game game-bottom"><?php the_field('2bracket'.$u.'player'); ?> 
                                                                                <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('2bracket'.$u.'player');
                                                                                    $haveresult = get_field('2bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '2bracket'.$u.'result';
                                                                                            $twoo = $u - 1;
                                                                                            $fieldnametwo = '2bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('2bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('2bracket'.$twoo.'player');
                                                                                            $updatedfield = '3bracket'.$x.'result';
                                                                                            $updateduser = '3bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                    ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="outer">
                                                                                                        <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                        <div class="logo-image text-center">
                                                                                                        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                        </div>
                                                                                                        <p>Submit Match Result</p>
                                                                                                        <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="nscore" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="npostid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="nupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="nupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field("joined");
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 4)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                    </div>    
                                                                                                </form>
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('2bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li><?php
                                                                                }
                                                                                
                                                                                
                                                                         $x++;
                                                                        }?>
                                                                    </ul>
                                                                    
                                                                <!–– Bracket Image Round 2 ––>    
                                                                <ul class="round round-1 bracket brackettwo">
                                                                    <?php
                                                                    $u ="0";
                                                                    $x = 1;
                                                                    $y =  get_field( "totalplayers" );
                                                                    $z = $y/8;
                                                                    while($x <= $z) 
                                                                    { ?>
                                                                    <li><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/brack.png"></li>
                                                                    <?php  $x++; }; ?>
                                                                </ul>
                                                
                                                <! --------------------------------------------–– Round 3 --------------------------------------------–– >                
                                                                
                                                                <!–– Bracket Round 3 ––>
                                                                <ul class="round round-3 result"><p>Round 3</p>
                                                                    <?php
    
                                                                        $u ="0";
                                                                        $x = 1; 
                                                                        while($x <= $z) 
                                                                        {
                                                                            $u++;
                                                                            $isplayer = get_field('3bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                <li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom"><?php the_field('3bracket'.$u.'player'); ?> 
                                                                                    <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('3bracket'.$u.'player');
                                                                                    $haveresult = get_field('3bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '3bracket'.$u.'result';
                                                                                            $twoo = $u + 1;
                                                                                            $fieldnametwo = '3bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('3bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('3bracket'.$twoo.'player');
                                                                                            $updatedfield = '4bracket'.$x.'result';
                                                                                            $updateduser = '4bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                    ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                    <form class="formtoggle" action="" method="post">
                                                                                                        <div class="outer">
                                                                                                            <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                            <div class="logo-image text-center">
                                                                                                            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                            </div>
                                                                                                            <p>Submit Match Result</p>
                                                                                                            <div class="form-row">
                                                                                                                    <input class="form-control" type="text" name="mscore" placeholder="score">
                                                                                                                    <input class="hidden" type="text" name="mpostid" value="<?php echo $id_post; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                    <input class="hidden" type="text" name="mupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                    <?php
                                                                                                                    $joined = get_field("joined");
                                                                                                                    // echo $joined;
                                                                                                                    if ($joined == 8)
                                                                                                                          { ?>
                                                                                                                            <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                    <?php }
                                                                                                                    else  { ?>
                                                                                                                            <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                                <input type="submit" class="btn btn-primary mb-2">
                                                                                                        </div>    
                                                                                                    </form>
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('3bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li>
                                                                                 <? } 
                                                                                $u++;
                                                                                $isplayer = get_field('2bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-bottom"><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                
                                                                                <li class="game game-bottom"><?php the_field('3bracket'.$u.'player'); ?>
                                                                                    <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('3bracket'.$u.'player');
                                                                                    $haveresult = get_field('3bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '3bracket'.$u.'result';
                                                                                            $twoo = $u - 1;
                                                                                            $fieldnametwo = '3bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('3bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('3bracket'.$twoo.'player');
                                                                                            $updatedfield = '4bracket'.$x.'result';
                                                                                            $updateduser = '4bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                    ?>      
                                                                                            <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                    <form class="formtoggle" action="" method="post">
                                                                                                        <div class="outer">
                                                                                                            <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                            <div class="logo-image text-center">
                                                                                                            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                            </div>
                                                                                                            <p>Submit Match Result</p>
                                                                                                            <div class="form-row">
                                                                                                                    <input class="form-control" type="text" name="mscore" placeholder="score">
                                                                                                                    <input class="hidden" type="text" name="mpostid" value="<?php echo $id_post; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                    <input class="hidden" type="text" name="mupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                    <input class="hidden" type="text" name="mupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                    <?php
                                                                                                                    $joined = get_field("joined");
                                                                                                                    // echo $joined;
                                                                                                                    if ($joined == 8)
                                                                                                                          { ?>
                                                                                                                            <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                    <?php }
                                                                                                                    else  { ?>
                                                                                                                            <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                                <input type="submit" class="btn btn-primary mb-2">
                                                                                                        </div>    
                                                                                                    </form>
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('3bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li>
                                                                                <?php
                                                                                
                                                                                }
                                                                         $x++;
                                                                        }?>
                                                                </ul>
                                                               
                                                                <!–– Bracket Image Round 3 ––>    
                                                                <ul class="round round-4 bracket brackettwo"><?
                                                                            $u ="0";
                                                                            $x = 1;
                                                                            $y = get_field( "totalplayers" );
                                                                            $z = $y/16;
                                                                                while($x <= $z) 
                                                                                    { ?>
                                                                                    <li><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/brack.png"></li>
                                                                                    
                                                                                     <?php 
                                                                                     $x++;
                                                                                    };
                                                                                    ?>
                                                            </ul>
                                                
                                                <! --------------------------------------------–– Round 4 --------------------------------------------–– >                
                                                                
                                                                <!–– Bracket Round 4 ––>
                                                                <ul class="round round-4 result"><p>Round 4</p>
                                                                <?php
                                                                    $u ="0";
                                                                    $x = 1; 
                                                                    while($x <= $z) 
                                                                    {
                                                                        $u++;
                                                                        $isplayer = get_field('4bracket'.$u.'player');
                                                                            if($isplayer == "") 
                                                                            {?><li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> <? }
                                                                            else 
                                                                            { ?>
                                                                            <li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom"><?php the_field('4bracket'.$u.'player'); ?> 
                                                                                <span>
                                                                                <?
                                                                                $current_user = wp_get_current_user();
                                                                                $userlogged = $current_user->user_login ;
                                                                                $userlogged;
                                                                                $playinguser = get_field('4bracket'.$u.'player');
                                                                                $haveresult = get_field('4bracket'.$u.'result');
                                                                                    if($haveresult == "" && $userlogged == $playinguser) 
                                                                                      { 
                                                                                         $id_post = get_the_ID();
                                                                                       // echo  $id_post;
                                                                                        $fieldname = '4bracket'.$u.'result';
                                                                                        $twoo = $u + 1;
                                                                                        $fieldnametwo = '4bracket'.$twoo.'result';
                                                                                        $fieldresulttwo = get_field('4bracket'.$twoo.'result');
                                                                                        $fieldplayertwo = get_field('4bracket'.$twoo.'player');
                                                                                        $updatedfield = '5bracket'.$x.'result';
                                                                                        $updateduser = '5bracket'.$x.'player';
                                                                                        //echo $fieldname;
                                                                                ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                            <form class="formtoggle" action="" method="post">
                                                                                                <div class="outer">
                                                                                                    <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                    <div class="logo-image text-center">
                                                                                                    <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                    </div>
                                                                                                    <p>Submit Match Result</p>
                                                                                                    <div class="form-row">
                                                                                                            <input class="form-control" type="text" name="oscore" placeholder="score">
                                                                                                            <input class="hidden" type="text" name="opostid" value="<?php echo $id_post; ?>">
                                                                                                            <input class="hidden" type="text" name="ofieldname" value="<?php echo $fieldname; ?>">
                                                                                                            <input class="hidden" type="text" name="ofieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                            <input class="hidden" type="text" name="ofieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                            <input class="hidden" type="text" name="ofieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                            <input class="hidden" type="text" name="oupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                            <input class="hidden" type="text" name="oupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                            <?php
                                                                                                            $joined = get_field("joined");
                                                                                                            // echo $joined;
                                                                                                            if ($joined == 16)
                                                                                                                  { ?>
                                                                                                                    <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                            <?php }
                                                                                                            else  { ?>
                                                                                                                    <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                            <?php } ?>
                                                                                                        </div>
                                                                                                        <input type="submit" class="btn btn-primary mb-2">
                                                                                                </div>    
                                                                                            </form>
                                                                                <?php
                                                                                      }
                                                                                    else 
                                                                                      { 
                                                                                        the_field('4bracket'.$u.'result'); 
                                                                                      }
                                                                                ?>
                                                                                </span>
                                                                            </li>
                                                                             <? } 
                                                                            $u++;
                                                                            $isplayer = get_field('2bracket'.$u.'player');
                                                                            if($isplayer == "") 
                                                                            {?><li class="game game-bottom"><span class="inv">N/A</span></li> <? }
                                                                            else 
                                                                            { ?>
                                                                            
                                                                            <li class="game game-bottom"><?php the_field('4bracket'.$u.'player'); ?>
                                                                                <span>
                                                                                <?
                                                                                $current_user = wp_get_current_user();
                                                                                $userlogged = $current_user->user_login ;
                                                                                $userlogged;
                                                                                $playinguser = get_field('4bracket'.$u.'player');
                                                                                $haveresult = get_field('4bracket'.$u.'result');
                                                                                    if($haveresult == "" && $userlogged == $playinguser) 
                                                                                      { 
                                                                                         $id_post = get_the_ID();
                                                                                       // echo  $id_post;
                                                                                        $fieldname = '4bracket'.$u.'result';
                                                                                        $twoo = $u - 1;
                                                                                        $fieldnametwo = '4bracket'.$twoo.'result';
                                                                                        $fieldresulttwo = get_field('4bracket'.$twoo.'result');
                                                                                        $fieldplayertwo = get_field('4bracket'.$twoo.'player');
                                                                                        $updatedfield = '5bracket'.$x.'result';
                                                                                        $updateduser = '5bracket'.$x.'player';
                                                                                        //echo $fieldname;
                                                                                        ?>      <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="outer">
                                                                                                        <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                        <div class="logo-image text-center">
                                                                                                        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                        </div>
                                                                                                        <p>Submit Match Result</p>
                                                                                                        <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="oscore" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="opostid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="ofieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="ofieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="ofieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="ofieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="oupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="oupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field("joined");
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 16)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                    </div>    
                                                                                                </form>
                                                                                <?php
                                                                                      }
                                                                                    else 
                                                                                      { 
                                                                                        the_field('4bracket'.$u.'result'); 
                                                                                      }
                                                                                ?>
                                                                                </span>
                                                                            </li>
                                                                            <?php
                                                                            
                                                                            }
                                                                     $x++;
                                                                    }?>
                                                                </ul>
                                                                
                                                                <!–– Bracket Image Round 4 ––>
                                                                <ul class="round round-5 brackettwo"><?
                                                                    $u ="0";
                                                                    $x = 1;
                                                                    $y =  get_field( "totalplayers" );
                                                                    $z = $y/32;
                                                                        while($x <= $z) 
                                                                            { ?>
                                                                            <li><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/brack.png"></li>
                                                                            
                                                                             <?php 
                                                                             $x++;
                                                                            };
                                                                            ?>
                                                                </ul>
                                                
                                                <! --------------------------------------------–– Round 5 --------------------------------------------–– >                
                                                                
                                                                <!–– Bracket Round 5 ––>
                                                                <ul class="round round-5 result"><p>Round 5</p>
                                                                    <?php
                                                                        $u ="0";
                                                                        $x = 1; 
                                                                        while($x <= $z) 
                                                                        {
                                                                            $u++;
                                                                            $isplayer = get_field('5bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                <li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom"><?php the_field('5bracket'.$u.'player'); ?> 
                                                                                    <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('5bracket'.$u.'player');
                                                                                    $haveresult = get_field('5bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '5bracket'.$u.'result';
                                                                                            $twoo = $u + 1;
                                                                                            $fieldnametwo = '5bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('5bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('5bracket'.$twoo.'player');
                                                                                            $updatedfield = '6bracket'.$x.'result';
                                                                                            $updateduser = '6bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                    ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="outer">
                                                                                                        <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                        <div class="logo-image text-center">
                                                                                                        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                        </div>
                                                                                                        <p>Submit Match Result</p>
                                                                                                        <div class="form-row">
                                                                                                                <input class="form-control" type="text" name="pscore" placeholder="score">
                                                                                                                <input class="hidden" type="text" name="ppostid" value="<?php echo $id_post; ?>">
                                                                                                                <input class="hidden" type="text" name="pfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                <input class="hidden" type="text" name="pfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                <input class="hidden" type="text" name="pfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                <input class="hidden" type="text" name="pfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                <input class="hidden" type="text" name="pupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                <input class="hidden" type="text" name="pupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                <?php
                                                                                                                $joined = get_field("joined");
                                                                                                                // echo $joined;
                                                                                                                if ($joined == 32)
                                                                                                                      { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                <?php }
                                                                                                                else  { ?>
                                                                                                                        <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                <?php } ?>
                                                                                                            </div>
                                                                                                            <input type="submit" class="btn btn-primary mb-2">
                                                                                                    </div>    
                                                                                                </form>
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('5bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li>
                                                                                 <? } 
                                                                                $u++;
                                                                                $isplayer = get_field('2bracket'.$u.'player');
                                                                                if($isplayer == "") 
                                                                                {?><li class="game game-bottom"><span class="inv">N/A</span></li> <? }
                                                                                else 
                                                                                { ?>
                                                                                
                                                                                <li class="game game-bottom"><?php the_field('5bracket'.$u.'player'); ?>
                                                                                    <span>
                                                                                    <?
                                                                                    $current_user = wp_get_current_user();
                                                                                    $userlogged = $current_user->user_login ;
                                                                                    $userlogged;
                                                                                    $playinguser = get_field('5bracket'.$u.'player');
                                                                                    $haveresult = get_field('5bracket'.$u.'result');
                                                                                        if($haveresult == "" && $userlogged == $playinguser) 
                                                                                          { 
                                                                                             $id_post = get_the_ID();
                                                                                           // echo  $id_post;
                                                                                            $fieldname = '5bracket'.$u.'result';
                                                                                            $twoo = $u - 1;
                                                                                            $fieldnametwo = '5bracket'.$twoo.'result';
                                                                                            $fieldresulttwo = get_field('5bracket'.$twoo.'result');
                                                                                            $fieldplayertwo = get_field('5bracket'.$twoo.'player');
                                                                                            $updatedfield = '6bracket'.$x.'result';
                                                                                            $updateduser = '6bracket'.$x.'player';
                                                                                            //echo $fieldname;
                                                                                            ?>      <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                        <form class="formtoggle" action="" method="post">
                                                                                                            <div class="outer">
                                                                                                                <a class="cloose btn btn-primary mb-2 formtogglebutton">x</a>
                                                                                                                <div class="logo-image text-center">
                                                                                                                <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png" class="img-fluid">
                                                                                                                </div>
                                                                                                                <p>Submit Match Result</p>
                                                                                                                <div class="form-row">
                                                                                                                        <input class="form-control" type="text" name="pscore" placeholder="score">
                                                                                                                        <input class="hidden" type="text" name="ppostid" value="<?php echo $id_post; ?>">
                                                                                                                        <input class="hidden" type="text" name="pfieldname" value="<?php echo $fieldname; ?>">
                                                                                                                        <input class="hidden" type="text" name="pfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                                        <input class="hidden" type="text" name="pfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                                        <input class="hidden" type="text" name="pfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                                        <input class="hidden" type="text" name="pupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                                        <input class="hidden" type="text" name="pupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                                        <?php
                                                                                                                        $joined = get_field("joined");
                                                                                                                        // echo $joined;
                                                                                                                        if ($joined == 32)
                                                                                                                              { ?>
                                                                                                                                <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                                        <?php }
                                                                                                                        else  { ?>
                                                                                                                                <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                                        <?php } ?>
                                                                                                                    </div>
                                                                                                                    <input type="submit" class="btn btn-primary mb-2">
                                                                                                            </div>    
                                                                                                        </form>
                                                                                    <?php
                                                                                          }
                                                                                        else 
                                                                                          { 
                                                                                            the_field('5bracket'.$u.'result'); 
                                                                                          }
                                                                                    ?>
                                                                                    </span>
                                                                                </li>
                                                                                <?php
                                                                                
                                                                                }
                                                                         $x++;
                                                                        }?>

                                                                </ul>
                                                                
                                                                <!–– Bracket Image Round 5 ––>            
                                                                <ul class="round round-5 brackettwo"><?
                                                                    $u ="0";
                                                                    $x = 1;
                                                                    $y =  get_field( "totalplayers" );
                                                                    $z = $y/32;
                                                                        while($x <= $z) 
                                                                            { ?>
                                                                            <li><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/brack.png"></li>
                                                                            
                                                                             <?php 
                                                                             $x++;
                                                                            };
                                                                            ?>
                                                                </ul>
                                                
                                                <! --------------------------------------------–– Round 6 --------------------------------------------–– >                
                                                                
                                                                <!–– Bracket Round 6 ––>
                                                                <ul class="round round-6 result"><p>Round 6</p>
                                                                 <?php
                                                                    $u ="0";
                                                                    $x = 1; 
                                                                    while($x <= $z) 
                                                                    {
                                                                        $u++;
                                                                        $isplayer = get_field('6bracket'.$u.'player');
                                                                            if($isplayer == "") 
                                                                            {?><li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> <? }
                                                                            else 
                                                                            { ?>
                                                                            <li class="game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom"><?php the_field('6bracket'.$u.'player'); ?> 
                                                                                <span>
                                                                                <?
                                                                                $current_user = wp_get_current_user();
                                                                                $userlogged = $current_user->user_login ;
                                                                                $userlogged;
                                                                                $playinguser = get_field('6bracket'.$u.'player');
                                                                                $haveresult = get_field('6bracket'.$u.'result');
                                                                                    if($haveresult == "" && $userlogged == $playinguser) 
                                                                                      { 
                                                                                         $id_post = get_the_ID();
                                                                                       // echo  $id_post;
                                                                                        $fieldname = '6bracket'.$u.'result';
                                                                                        $twoo = $u + 1;
                                                                                        $fieldnametwo = '6bracket'.$twoo.'result';
                                                                                        $fieldresulttwo = get_field('6bracket'.$twoo.'result');
                                                                                        $fieldplayertwo = get_field('6bracket'.$twoo.'player');
                                                                                        $updatedfield = '7bracket'.$x.'result';
                                                                                        $updateduser = '7bracket'.$x.'player';
                                                                                        //echo $fieldname;
                                                                                ?>          <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="form-row">
                                                                                                        <input class="form-control" type="text" name="qscore" placeholder="score">
                                                                                                        <input class="hidden" type="text" name="qpostid" value="<?php echo $id_post; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldname" value="<?php echo $fieldname; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                        <input class="hidden" type="text" name="qupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                        <?php
                                                                                                        $joined = get_field("joined");
                                                                                                        // echo $joined;
                                                                                                        if ($joined == 64)
                                                                                                              { ?>
                                                                                                                <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                        <?php }
                                                                                                        else  { ?>
                                                                                                                <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                        <?php } ?>
                                                                                                    </div>
                                                                                                    <input type="submit" class="btn btn-primary mb-2">
                                                                                                </form>
                                                                                <?php
                                                                                      }
                                                                                    else 
                                                                                      { 
                                                                                        the_field('6bracket'.$u.'result'); 
                                                                                      }
                                                                                ?>
                                                                                </span>
                                                                            </li>
                                                                             <? } 
                                                                            $u++;
                                                                            $isplayer = get_field('2bracket'.$u.'player');
                                                                            if($isplayer == "") 
                                                                            {?><li class="game game-bottom"><span class="inv">N/A</span></li> <? }
                                                                            else 
                                                                            { ?>
                                                                            
                                                                            <li class="game game-bottom"><?php the_field('6bracket'.$u.'player'); ?>
                                                                                <span>
                                                                                <?
                                                                                $current_user = wp_get_current_user();
                                                                                $userlogged = $current_user->user_login ;
                                                                                $userlogged;
                                                                                $playinguser = get_field('6bracket'.$u.'player');
                                                                                $haveresult = get_field('6bracket'.$u.'result');
                                                                                    if($haveresult == "" && $userlogged == $playinguser) 
                                                                                      { 
                                                                                         $id_post = get_the_ID();
                                                                                       // echo  $id_post;
                                                                                        $fieldname = '6bracket'.$u.'result';
                                                                                        $twoo = $u - 1;
                                                                                        $fieldnametwo = '6bracket'.$twoo.'result';
                                                                                        $fieldresulttwo = get_field('6bracket'.$twoo.'result');
                                                                                        $fieldplayertwo = get_field('6bracket'.$twoo.'player');
                                                                                        $updatedfield = '7bracket'.$x.'result';
                                                                                        $updateduser = '7bracket'.$x.'player';
                                                                                        //echo $fieldname;
                                                                                ?>      
                                                                                                <a class="btn btn-primary mb-2 formtogglebutton">Submit Result</a>      
                                                                                                <form class="formtoggle" action="" method="post">
                                                                                                    <div class="form-row">
                                                                                                        <input class="form-control" type="text" name="pscore" placeholder="score">
                                                                                                        <input class="hidden" type="text" name="ppostid" value="<?php echo $id_post; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldname" value="<?php echo $fieldname; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldnametwo" value="<?php echo $fieldnametwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldresulttwo" value="<?php echo $fieldresulttwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qfieldplayertwo" value="<?php echo $fieldplayertwo; ?>">
                                                                                                        <input class="hidden" type="text" name="qupdatefield" value="<?php echo $updatedfield; ?>">
                                                                                                        <input class="hidden" type="text" name="qupdateuser" value="<?php echo $updateduser; ?>">
                                                                                                        <?php
                                                                                                        $joined = get_field("joined");
                                                                                                        // echo $joined;
                                                                                                        if ($joined == 64)
                                                                                                              { ?>
                                                                                                                <input class="hidden" type="text" name="addwinner" value="yes">
                                                                                                        <?php }
                                                                                                        else  { ?>
                                                                                                                <input class="hidden" type="text" name="addwinner" value="no">
                                                                                                        <?php } ?>
                                                                                                    </div>
                                                                                                    <input type="submit" class="btn btn-primary mb-2">
                                                                                                </form>
                                                                                <?php
                                                                                      }
                                                                                    else 
                                                                                      { 
                                                                                        the_field('6bracket'.$u.'result'); 
                                                                                      }
                                                                                ?>
                                                                                </span>
                                                                            </li>
                                                                            <?php
                                                                            
                                                                            }
                                                                     $x++;
                                                                    }?>   
                                                                </ul>
                                                                            
                                                     <? endwhile;
                                                        endif;
                                                        wp_reset_postdata(); ?>
                                                </main>   
                                              </div>
                                            </div>    
                                        
                					</div>
            					</div>
            					<div class="tab-pane" id="front4">
                					<div class="tab-dec mediatab">
                					    <img class="full_media" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/image/game.jpeg">
                					    <img class="half_media" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/image/game1.jpg">
                					    <img class="half_media" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/image/game2.jpeg">
                					</div>
            					</div>
            					<div class="tab-pane" id="front5">
            				    	<div class="tab-dec">
                					 <p class="mt-1 p-2">INVITE FRIENDS</p>
                					    <form action="" method="post" class="join invited">
                                                <label>Invite User</label>
                                                <input type="text" name="inviuser" placeholder="Email or Username">
                                            
                                                
                                                <?php $actual_link = 'http://primetime.game'.$_SERVER['REQUEST_URI']; ?>
                                                
                                                <input type="text" class="hidden" value="<?php echo $id; ?>" name="match_id">
                                                <input type="text" class="hidden" value="<?php echo $user ?> sent you an invitation to Join <?php 
                                            $game_name = get_field( "game" );
                                            if ($game_name == "nba"){ echo "NBA 2K19";}
                                            else if ($game_name == "fortnite"){echo "Fortnite";}
                                            else if ($game_name == "cod"){echo "CALL OF DUTY BLACK OPS 3";}
                                            else if ($game_name == "madden"){echo "MADDEN 19";}
                                            else if ($game_name == "fifa"){echo "FIFA 19";}
                                            ?>  Tournament on primetime.game. click here to join <?php echo $actual_link ?>" name="message">
                                                <input type="text" Placeholder="(000)-000-0000" name="phone">
                                                <input type="Submit" name="sendinvi" Value="Invite" >
                                        <form>
                                    </div>
                                </div>
        					</div>
    		</div>
            <div class="tabbable details" id="tabs-937229">
            	<ul class="nav nav-tabs mb-3">
            		<li class="nav-item">
            			<a class="nav-link active" href="#details1" data-toggle="tab">DETAILS</a>
            		</li>
            		<li class="nav-item">
            			<a class="nav-link" href="#details2" data-toggle="tab">RULES</a>
            		</li>
            		<li class="nav-item">
            			<a class="nav-link" href="#details3" data-toggle="tab">PRIZES</a>
            		</li>
            		<li class="nav-item">
            			<a class="nav-link" href="#details4" data-toggle="tab">SCHEDULE</a>
            		</li>
            		<li class="nav-item">
            			<a class="nav-link" href="#details5" data-toggle="tab">CONTACT</a>
            		</li>
            	</ul>
            	<div class="tab-content">
                        <div class="tab-pane active pl-4" id="details1">
                            <div class="col-md-6 pl-0">  
                            
                                <h5 class="mb-1"> <strong><?php the_title(); ?></strong></h5>
                                <p class="mb-3"><?php $value = get_field( "platform" );
                                if( $value == 'pc') {
                                echo'Computer';
                                }
                                else if( $value == 'ps4') {
                                echo'Play Station 4';
                                }
                                else if( $value == 'xbox') {
                                echo'XBOX';
                                }
                                ?></p> 
                                <hr>
                                <h3 class="mb-1"><small>Date & Time</small></h3>
                                <h5 class="mb-1"><strong><?php the_field('Tournament Start date'); ?></strong></h5> 	
                                <p class="mb-3"><?php the_field('time'); ?></p>
                                <hr>
                                <h3 class="mb-1"><small>Format</small></h3>
                                <h5 class="mb-1"><strong>1v1</strong></h5> 	
                                <p class="mb-4">Player Registration is allowed</p>
                                <hr>
                                <h3 class="mb-1"><small>Share Tournament on Facebook</small></h3>
                                <?php $actual_link = 'http://primetime.game'.$_SERVER['REQUEST_URI']; ?>
                                <div class="fb-share-button" 
                                data-href="<?php echo $actual_link ?>" 
                                data-layout="button_count">
                                </div>
                                <br>
                            </div>
                              
                            

                            
                        </div>
            	    	<div class="tab-pane pl-4" id="details2">
            	        	<h3 class="mb-4">Rules</h3>  
            	            	<div class="mb-4"><?php the_field('rules'); ?></div>
            		    </div>
            			<div class="tab-pane pl-4" id="details3">
            				<div class="col-md-12 d-flex pl-0">
            					<div class="col-md-6 pl-0">
            				    	<h3 class="mb-4">Prizes</h3>  
                					<h3 class="mb-1"><small>1st Prize</small></h3>
                					<p class="mb-3"><?php the_field('prizeone'); ?></p> 
                                    <h3 class="mb-1"><small>2nd Prize</small></h3>
                					<p class="mb-3"><?php the_field('prizetwo'); ?></p> 	
                                    <h3 class="mb-1"><small>3rd Prize</small></h3>
                					<p class="mb-3"><?php the_field('prizethree'); ?></p> 					
            					</div>
            					<div class="col-md-6">
            					    
            					    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <img class="image_gift" src="<?php echo $image[0]; ?>">
            					    
                                    <?php endif; ?>
            					</div>
            				</div>
            			</div>
            			<div class="tab-pane pl-4" id="details4">
            					<h3>Schedule</h3>
            					<h3 class="mb-1"><small>Registeration Closing</small></h3>
            					<p class="mb-3"><?php the_field('registration_close_date_'); ?></p> 
            					<h3 class="mb-1"><small>Tournament Start</small></h3>
            					<p class="mb-3"><?php the_field('Tournament Start date'); ?> <?php the_field('time'); ?></p>
            					<h3 class="mb-1"><small>Tournament End</small></h3>
            					<p class="mb-3"><?php the_field('Tournament End date'); ?></p> 
                        </div>
            			<div class="tab-pane" id="details5">
            				<h3 class="pl-4">Contact</h3>
            				<ul class="social-links">
            					<li><a href="<?php the_field('facebooksocial'); ?>">Facebook</a></li>
            					<li><a href="<?php the_field('twittersocial'); ?>">Twitter</a></li>
            					<li><a href="<?php the_field('igsocial'); ?>">Instagram</a></li>
            					<li><a href="<?php the_field('youtubesocial'); ?>">Youtube</a></li>
            				</ul>
            			</div>
            		</div>
            </div>
    	</div>
        <?php endwhile; // end of the loop. ?>	
    </div>		
</div>

<script>

var _startX = 0;
var _startY = 0;
var _offsetX = 0;			
var _offsetY = 0;
var _dragElement;
document.onmousedown = OnMouseDown;
document.onmouseup = OnMouseUp;

function OnMouseDown(event){
  document.onmousemove = OnMouseMove;
    _startX = event.clientX;
  _startY = event.clientY;
  _offsetX = document.getElementById('div1').offsetLeft;
  _offsetY = document.getElementById('div1').offsetTop;
  _dragElement = document.getElementById('div1');

}

function OnMouseMove(event){
    _dragElement.style.left = (_offsetX + event.clientX - _startX) + 'px';
  _dragElement.style.top = (_offsetY + event.clientY - _startY) + 'px';
}

function OnMouseUp(event){
  document.onmousemove = null;
  _dragElement=null;
}

</script>
<?php 
get_sidebar('right');
get_footer();
?>


                                                                            
                                                                               