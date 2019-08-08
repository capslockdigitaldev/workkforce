<?php

?>
<div class="col-md-3 col-sm-6 col-12 p-0 hifi">
     
     <!--desktop view-->
    
    <?php global $user_login; // If user is already logged in.
    if ( is_user_logged_in() ){
    ?>
    <div class="left-sec rob mt-2 d-lg-block d-md-block d-sm-none d-none">
        <div class="profile-img text-center">
                <?php
                    
                    
                    $user_id = bp_loggedin_user_id();
                    $bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id);
                    
                    
                    ?>   
                    <?php	if ($bp_city == "") {
                    ?><img class="img-fluid rounded-circle mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/profile-picture.png"><?php
                    } else { $bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id); 
                    ?><img class="img-fluid rounded-circle mt-4" src="<?php echo $bp_city; ?>"><?php
                    } ?>
        			
                
                <h4 class="m-2"><strong><?php global $user_login; // If user is already logged in.
        if ( is_user_logged_in() ) : echo $user_login;  endif; ?></strong></h4>
                <div class="credits mt-3">
                <span><strong><?php $useri = bp_loggedin_user_id();
        			$bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri);
        			if (isset ($bpct)) {
                     echo $bpct;
                    } else {  
                     echo '0';
                    } ?></strong></span><br>
                <span>Workkforce Bucks</span>
            </div>
        </div>
        <p id="das"><i class="fas fa-bars"></i></p>
        <ul class="dash">
            <li class="d-flex creditsonphone">
                <a href="<?php echo get_bloginfo('url') ?>/user-dashboard/">
                    <span class="pull-left pr-4"><h4>Workkforce Bucks</h4></span>
                    <span class="pull-right">
                        <?php $useri = bp_loggedin_user_id();
                        $bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri);
                        if (isset ($bpct)) {
                        echo $bpct;
                        } else {  
                        echo '0';
                        } ?>
                    </span>
                </a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/user-dashboard/"><span class="pull-left pr-4"><h4>DASHBOARD</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special1.png"></span></a>
            </li>
            <li class="d-flex">
            <span class="pull-left pr-4"><h4>ACCOUNT</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special2.png"></span>
            </li>
            <li class="d-flex tnm">
                <a href="<?php echo get_bloginfo('url') ?>/user-tournaments-and-matches/"><span class="pull-left pr-4"><h4>ALL TOURNAMENTS</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons2.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/active-matches/"><span class="pull-left pr-4"><h4>MY ACTIVE MATCHES</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special4.png"></span></a>
            </li>
            <li class="d-flex">
            <a id="modal-50999" href="#modal-container-50999" role="button" data-toggle="modal"><span class="pull-left pr-4"><h4>CREATE A MATCH</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special8.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/user-profile/"><span class="pull-left pr-4"><h4>MY PROFILE</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special3.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/my-team/"><span class="pull-left pr-4"><h4>MY TEAMS</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special4.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/user-wallet/"><span class="pull-left pr-4"><h4>WALLET</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special5.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo get_bloginfo('url') ?>/events/"><span class="pull-left pr-4"><h4>EVENTS</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special7.png"></span></a>
            </li>
            <li class="d-flex">
            <a href="<?php echo wp_logout_url("https://workkforce.gg/"); ?>"><span class="pull-left pr-4"><h4>LOGOUT</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special6.png"></span></a>
            </li>
        </ul>
    </div>	
    <?php
    }
    else{
        ?>
    <div class="left-sec rob mt-2 d-lg-block d-md-block d-sm-none d-none non_logged_in_desk">
                <p id="dass" ><i class="fas fa-bars"></i></p>
                <ul class="dashh">
                    <a id="modal-509222" href="#modal-container-509222" role="button" data-toggle="modal">
                        <a href="<?php echo get_bloginfo('url') ?>/all-matches/"><li class="d-flex">
                            <span class="pull-left pr-4"><h4>PLAY A MATCH</h4><p>CREATE A MATCH AND START A COMPETING</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons1.png"></span>
                        </li></a>
                    </a>    
                    <a href="<?php echo get_bloginfo('url') ?>/all-tournaments-and-matches/"><li class="d-flex">
                        <span class="pull-left pr-4"><h4>JOIN A TOURNAMENT</h4><p>BROWSE OUR UPCOMING TOURNAMENTS</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons2.png"></span>
                    </li></a>
                    <a href="<?php echo get_bloginfo('url') ?>/my-team/"><li class="d-flex">
                        <span class="pull-left pr-4"><h4>BUILD A SQUAD</h4><p>CREATE A TEAM AND INVITE PLAYERS</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons3.png"></span>
                    </li></a>
                    <a href="<?php echo get_bloginfo('url') ?>/events/"><li class="d-flex">
                        <span class="pull-left pr-4"><h4>EVENTS</h4><p>ATTEND LOCAL COMMUNITY EVENTS IN YOUR CITY</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons4.png"></span>
                    </li></a>
                    <li class="d-flex">
                        <span class="pull-left pr-4"><h4>EXCLUSIVE</h4><p>COMPETE FOR THE BEST REWARDS, EVER!</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons5.png"></span>
                    </li>
                </ul>
                <!-- div class="loin-creden">
                	<ul>
                    	<li class="d-flex">
                    	<span class="pull-left pr-4"><h4 class="mt-3">LOGIN</h4></span><span class="pull-right"><img class="mt-0" src="image/Vector_Smart_Object (4).png"></span>
                    	
                    	</li>
                    	<li class="d-flex">
                    	<span class="pull-left pr-4"><h4 class="mt-3">CREATE ACCOUNT</h4></span><span class="pull-right"><img class="mt-0" src="image/Vector_Smart_Object (4).png"></span>
                    	
                    	</li>
                	</ul>
                </div -->
            </div>
    <?php
    }
    ?>
    
    <!--mobile view-->
				
				
	<?php global $user_login; // If user is already logged in.
	if ( is_user_logged_in() ){
	?>
    <div class="left-sec rob mt-2 d-xl-none d-md-none d-sm-block d-block ">
        <div id="mySidenav" class="sidenav loggedin_phone">
        <ul class="showafterfsec">
            
            <span class="pull-left pr-4"><h4><a href="javascript:void(0)" class="closebtn" >&times;</a></h4></span>
            
            <div class="profile-img text-center">
                <?php
                    
                    
                    $user_id = bp_loggedin_user_id();
                    $bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id);
                    
                    
                    ?>   
                    <?php	if ($bp_city == "") {
                    ?><img class="img-fluid rounded-circle mt-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/profile-picture.png"><?php
                    } else { $bp_city = bp_get_profile_field_data('field=propic&user_id='.$user_id); 
                    ?><img class="img-fluid rounded-circle mt-4" src="<?php echo $bp_city; ?>"><?php
                    } ?>
					
                
                <h4 class="m-2"><strong><?php global $user_login; // If user is already logged in.
		        if ( is_user_logged_in() ) : echo $user_login;  endif; ?></strong></h4>
                <div class="credits mt-3">
                    <span><strong><?php $useri = bp_loggedin_user_id();
						$bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri);
						if (isset ($bpct)) {
                         echo $bpct;
                        } else {  
                         echo '0';
                        } ?></strong></span><br>
                    <span>Workkforce Bucks</span>
                </div>
            </div>
              
            <li class="d-flex creditsonphone">
                <a href="<?php echo get_bloginfo('url') ?>/user-dashboard/">
                    <span class="pull-left pr-4"><h4>Workkforce Bucks</h4></span>
                    <span class="pull-right"><p>
                        <?php $useri = bp_loggedin_user_id();
                        $bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri);
                        if (isset ($bpct)) {
                        echo $bpct;
                        } else {  
                        echo '0';
                        } ?></p>
                    </span>
                </a>
            </li>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/user-dashboard/"><span class="pull-left pr-4"><h4>DASHBOARD</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special1.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="JavaScript:Void(0);"><span class="pull-left pr-4"><h4>ACCOUNT</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special2.png"></span></a>
            </li>
            <li class="d-flex tnm tphn">
                <a href="<?php echo get_bloginfo('url') ?>/user-tournaments-and-matches/"><span class="pull-left pr-4"><h4>ALL TOURNAMENTS</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons2.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/active-matches/"><span class="pull-left pr-4"><h4>MY ACTIVE MATCHES</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special4.png"></span></a>
            </li>
            <li class="d-flex">
                <a id="modal-50999" href="#modal-container-50999" role="button" data-toggle="modal"><span class="pull-left pr-4"><h4>CREATE A MATCH</h4><p></p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special8.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/user-profile/"><span class="pull-left pr-4"><h4>MY PROFILE</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special3.png"></span></a>
            </li>
            <li class="d-flex">
                 <a href="<?php echo get_bloginfo('url') ?>/my-team/"><span class="pull-left pr-4"><h4>MY TEAMS</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special4.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/user-wallet/"><span class="pull-left pr-4"><h4>WALLET</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special5.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/events/"><span class="pull-left pr-4"><h4>EVENTS</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special7.png"></span></a>
            </li>
            <li class="d-flex">
                <a href="<?php echo wp_logout_url("https://workkforce.gg/"); ?>"><span class="pull-left pr-4"><h4>LOGOUT</h4></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/special6.png"></span></a>
            </li>
        </ul>
        </div>
    </div>	
	<?php
	}
	else{
	    ?>
    <div class="left-sec rob mt-2 d-xl-none d-md-none d-sm-block d-block mob_logged_out">
       <div id="mySidenav" class="sidenav">
        <ul class="showafterfsec">
           
                <span class="pull-left pr-4"><h4><a href="javascript:void(0)" class="closebtn">&times;</a></h4></span>
            
            <a id="modal-509222" href="#modal-container-509222" role="button" data-toggle="modal">
                <li class="d-flex">
                    <span class="pull-left pr-4"><h4>PLAY A MATCH</h4><p>CREATE A MATCH AND START A COMPETING</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons1.png"></span>
                </li>
            </a>
            
            <a href="<?php echo get_bloginfo('url') ?>/all-tournaments-and-matches/"><li class="d-flex">
                <span class="pull-left pr-4"><h4>JOIN A TOURNAMENT</h4><p>BROWSE OUR UPCOMING TOURNAMENTS</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons2.png"></span>
            </li>
            </a>
            <li class="d-flex">
                <a href="<?php echo get_bloginfo('url') ?>/my-team/"><span class="pull-left pr-4"><h4>BUILD A SQUAD</h4><p>CREATE A TEAM AND INVITE PLAYERS</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons3.png"></span></a>
            </li>
            <a href="<?php echo get_bloginfo('url') ?>/events/"><li class="d-flex">
                <span class="pull-left pr-4"><h4>EVENTS</h4><p>ATTEND LOCAL COMMUNITY EVENTS IN YOUR CITY</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons4.png"></span>
            </li></a>
            <li class="d-flex">
                <span class="pull-left pr-4"><h4>EXCLUSIVE</h4><p>COMPETE FOR THE BEST REWARDS, EVER!</p></span><span class="pull-right"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/smart-icons5.png"></span>
            </li>
            <li class="d-flex lsbuttons">
                <a id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Log in</a> 
                <a id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">Sign up</a>
            </li>
        </ul>
        </div>
        <!-- div class="loin-creden">
        	<ul>
            	<li class="d-flex">
            	<span class="pull-left pr-4"><h4 class="mt-3">LOGIN</h4></span><span class="pull-right"><img class="mt-0" src="image/Vector_Smart_Object (4).png"></span>
            	
            	</li>
            	<li class="d-flex">
            	<span class="pull-left pr-4"><h4 class="mt-3">CREATE ACCOUNT</h4></span><span class="pull-right"><img class="mt-0" src="image/Vector_Smart_Object (4).png"></span>
            	
            	</li>
        	</ul>
        </div -->
    </div>
    <?php
    }
    ?>
    
    
</div>