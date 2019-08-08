<?php 
get_header();
?>
<div class="only_phone"> 
<?
get_sidebar('left');
?>
</div>

<?php

        
        /* Join The Tournament Function */ 
        if(isset ($_POST['price']) && ($_POST['userplayer']) && ($_POST['platform']) && ($_POST['touridd']) ) 
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
                                                        $message = $msg;
                                                        global $current_user, $wp_roles;
                                                        $phone =  the_author_meta( 'description', $current_user->ID );
                                                        $country = '1';
                                                        ihs_send_order_sms( $message, $phone, $country );
                                                        header("Refresh:0");
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

    <div class="bracket_single">
        <div class="brack_header">
            <div class="left_bracketheader">
                <h2>PRIMETIME GAMING</h2>
                <p>TOURNAMENT BRACKET</p>
            </div>
            <div class="right_bracketheader">
                <img src="/wp-content/themes/pixiefreak-child/image/logo.png">
            </div>   
        </div>
        <div class="singlebracket_outer">
        
        
            <!–– Bracket Round 1 ––>
            <ul class="round round-1 result">
                <p>Round 1</p>
                        <?
                        
                        $u ="0";
                        $x = 1;
                        $y = get_field( "totalplayers" );
                        if ($y%2 != 0)
                        { $y + 1; }
                        $z = $y/2;
                        
                        while($x <= $z) 
                            {  
                                        $u++;
                                        $isplayer = get_field('bracket'.$u.'player');
                                        
                                    if($isplayer == "") 
                                        {   ?>
                                        <li class="<?php echo $z; ?> game game-bottom upper_bracket"><span class="inv">N/A</span></li>
                                    <?  }
                                    else 
                                        { ?>
                                        <li class="game game-bottom upper_bracket"><?php the_field('bracket'.$u.'player'); ?> 
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
                                <?php   } 
                                        $u++;
                                        $isplayer = get_field('bracket'.$u.'player');
                                        if($isplayer == "") 
                                        {   ?>
                                    <li class="game game-bottom spa lower_bracket"><span class="inv">N/A</span></li>
                                <?php    }
                                    else 
                                        {   ?>
                                        <li class="game game-bottom spa lower_bracket"><?php the_field('bracket'.$u.'player'); ?> <span>
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
                                                
                                            </span>
                                        </li>
                                <?php    }
                                    
                                    $x++;
                            } ?>
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
                                            {?>
                                                <li class="<?php echo $z; ?> game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> 
                                    <?php   }
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
                                    <?php   } 
                                        $u++;
                                        $isplayer = get_field('2bracket'.$u.'player');
                                        
                                        if($isplayer == "") 
                                            {   ?>
                                            <li class="game game-bottom"><span class="inv">N/A</span></li>
                                    <?php   }
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
                                        </li>
                                    <?php   }
                                        $x++;
                            }?>
                </ul>
                
            <!–– Bracket Image Round 2 ––>    
            <ul class="round round-2 bracket brackettwo">
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
                                        {   ?>
                                            <li class="<?php echo $z; ?> game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> 
                                <?php  }
                                        else 
                                        {   ?>
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
                                <?php  } 
                                        $u++;
                                        $isplayer = get_field('2bracket'.$u.'player');
                                        if($isplayer == "") 
                                        {   ?>
                                            <li class="game game-bottom"><span class="inv">N/A</span></li> 
                                <?php  }
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
                                <?php   }
                                    $x++;
                            }?>
            </ul>
           
            <!–– Bracket Image Round 3 ––>    
            <ul class="round round-3 bracket brackettwo"><?
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
                                            {   ?>
                                                <li class="<?php echo $z; ?> game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> 
                                    <?php   }
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
                                    <?php   } 
                                    $u++;
                                    $isplayer = get_field('2bracket'.$u.'player');
                                    if($isplayer == "") 
                                            {   ?>
                                                <li class="game game-bottom"><span class="inv">N/A</span></li> <? }
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
                                    <?php   }
                                    $x++;
                            }?>
            </ul>
            
            <!–– Bracket Image Round 4 ––>
            <ul class="round round-4 brackettwo"><?
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
                                    {   ?>
                                        <li class="<?php echo $z; ?> game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> 
                            <?php   }
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
                            <?php   }
                                    $u++;
                                    $isplayer = get_field('2bracket'.$u.'player');
                                    if($isplayer == "") 
                                    {   ?>
                                <li class="game game-bottom"><span class="inv">N/A</span></li> 
                            <?php   }
                            else 
                                    {   ?>
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
                            <?php   }
                                $x++;
                    }?>
        
            </ul>
            
            <!–– Bracket Image Round 5 ––>            
            <ul class="round round-5 brackettwo"><?
                $u ="0";
                $x = 1;
                $y =  get_field( "totalplayers" );
                $z = $y/64;
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
                                        {   ?>
                                            <li class="<?php echo $z; ?> game game-top winner <?php if ($x == 1){?>First <? } ?> game-bottom "><span class="inv">N/A</span></li> 
                                <?php   }
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
                                 <?php   } 
                                        $u++;
                                        $isplayer = get_field('2bracket'.$u.'player');
                                if($isplayer == "") 
                                        {   ?>
                                            <li class="game game-bottom"><span class="inv">N/A</span></li> 
                                <?php   }
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
                                <?php   }
                                    $x++;
                    }?>   
            </ul>
        
        
        </div>  
    </div>
    
    <script>
            $(document).ready(function() {
        // Call refresh page function after 5000 milliseconds (or 5 seconds).
        setInterval('refreshPage()', 30000);
    });

    function refreshPage() { 
        location.reload(); 
    }
    </script>
<?php
get_footer();
?>

