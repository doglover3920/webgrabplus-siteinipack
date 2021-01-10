<?php

 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';


        $channel = $_GET['channel'];
        $start = $_GET['start'];
        $end = $_GET['end'];        
        $url = "https://www.telegraf.rs/api/epg/channels/" . $channel . "?start=" . $start . "&end=" . $end ;

$ch = curl_init($url);
$fp = fopen("output.json", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));

curl_exec($ch);
curl_close($ch);
fclose($fp);

