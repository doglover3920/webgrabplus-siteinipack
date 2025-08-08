<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$req = $_GET['req'];

if  ( $req == '1' )
{

$date = $_GET['date'];
$channel = $_GET['channel'];
$token = $_GET['token'];
$ch = curl_init();

$url = "https://www.mytelly.co.uk/tv-guide/listings/channel/" . $channel . ".html?dt=" . $date . "" ;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0' ,
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' ,
'Accept-Language: nl,en-US;q=0.7,en;q=0.3' ,
'Accept-Encoding: gzip, deflate, br, zstd' ,
'Referer: https://www.mytelly.co.uk/tv-guide/' ,
'Connection: keep-alive' ,
'Cookie: ' . $token ,
'Upgrade-Insecure-Requests: 1' ,
'Sec-Fetch-Dest: document' ,
'Sec-Fetch-Mode: navigate' ,
'Sec-Fetch-Site: same-origin' ,
'Sec-Fetch-User: ?1' ,
'Sec-GPC: 1' ,
'Priority: u=0, i' ,
'TE: trailers'
));
     
$result = curl_exec($ch);
curl_close($ch);

echo $result;


}

if  ( $req == '2' )
{

$id = $_GET['url'];
$pid = $_GET['pid'];
$tm = $_GET['tm'];
$token = $_GET['token'];
$token = str_replace('XSRF-TOKEN=','XSRF-TOKEN#', $token);
$token = str_replace('otvukprod_session=','otvukprod_session#', $token);
$token = str_replace('=','%3D', $token);
$token = str_replace('#','=', $token);
$tm = str_replace(' ','%3A', $tm);
$url = $id . "&pid=" . $pid . "&tm=" . $tm ;
$ch = curl_init();
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0' ,
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' ,
'Accept-Language: nl,en-US;q=0.7,en;q=0.3' ,
'Accept-Encoding: gzip, deflate, br, zstd' ,
'Referer: https://www.mytelly.co.uk/tv-guide/' ,
'Connection: keep-alive' ,
'Cookie: ' . $token ,
'Upgrade-Insecure-Requests: 1' ,
'Sec-Fetch-Dest: document' ,
'Sec-Fetch-Mode: navigate' ,
'Sec-Fetch-Site: same-origin' ,
'Sec-Fetch-User: ?1' ,
'Sec-GPC: 1' ,
'Priority: u=0, i' ,
'TE: trailers'
));
$result = curl_exec($ch);
curl_close($ch);
echo $result;


}
