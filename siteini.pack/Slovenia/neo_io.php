<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$req = $_GET['req'];
if ( $req == '1' ) {
$start = $_GET['start'];
$end = $_GET['end'];
$channel = $_GET['channel'];
$url = "https://stargate.telekom.si/api/titan.tv.WebEpg/ZapList";
$postdata = '{"includeRadioStations":true}';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'Host: stargate.telekom.si',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
'Accept: application/json, text/plain, */*',
'Accept-Language: nl,en-US;q=0.7,en;q=0.3',
'Content-Type: application/json',
'X-AppLayout: 1',
'x-language: sl',
'Origin: https://neo.io',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site',
'Sec-GPC: 1',
'Connection: keep-alive'
));
$result1 = curl_exec($ch);
$cookie = string_between_two_string($result1, 'set-cookie: ', ';');

echo $cookie;

$url = "https://stargate.telekom.si/api/titan.tv.WebEpg/GetWebEpgData";
$postdata = '{"ch_ext_id":"' . $channel . '","from":' . $start . ',"to":' . $end . '}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'Host: stargate.telekom.si',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
'Accept: application/json, text/plain, */*',
'Accept-Language: nl,en-US;q=0.7,en;q=0.3',
'Content-Type: application/json',
'X-AppLayout: 1',
'x-language: sl',
'Origin: https://neo.io',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site',
'Sec-GPC: 1',
'Connection: keep-alive',
'Cookie: ' . $cookie . '',
'TE: trailers'
));

}

if ( $req == '2' ) {
$show = $_GET['show'];
$cookie = $_GET['cookie'];

$url = "https://stargate.telekom.si/api/titan.tv.ContentService/EpgContentDetails";
$postdata = '{"show_id":"' . $show . '","timeshift":0}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'Host: stargate.telekom.si',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
'Accept: application/json, text/plain, */*',
'Accept-Language: nl,en-US;q=0.7,en;q=0.3',
'Content-Type: application/json',
'X-AppLayout: 1',
'x-language: sl',
'Origin: https://neo.io',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site',
'Sec-GPC: 1',
'Connection: keep-alive',
'Cookie: ' . $cookie
));

}


if ( $req == '3' ) {
$url = "https://stargate.telekom.si/api/titan.tv.WebEpg/ZapList";
$postdata = '{"includeRadioStations":true}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'Host: stargate.telekom.si',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
'Accept: application/json, text/plain, */*',
'Accept-Language: nl,en-US;q=0.7,en;q=0.3',
'Content-Type: application/json',
'X-AppLayout: 1',
'x-language: sl',
'Origin: https://neo.io',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site',
'Sec-GPC: 1',
'Connection: keep-alive'
));
}
     
$result = curl_exec($ch);
curl_close($ch);

echo $result;

