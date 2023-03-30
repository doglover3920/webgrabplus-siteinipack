<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$req = $_GET['req'];
$token = $_GET['token'];
if ($req == '1') {
        $start = $_GET['start'];
        $channel = $_GET['channel'];
        $end = $_GET['end'];
        $ch = curl_init();

        $url = "https://tyr-prod.apigee.net/nostv/ott/schedule/range/contents/guest?channels=" . $channel . "&minDate=" . $start . "&maxDate=" . $end . "&isDateInclusive=true&client_id=" . $token . "" ;
}

if ($req == '2') {
        $ch = curl_init();
        $url = "https://tyr-prod.apigee.net/nostv/ott/channels/guest?client_id=" . $token . "" ;
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
"Host: tyr-prod.apigee.net",
"User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0",
"Accept: application/json, text/plain, */*",
"Accept-Language: nl,en-US;q=0.7,en;q=0.3",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://nostv.pt/",
"X-Core-DeviceType: web",
"X-Core-AppVersion: 2.10.1.1",
"X-Core-ContentRatingLimit: 0",
"X-Apikey: " . $token . "",
"Origin: https://nostv.pt",
"Sec-Fetch-Dest: empty",
"Sec-Fetch-Mode: cors",
"Sec-Fetch-Site: cross-site",
"Sec-GPC: 1",
"X-Core-DeviceId:", 
"Connection: keep-alive"
     ) );

     
$result = curl_exec($ch);
curl_close($ch);
echo $result;

