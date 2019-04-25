<?php
 $reqtype = $_GET['reqtype'];

 if ( $reqtype == '1' ) {
				$channel = $_GET['channel'];
				 $starttime = $_GET['starttime'];
				 $endtime = $_GET['endtime'];
				 $url = "https://api-web.ug-be.cdn.united.cloud/v1/public/events/epg?fromTime=" . $starttime . "T00:00:00%2B02:00&toTime=" . $endtime . "T23:59:59%2B02:00&communityId=1&languageId=404&cid=" . $channel;
				 } 
 elseif ( $reqtype == '2' ) {
				$id = $_GET['id'];
				 $url = "https://api-web.ug-be.cdn.united.cloud/v1/public/events/" . $id . "?communityId=1&languageId=404";
				 } 
 elseif ( $reqtype == '3' ) {
				$url = "https://api-web.ug-be.cdn.united.cloud/v1/public/channels?channelType=TV&communityId=1&languageId=404&imageSize=L";
				 } 

$tok = file_get_contents('sbb.rs', true);
$mytok = explode(",",$tok);
$token = str_replace("access_token","",$mytok[0]);
$token = str_replace('"','',$token);
$token = str_replace('{:','Authorization: Bearer ',$token);

$ch = curl_init( $url );
 curl_setopt( $ch, CURLOPT_HEADER, 0 );
 curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 
//              'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsidWMtaW5mby1zZXJ2aWNlIl0sInNjb3BlIjpbInJlYWQiXSwiZXhwIjoxNTU1MzI3OTAwLCJhdXRob3JpdGllcyI6WyJST0xFX1BVQkxJQ19FUEciXSwianRpIjoiODY0Zjk5MzctMDMwMy00ZjcyLTliOGItMTNjNWFmOGY3YTk0IiwiY2xpZW50X2lkIjoiMjdlMTFmNWUtODhlMi00OGU0LWJkNDItOGUxNWFiYmM2NmY1In0.sf42EtKdIjRYGR8P9w8N7g3kZ5sAfmcT4_D8vlzfSjk'
								$token 
								 ) );

 $output = curl_exec( $ch );
 curl_close( $ch );
 echo $output;
