<?php
 $ch = curl_init();
 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];
 $cookie = '__cfduid=d50d90b387b62b7b4a2e39015217a310e1561105765; _ga=GA1.2.729975847.1561105768; _gid=GA1.2.97699134.1561105768; cookieconsent_status=dismiss; _gat=1';
 if ($reqtype == '1') {
     $channel = $_GET['channel'];
     $date = $_GET['date'];
     $Lineup = $_GET['lineup'];
     $url = "https://www.tvtvuk.com/gn/d/v1.1/lineups/" . $Lineup . "/grid?startDateTime=" .$date . "T00:00:00.000Z&endDateTime=" . $date . "T23:59:00.000Z&size=Detailed&stationId=" . $channel;
     } elseif ($reqtype == '2') {
     $Lineup = $_GET['lineup'];
     $url = "https://www.tvtvuk.com/gn/d/v1.1/lineups/" . $Lineup . "/channels?enhancedCallSign=true&imageSize=Sm";
     } 

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);

$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
