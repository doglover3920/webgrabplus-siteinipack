<?php
 $reqtype = $_GET['reqtype'];

 if ( $reqtype == '1' ) {
				$channel = $_GET['channel'];
				 $start = $_GET['start'];
				 $url = "https://www.tring.al/guide/epgs/epg" . $start . $channel . ".xml";
				 } 
 elseif ( $reqtype == '2' ) {
				$id = $_GET['id'];
				 $url = "";
				 } 
 elseif ( $reqtype == '3' ) {
				$url = "https://www.tring.al/guide/";
				 } 
$cookie = "PHPSESSID=9tjk8350ffj4unhdbpmkp7cal4";

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_HEADER, 0 );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 
                '"User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0", "Accept: application/json, text/javascript, */*; q=0.01", "Accept-Language: nl,en-US;q=0.7,en;q=0.3", "X-Requested-With: XMLHttpRequest", "Connection: keep-alive"', 
				"Cookie: $cookie"
                ) );

 $output = curl_exec( $ch );
 curl_close( $ch );

                  
