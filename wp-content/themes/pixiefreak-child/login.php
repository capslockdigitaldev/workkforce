<?php 
/*
Template Name: Common Login
*/
get_header();

// $user_info = get_userdata(2);
// echo 'Username: ' . $user_info->user_login . "\n";
// echo 'User roles: ' . implode(', ', $user_info->roles) . "\n";
// echo 'User ID: ' . $user_info->ID . "\n";

         if (!is_user_logged_in()) {
             
             echo do_shortcode('[login-form redirect="/all-matches/"]');
         } 
        else if (is_user_logged_in()) {
            
            
            if ( user_can( $current_user, "subscriber" ) ) {
                
                
            echo 'I am a user'; 
            
            
            }
            else if ( user_can( $current_user, "client" ) ) {
                
                   
            echo 'I am a client';
                
            }
        }
         else{
             echo 'something else';
         }

get_footer(); ?>   