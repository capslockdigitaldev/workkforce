<?php
/**
 * File so that we get translation
 */

$xmlStr = '<MESSAGE>
<AUTHKEY>' . $auth_key . '</AUTHKEY>
<SENDER>' . $sender_id . '</SENDER>
<ROUTE>4</ROUTE>
<COUNTRY>' . $country_code . '</COUNTRY>
<UNICODE>1</UNICODE>
<SMS TEXT="' . $message . '" >
<ADDRESS TO="' . $mob_number . '"></ADDRESS>
</SMS>
</MESSAGE>';

$api_region = ( get_option( 'ihs_msg91_region' ) ) ? get_option( 'ihs_msg91_region' ) : '';
$api_url    = ( 'world' === $api_region ) ? 'http://world.msg91.com/api/postsms.php' : 'https://control.msg91.com/api/postsms.php';		

$url = $api_url;

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "$url",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $xmlStr,
	CURLOPT_HTTPHEADER => array(
		"authkey: $auth_key",
		"content-type: application/xml"
	),
));
