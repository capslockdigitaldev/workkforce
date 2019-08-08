<?php
/**
 * Button and Text notification Settings
 *
 * @package Orion SMS OTP Verification
 */
?>

<!--4. Button and Notification Text Settings-->
<!--Heading-->
<div class="d-sm-flex align-items-center p-3 my-3 text-white-50 ihs-bg-light-pink rounded box-shadow" style="background-color: #6f42c1; box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, .05);">
   <div class="lh-100 ihs-admin-head-cont">
      <h6 class="mb-0 text-white lh-100"><?php echo __( 'Button & Text Notification Settings', $text_domain ); ?></h6>
      <small><?php echo __( 'Here you can change the text for the buttons and editable notification messages.Please note that some notifications may not be changed because twilio sends its own alert and notifications', $text_domain ); ?></small>
   </div>
</div>
<div class="my-3 p-3 bg-white rounded box-shadow ihs-api-config-cont">
   <h6 class="border-bottom border-gray pb-2 mb-0"><?php echo __( 'Button & Notification Settings', $text_domain ); ?>
      <?php echo ihs_get_tell_me_how_link( 'Tell me how', 'https://youtu.be/3EX1p05pEv0?list=PLD8nQCAhR3tR2N5k3wy8doceQCyVLQEOf&t=925' )?>
   </h6>
   <!--Send OTP Text-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Send OTP \' button', $text_domain );?>
      <?php echo ihs_get_text_input( 'SEND OTP Text',
         'ihs_otp_send_otp_text', 'text', false,
         'e.g Send Verification Code', true,
         $tooltip_text ); ?>
   </div>

   <!--Verify OTP-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Verify OTP \' button', $text_domain );?>
      <?php echo ihs_get_text_input( 'Verify OTP Text',
         'ihs_otp_verify_text', 'text', false,
         'e.g Verify Verification Code', true,
         $tooltip_text ); ?>
   </div>

   <!--Resend OTP-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Resend OTP \' button', $text_domain );?>
      <?php echo ihs_get_text_input( 'Resend OTP Text',
         'ihs_otp_resend_otp_text', 'text', false,
         'e.g Resend Verification Code', true,
         $tooltip_text ); ?>
   </div>

   <!--OTP( required )-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'OTP( required ) \' button', $text_domain );?>
      <?php echo ihs_get_text_input( 'OTP( required ) Text',
         'ihs_otp_required_text', 'text', false,
         'e.g Verification Code( required )', true,
         $tooltip_text ); ?>
   </div>

   <!--Reset Password via OTP-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Reset Password via OTP \' button', $text_domain );?>
      <?php echo ihs_get_text_input( 'Reset Password via OTP Text',
         'ihs_otp_reset_pwd_via_otp', 'text', false,
         'e.g Reset Password via Verification Code', true,
         $tooltip_text ); ?>
   </div>

   <!--Please verify OTP first.-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Please verify OTP first \' alert message', $text_domain );?>
      <?php echo ihs_get_text_input( 'Please verify OTP first Text',
         'ihs_otp_pls_verify_otp_first_text', 'text', false,
         'e.g Please verify Verification code first', true,
         $tooltip_text ); ?>
   </div>

   <!--Please Enter OTP.-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Please Enter OTP \' alert message', $text_domain );?>
      <?php echo ihs_get_text_input( 'Please Enter OTP Text',
         'ihs_otp_pls_enter_otp_text', 'text', false,
         'e.g Please enter Verification code', true,
         $tooltip_text ); ?>
   </div>

   <!--OTP Entered is Incorrect.-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'OTP Entered is Incorrect \' alert message', $text_domain );?>
      <?php echo ihs_get_text_input( 'OTP Entered is Incorrect Text',
         'ihs_otp_otp_enter_incorrect_text', 'text', false,
         'e.g Verification Code Entered is Incorrect', true,
         $tooltip_text ); ?>
   </div>

   <!--OTP sent to your mobile.-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'OTP sent to your mobile \' alert message', $text_domain );?>
      <?php echo ihs_get_text_input( 'OTP sent to your mobile Text',
         'ihs_otp_otp_sent_to_mobile_text', 'text', false,
         'e.g Verification Code sent to your mobile', true,
         $tooltip_text ); ?>
   </div>

   <!--Sending OTP....-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-blue d-flex"><i class="ihs-my-icons fab fa-wpforms" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter the text for the \'Sending OTP... \' alert message', $text_domain );?>
      <?php echo ihs_get_text_input( 'Sending OTP... Text',
         'ihs_otp_sending_otp_text', 'text', false,
         'e.g Sending Verification Code...', true,
         $tooltip_text ); ?>
   </div>
   
   <!--Resed OTP Timer....-->
   <div class="media text-muted pt-3">
      <div class="ihs-input-icon ihs-bg-pink d-flex"><i class="ihs-my-icons fas fa-clock" aria-hidden="true"></i></div>
      <?php $tooltip_text = __( 'Please enter time in seconds to active Resend OTP button. Default time is 90 Seconds.', $text_domain );?>
      <?php echo ihs_get_text_input( 'Resend OTP Timer',
         'ihs_resend_otp_timer', 'text', false,
         'e.g 90', true,
         $tooltip_text ); ?>
   </div>

   <!--Rating-->
   <?php echo ihs_get_rate_us_content(); ?>
</div>