<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$date = $_GET['date'];
$subpage = $_GET['subpage'];
$Teller = 0 ;

$url = "https://staticqbr-prod-gb.gnp.cloud.virgintvgo.virginmedia.com/eng/web/epg-service-lite/gb/en/events/segments/" . $date . $subpage . "0000";

start:
if ($Teller > "20") {
    exit() ;
}
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: nl,en-US;q=0.7,en;q=0.3', 'Accept-Encoding: deflate, br, zstd', 'Referer: https://virgintvgo.virginmedia.com/', 'Origin: https://virgintvgo.virginmedia.com', 'Sec-Fetch-Dest: empty', 'Sec-Fetch-Mode: cors', 'Sec-Fetch-Site: same-site', 'Sec-GPC: 1', 'If-Modified-Since: 1970-01-01 00:00:00', 'Connection: keep-alive', 'TE: trailers'));
     
$result = curl_exec($ch);
curl_close($ch);
$dat = string_between_two_string($result, '"duration":', ',');

                if($dat < "20000" ) {
                	$Teller = $Teller + 1 ; 
                    	goto start;
                }


echo $result;

