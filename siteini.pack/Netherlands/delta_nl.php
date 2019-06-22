<?php
 $ch = curl_init();
 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];
 $cookie = 'PHPSESSID=926o3622vjgvale5t4nbheh434; ssid=b29f267719f66b70760602';
 if ($reqtype == '1') {
     $channel = $_GET['channel'];
     $date = $_GET['date'];
     $enddate = $_GET['enddate'];
     $url = "https://tv.delta.nl/api/user/guest/epg?ipp=1000&pg=0&search_in=all_programs&st=" . $date . "&et=" . $enddate . "&ch=" . $channel . "&sort=start_date__asc&service=delta_goes&ajax=1";
     } elseif ($reqtype == '2') {
     $url = "https://tv.delta.nl/api/user/guest/channel?&service=delta_goes&ajax=1&service=delta_goes&ajax=1";
     } 

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);

$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
