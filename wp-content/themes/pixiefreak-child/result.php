<?php 
/*
Template Name: Result
*/
get_header();
get_sidebar('left');

require_once('vendor/autoload.php');
            
            \Stripe\Stripe::setApiKey('sk_test_aoydpPxfir2t45TsxUnYHNuf00W1xTfWYs');
            
            //SANITIZE POST ARRAY
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $firstname = $POST['first_name'];
            $lastname = $POST['last_name'];
            $email = $POST['email'];
            $amount =$POST['amount'];
            $token = $POST['stripeToken'];
            // Create Customer In Stripe
            $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
            ));
            $charge = \Stripe\Charge::create(array(
            "amount" => $amount,
            "currency" => "usd",
            "description" =>  "Primetime Bucks Wallet Transaction",
            "customer" => $customer->id
            ));
            //print_r($charge); 
            
                if ($amount == '1000')
                {
                    $chargeamt = '1000';
                }
                else if ($amount == '2000')
                {
                   $chargeamt = '3500'; 
                }
                else if ($amount == '5000')
                {
                    $chargeamt = '10000';
                }
            echo "<div class='col-md-6 col-sm-6 col-12'><div class='main-content support frontline text-left mt-3'><h4>My Wallet</h4></div><hr class='thick tour mb-2'><div class='contact-us mt-4 full userpro wallet'> Cheers! ".$chargeamt. "Primetime Bucks Have Been Credited to you Wallet.<br>";
            echo "Transaction Id: ".$charge->id."<br>";
            echo "Amount: $".$chargeamt."<br>";
            echo '<a class="wall" href="/user-wallet/">Click Here to Return to your Wallet</a> </div> </div>';
            get_sidebar('right');
            get_footer();

            $usedid = get_current_user_id(); 
            $dividedamt = ($amount / 100);
            $finalxrcredit = ($dividedamt * 10);
            $currentxrcredit = xprofile_get_field_data( 'XRWallet', $usedid );
            $addbalance = ($chargeamt + $currentxrcredit);
            xprofile_set_field_data( 'XRWallet', $usedid , $addbalance );
            $display_name = get_display_name($usedid);  
            $transactiondesc = $finalxrcredit." Primetime Bucks purchased by ". $display_name. " For $".$dividedamt. " USD";
            $purchase = $finalxrcredit." Primetime Bucks Credits"; 
            $localIP = getHostByName(getHostName());
            date_default_timezone_set("America/Chicago");
            $date = date('m/d/Y h:i:s a', time());
            $post_id = array (
            'post_type'=>'transactions',
            'post_title'=>'Wallet Transaction',
            'post_content'=> $transactiondesc,
            'post_status' => 'publish',
            );
            
            global $current_user;
            get_currentuserinfo();
            $email = (string) $current_user->user_email;
                
            $post_i = wp_insert_post( $post_id );
            //$field_key = "user";
            $username = $display_name;
            update_field( "user", $username, $post_i );
            update_field( "email", $email , $post_i );
            update_field( "amount", $dividedamt , $post_i );
            update_field( "purchase", $purchase, $post_i );
            update_field( "ip", $localIP, $post_i );
            update_field( "time", $date, $post_i );

        

?>


