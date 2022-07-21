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
$channel = $_GET['channel'];
$ch = curl_init();
$url = "https://www.tv5monde.com/programmes/fr/programmes-tv5monde-" . $channel . "/#pr-section-guide" ;


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
}


if  ( $req == '2' )
{
$ch = curl_init();
$url = "https://tvguide.vg.no/backend/api/channels?all=true" ;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
}

if  ( $req == '3' )
{
$title = $_GET['title'];
$ch = curl_init();
$url = "https://www.tv5monde.com" . $title ;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
}
     
$result = curl_exec($ch);
curl_close($ch);
  
echo $result;
