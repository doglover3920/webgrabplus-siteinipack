<?php
 $ch = curl_init();
 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];
 $cookie = "ASP.NET_SessionId=cyvyqul5dppbpmz0p3letix5; _ga=GA1.2.226829279.1566295801; _gid=GA1.2.1765553139.1566295801; _hjid=8d1c2740-d69f-49e4-9d8c-646c8a638b9b; mts_rs_session=sfs98s13330nrr1p04uqf50r9t9jouhs";
 if ($reqtype == '1') {
     $date = $_GET['date'];
     $url = "https://mts.rs/oec/epg/program?channel-type=tv&date=" . $date . "&package=&category=&name=&page=&view=%23epgNew";


     } elseif ($reqtype == '2') {
     $url = "https://mts.rs/oec/epg/channel";
     } 

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));
$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
