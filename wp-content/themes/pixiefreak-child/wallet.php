<?php 
/*
Template Name: Wallet
*/
get_header();

?>
        <div class="outer">
             <div class="wallet">
			<?php
			
		 if (!is_user_logged_in()) {
        echo do_shortcode('[login-form redirect="http://capslock.live/wallet/"]');
        } 
         else { 
            $usedid = get_current_user_id(); 
           ?>
           Username: <?php $display_name = get_display_name($usedid); echo $display_name; ?>
           <br>
        Wallet Balance: <?php echo xprofile_get_field_data( 'XRWallet', $usedid ); ?> XR Credits
        
        <form action="<?php echo get_permalink(88) ?>" method="post" id="payment-form">
                <div class="form-row">
                    <input type="text" name="first_name" placholder="firstname">
                    <input type="text" name="last_name" placholder="lastname">
                    <input type="email" name="email" placholder="email">
                    <select class="frontamt" id="xrdollar" name="amount">
                        <option value="1000">$10</option>
                        <option value="2000">$20</option>
                        <option value="5000">$50</option>
                    </select>
                    <p class="x" >X</p>
                    <p class="frontamt" id="xrcredits"></p>
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                </div>
                 <button>Submit Payment</button>
        </form>
        
        <?php
        }
        ?>    
       
        
        

        
        
        
        
        </div>
        </div>

<?php
 get_footer(); ?>   