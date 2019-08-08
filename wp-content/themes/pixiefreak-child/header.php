<?php
 if(isset($_REQUEST['game'])) {
$cookie_name = "game";
$cookie_value = $_REQUEST['game'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

 if(isset($_REQUEST['platform'])) {
$cookie_name = "platform";
$cookie_value = $_REQUEST['platform'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

?>
 

<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <link rel="icon" href="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/primetime-game.png" sizes="32x32" />
    <link rel="icon" href="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/primetime-game.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/primetime-game.png" />
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap-grid.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap-grid.min.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap-reboot.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap-reboot.min.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/bootstrap.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/font/style.css" rel="stylesheet">
    
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/assets/frontcss/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



</head>

<body class="rob">
<?php

    global $current_user; // Use global
    get_currentuserinfo(); // Make sure global is set, if not set it.
    if(current_user_can('administrator')) 
        {
            echo '<a class="adminbar" href="/admin-login/">Welcome Admin, Click Here to Acess the Admin Dashboard</a>';
        }
    else if(current_user_can('web admin'))
        {
            echo '<a class="adminbar" href="/admin-login/">Welcome Admin, Click Here to Acess the Admin Dashboard</a>';
        }
    else
        {
        }





if ( is_front_page() ) {
     ?>
     
<!--    <header class="homeheader">-->
<!--      <div class="container-fluid">-->
<!--	<div class="row">-->
<!--		<div class="col-md-12">-->
<!--				<a class="navbar-brand" href="<?php echo get_bloginfo('url') ?>"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png"></a>-->
			
<!--				<a class="loggin" type="button" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">LOGIN</a>-->
<!--				<a class="loggin" type="button" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">REGISTER</a>-->
					
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--</header>-->
   <?php
}
else {
}
?> 

<div class="sponsor">
	<img class="img-fluid spon" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/topbanner.png">
<header class="otherheader">
      <div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
			<nav class="navbar navbar-toggleable p-0 rob">
				<span class="sidetogglenav" style="font-size:30px;cursor:pointer; color:#fff;"><i class="fas fa-bars"></i></span>
				
				<a class="navbar-brand" href="<?php echo get_bloginfo('url') ?>"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png"></a>
					
					<ul class="navbar-nav onlydesk">
						<li class="nav-item <?php $get = get_the_ID(); if ($get == '280'){ echo 'active';}?>">
							 <a class="nav-link" href="<?php echo get_bloginfo('url') ?>/games-list/">JOIN TOURNAMENTS</a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" id="modal-509222" href="#modal-container-509222" role="button" data-toggle="modal">JOIN LADDER MATCHES</a>
						</li>
						<li class="nav-item <?php $get = get_the_ID(); if ($get == '308'){ echo 'active';}?>">
							 <a class="nav-link" href="<?php echo get_bloginfo('url') ?>/user-leaderboards/">LEADERBOARDS</a>
						</li>
						<!-- li class="nav-item <?php $get = get_the_ID(); if ($get == '959'){ echo 'active';}?>">
							 <a class="nav-link" href="<?php echo get_bloginfo('url') ?>/user-create-bracket/">CREATE A TOURNAMENT</a>
						</li -->
						<li class="nav-item <?php $get = get_the_ID(); if ($get == '289'){ echo 'active';}?>">
							 <a class="nav-link" href="<?php echo get_bloginfo('url') ?>/user-support/">SUPPORT</a>
						</li>
						<li class="nav-item">
							 <a class="nav-link">SWAG</a>
						</li>
					</ul>
					<?php global $user_login; // If user is already logged in.
                        if ( is_user_logged_in() )
                        {}
                        else{ ?>
                        <ul class="navbar-nav right onlydesk">
                                <li class="nav-item log">
                                 <a type="button" class="btn btn-outline-secondary"  id="modal-464146" href="#modal-container-464146" role="button"  data-toggle="modal">LOGIN</a>
                                </li>
                                <li class="nav-item">
                                 <a type="button" class="btn btn-primary" id="modal-509828" href="#modal-container-509828" role="button"  data-toggle="modal">REGISTER</a>
                                </li>
                        </ul>
                        <?php } ?>
				
			</nav>
		</div>
	</div>
</div>
</header>
</div>
<hr class="thick">
   
    

<!-- /HEADER -->


<div class="pannel">
<div class="container-fluid">
	<div class="row">


