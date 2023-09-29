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
$date = $_GET['date'];
$subpage = $_GET['subpage'];
$station = $_GET['station'];
$appkey = $_GET['appkey'];
$device = $_GET['device'];
$sessionID = $_GET['sessionId'];

//$url = "https://tv-at-prod.yo-digital.com/at-bifrost/epg/channel/schedules/v2?date=" . $date . "&hour_offset=" . $subpage . "&hour_range=3&filler=true&channel_numbers=" .  $channel . "&station_ids=" . $station . "&app_language=de&natco_code=at" ;
$url = "https://tv-at-prod.yo-digital.com/at-bifrost/epg/channel/schedules?date=" . $date . "&hour_offset="  . $subpage . "&hour_range=3&channelMap_id=&filler=true&app_language=de&natco_code=at";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'app_key:' . $appkey, 
'app_version: 02.0.800', 
'device-id:' . $device, 
'x-user-agent:web|web|Firefox-117|02.0.800|1',
'Accept-Encoding=gzip,deflate,br', 
'bff_token:', 
'x-tv-flow: START_UP',
'x-tv-step: EPG_CHANNEL',
'x-request-tracking-id: f6777d4a-56b5-4289-b1e7-913ee7f747b8',
//'x-request-session-id: a1f6325f-30f9-4ef8-bcc8-e3130130dd33',
'x-request-session-id:' . $sessionID,
'X-Channel-Map-Id: null',
'X-Call-Type: GUEST_USER',
'Pragma: akamai-x-cache-on,akamai-x-check-cacheable,akamai-x-get-cache-key',
'Origin: https://tv.magenta.at'
));
}

if ( $req == '2' ) {
$prog_id = $_GET['progam_id'];
$natco_key = $_GET['natco_key'];
$appkey = $_GET['appkey'];
$device = $_GET['device'];
$sessionID = $_GET['sessionId'];

$url = "https://tv-at-prod.yo-digital.com/at-bifrost/details/series/" . $prog_id . "?natco_key=" . $natco_key ."&interacted_with_nPVR=false&app_language=de&natco_code=at";

//https://tv-at-prod.yo-digital.com/at-bifrost/details/series/'index_temp_3'?natco_key='global_temp_5'&interacted_with_nPVR=false&app_language=de&natco_code=at

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'app_key:' . $appkey, 
'app_version: 02.0.800', 
'device-id:' . $device, 
'x-user-agent:web|web|Firefox-117|02.0.800|1',
'Accept-Encoding=gzip,deflate,br', 
'bff_token:', 
'x-tv-flow: START_UP',
'x-tv-step: EPG_CHANNEL',
'x-request-tracking-id: f6777d4a-56b5-4289-b1e7-913ee7f747b8',
'x-request-session-id:' . $sessionID,
'X-Channel-Map-Id: null',
'X-Call-Type: GUEST_USER',
'Pragma: akamai-x-cache-on,akamai-x-check-cacheable,akamai-x-get-cache-key',
'Origin: https://tv.magenta.at' 
));

}

if ( $req == '3' ) {
$natco_key = $_GET['natco_key'];
$appkey = $_GET['appkey'];
$device = $_GET['device'];
$sessionID = $_GET['sessionId'];

$url = "https://tv-at-prod.yo-digital.com/at-bifrost/epg/channel?channelMap_id=&includeVirtualChannels=true&natco_key=" . $natco_key . "&app_language=de&natco_code=at" ;


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'app_key:' . $appkey, 
'app_version: 02.0.800', 
'device-id:' . $device, 
'x-user-agent:web|web|Firefox-117|02.0.800|1',
'Accept-Encoding=gzip,deflate,br', 
'bff_token:', 
'x-tv-flow: START_UP',
'x-tv-step: EPG_CHANNEL',
'x-request-tracking-id: f6777d4a-56b5-4289-b1e7-913ee7f747b8',
'x-request-session-id:' . $sessionID,
'X-Channel-Map-Id: null',
'X-Call-Type: GUEST_USER',
'Pragma: akamai-x-cache-on,akamai-x-check-cacheable,akamai-x-get-cache-key',
'Origin: https://tv.magenta.at'
));
}
     
$result = curl_exec($ch);
curl_close($ch);

echo $result;

