<?php

$channel = $_GET['channel'];
$showId = $_GET['showId'];

$url = "https://www.tvmustra.hu/php/ajaxgw/showdata.php?channel=" . $channel . "&showId=" . $showId . "";
$cookie = 'PHPSESSID=ig4f5l8ahacj4qdksept7g4od1; _ga=GA1.2.102278333.1557219606; _gid=GA1.2.689070763.1557219606; cookieconsent_status=dismiss';



$ch = curl_init($url);
$fp = fopen("output.json", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);

curl_exec($ch);
curl_close($ch);
fclose($fp);
