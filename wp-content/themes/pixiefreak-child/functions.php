<?php

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});



// function admin_default_page() {
//   return '/games-list/';
// }

// add_filter('login_redirect', 'admin_default_page');



// Enqueue parent theme css
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
function pixiefreak_child_styles(){

	// Enqueue all child theme css
	$parent_style = 'pixiefreak-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    wp_get_theme()->get('Version')
	);
  
}
add_action('wp_enqueue_scripts', 'pixiefreak_child_styles'); // Add Theme Stylesheet

/**
 * Custom Functions
*/
function check_username() {
   $username = $_POST['user'];
   if ( username_exists( $username ) ) {
       $return['user_exists'] = true; 
   }
   else {
       $return['user_exists'] = false;
   }
   echo json_encode($return);
   die();
}
add_action('wp_ajax_check_username', 'check_username');


function wpb_custom_new_menu() {
  register_nav_menu('clientmenu',__( 'Client Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function get_display_name($user_id) {
    if (!$user = get_userdata($user_id))
        return false;
    return $user->data->display_name;
}

add_role(
    'client',
    __( 'Web Admin' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
    )
);


// Function to return user count
function wpb_user_count() { 
$usercount = count_users();
$result = $usercount['total_users']; 
return $result; 
} 
// Creating a shortcode to display user count
add_shortcode('user_count', 'wpb_user_count');



//Login form Shortcode
add_shortcode( 'login-form', 'my_login_form_shortcode' );
/**
 * Displays a login form.
 *
 * @since 0.1.0
 * @uses wp_login_form() Displays the login form.
 */
function my_login_form_shortcode( $atts, $content = null ) {

    $defaults = array(      "redirect"              =>  site_url( $_SERVER['REQUEST_URI'] )
                        );

        extract(shortcode_atts($defaults, $atts));
        if (!is_user_logged_in()) {
        $content = wp_login_form( array( 'echo' => false, 'redirect' => $redirect ) );
        }
    return $content;
}



/*SHORTCODE FOR GETTING THE FORM on FRONTEND*/
function post_form_shortcode($atts, $content = null) {
    
ob_start();

    global $user_login; // If user is already logged in.
    if ( is_user_logged_in() ) : $userr = $user_login;  endif;
    
    $userid = get_current_user_id();
        
echo '<form method="post" enctype="multipart/form-data" name="mainForm" action="">

        <div id="postTitleOuter">
            <label class="hidden">Title</label>
            <input type="text" name="postTitle" class="postTitle hidden" value="Match">
            <input type="text" name="user_id" class="hidden" value="'.$userid.'">
        </div>
        
        <input type="text" name="postContent" class="postContent hidden" value="TESTING">
        <label>Game</label>
            <select name="game">
                <option value="">Choose Game</option>
                <option value="nba">NBA 2K19</option>
                <option value="nbal">NBA LIVE 19</option>
                <option value="cod">CALL OF DUTY BLACK OPS 3</option>
                <option value="fortnite">FORTNITE</option>
                <option value="fifa">FIFA 19</option>
                <option value="madden">MADDEN 19</option>
            </select>
        
        <label>Platform</label>
            <select name="gameplatform">
                <option value="">Choose Platform</option>
                <option value="ps4">PlayStation 4</option>
                <option value="xbox">Xbox</option>
                <option value="pc">pc</option>
            </select>
        
        <label>Match Type</label>
            <select name="gametype">
              <option value="">Choose Match Type</option>
              <option value="solo">Single Player</option>
              <option value="duos">Team</option>
            </select>
            
        <label>Challenging Player</label>
            <input type="text" class="nonedit" value="'.$userr.'" disabled>
            
        <label>Gamertag</label>
            <input type="text" name="player_gamertag">    
            

<input type="submit" name="add_post" id="add_post" value="Create Match">
</form>';

// Reset query to prevent conflicts
return ob_get_clean();
}
add_shortcode("post-form", "post_form_shortcode");



/*SHORTCODE to Create a Team  on FRONTEND*/
function post_team_shortcode($atts, $content = null) {
    
ob_start();

    global $user_login; // If user is already logged in.
    if ( is_user_logged_in() ) : $userr = $user_login;  endif;
    
    $userid = get_current_user_id();
        
echo '<form method="post" enctype="multipart/form-data" name="mainForm" action="">
        <p>Create team and start inviting users!</p> 
        
        <label>Team Name</label>
            <input type="text" name="team_name"></input>
        
        <label>Team Icon</label>
            <input type="file" name="team_icon"></input>
            
        <label>Created By</label>
            <input type="text" name="team_creator" value="'.$userr.'" ></input>
            
        <input type="submit" name="create_team" id="create_team" value="Create Team and Start Inviting Players">
</form>';

// Reset query to prevent conflicts
return ob_get_clean();
}
add_shortcode("post-team", "post_team_shortcode");












