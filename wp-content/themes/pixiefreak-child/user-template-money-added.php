<?php 
/*
Template Name: User Money Added
*/
get_header();

get_sidebar('left');
?>
	<div class="col-md-6 col-sm-6 col-12 p-0">
		<div class="main-content">
			<div class="leader-brd mt-2">
				<h3 class="">My Wallet</h3>
			</div>

            <div class="addmoney">
                        <?php
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
                        "description" =>  "XR Wallet Test Transaction",
                        "customer" => $customer->id

                        ));

                        //print_r($charge); 

                        $chargeamt = ($charge->amount / 100);

                        echo "Cheers! ".($chargeamt * 10). "XR Credits Have Been Credited to you Wallet.<br>";

                        echo "Transaction Id: ".$charge->id."<br>";
                        echo "Amount: $".$chargeamt."<br>";

                        echo '<a href=http://capslock.live/wallet/>Click Here to Return to your Wallet</a>';


                        $usedid = get_current_user_id(); 

                        $dividedamt = ($amount / 100);
                        $finalxrcredit = ($dividedamt * 10);

                        $currentxrcredit = xprofile_get_field_data( 'XRWallet', $usedid );
                        $addbalance = ($finalxrcredit + $currentxrcredit);

                        xprofile_set_field_data( 'XRWallet', $usedid , $addbalance );

                        $display_name = get_display_name($usedid);  

                        $transactiondesc = $finalxrcredit." XR Credits purchased by ". $display_name. " For $".$dividedamt. " USD";
                        $purchase = $finalxrcredit." XR Credits"; 
                        $localIP = getHostByName(getHostName());

                        date_default_timezone_set("America/Chicago");
                        $date = date('m/d/Y h:i:s a', time());

                        $post_id = array (
                        'post_type'=>'transactions',
                        'post_title'=>'Wallet Transaction',
                        'post_content'=> $transactiondesc,
                        'post_status' => 'publish',
                        );

                        $post_i = wp_insert_post( $post_id );
                        //$field_key = "user";

                        $username = $display_name;
                        update_field( "user", $username, $post_i );
                        update_field( "email", "test@mail.com", $post_i );
                        update_field( "amount", $dividedamt , $post_i );
                        update_field( "purchase", $purchase, $post_i );
                        update_field( "ip", $localIP, $post_i );
                        update_field( "time", $date, $post_i );
                    ?>
            </div>   

        </div>
	</div>		
		
		
<?php 
get_sidebar('right');
get_footer();
?>

