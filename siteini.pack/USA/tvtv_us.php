<?php

 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];

if ($reqtype == '1') {
        $channel = $_GET['channel'];
        $dataid = $_GET['dataid'];
        $date = $_GET['date'];
        $next = $_GET['next'];
        $url = "https://tvtv.us/api/v1/lineup/" . $dataid . "/grid/" . $date . "T22:00:00.000Z/" . $next . "T21:59:00.000Z/" . $channel;

    } elseif ($reqtype == '2') {
        $dataid = $_GET['dataid'];
        $url = "https://tvtv.us/api/v1/programs/" . $dataid;
     }
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));

curl_exec($ch);
curl_close($ch);

