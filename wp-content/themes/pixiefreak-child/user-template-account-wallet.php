<?php 
/*
Template Name: User Account Wallet
*/
get_header();
get_sidebar('left');
?>
    <div class="col-md-6 col-sm-6 col-12 p-0">
        <div class="main-content support frontline text-left mt-3">
            <h4 class="">My Wallet</h4>
        </div>
        <hr class="thick tour mb-2">
        <div class="leader-brd wallet">
            <div>
                <div class="text-right" style="float:right;">
                    <div class="save-reset text-center">
                        <a type="button" class="btn btn-primary mb-2" id="modal-509828" href="#modal-container-509823" role="button"  data-toggle="modal" >Add Credits</a>
                    </div>
                </div>
                <div class="d-flex">
                    <h3 class="">
                    <?php $useri = bp_loggedin_user_id();
                    $bpct = bp_get_profile_field_data('field=XRWallet&user_id='.$useri); 
                    echo $bpct; ?></h3><span style="font-size: 20px;">Primetime Bucks</span>
                </div>
            </div>
        </div>
        
        
        
	<table class="table cashflow mt-0">
		<tbody>
			<tr class="transhead">
				<td style="width: 100%;">
				    Transaction History
				</td>
			</tr>
			 
		
			
			<tr class="history_t">
                
                <td class="righthis">Time</td>
                <td class="righthis">IP</td>
                <td class="righthis">Amount USD</td>
                <td class="lefthis">Description</td>
            </tr>
			
			<?php 
			
			global $current_user;
            get_currentuserinfo();
            $email = (string) $current_user->user_email;
            
			$my_query = new WP_Query(array(
                                'post_type'=> 'transactions',
                                'post_status' => 'publish',
                                'meta_key' => 'email',
                                'meta_value' => $email
                              ));

                    if($my_query->have_posts()):
                        while($my_query->have_posts()):$my_query->the_post();
                        ?>
                        <tr class="history_t">
                            
                            <td class="righthis"><?php the_field('time'); ?></td>
                            <td class="righthis"><?php the_field('ip'); ?></td>
                            <td class="righthis">$<?php the_field('amount'); ?></td>
                            <td class="lefthis"><?php the_content(); ?></td>
                        </tr>
                    <? endwhile;
                    endif;
                    wp_reset_postdata(); ?>
			
				
			
		</tbody>
	</table>
	
    </div>		
<?php 
get_sidebar('right');
get_footer();
?>

