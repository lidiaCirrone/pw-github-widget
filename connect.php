<?php

include "config.php";

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly
}

$url = "https://api.github.com/users/${username}/events?page=${page}";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, $git_headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$data = curl_exec($curl);
curl_close($curl);

?>