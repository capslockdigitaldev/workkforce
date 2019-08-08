<?php
/**
 * Orion SMS OTP verification Main File.
 *
 * @package Orion SMS OTP verification
 */

/*
Plugin Name:  Orion SMS OTP Verification (Pro)
Plugin URI:   https://orionhive.com/
Description:  Using Twilio or MSG91 verify mobile number by sending a one time verification code ( OTP ) to the user entered mobile number. It also gives you an option to choose between TWILIO or MSG91 third party API to send a Verification Code ( OTP ) and SMS
Version:      10.0.0
Author:       Imran Sayed, Smit Patadiya
Author URI:   https://orionhive.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  orion-sms-orion-sms-otp-verification
Domain Path:  /languages
*/

/* Include the Custom functions file */
require 'inc/country-code-functions.php';
require 'inc/rate-us.php';
require 'inc/form-input-functions.php';
require 'custom-functions.php';
require 'inc/admin-settings.php';
require 'inc/woo-commerce-order-functions.php';
