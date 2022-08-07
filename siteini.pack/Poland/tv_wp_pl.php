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
$ch = curl_init();
$url = "https://tv.wp.pl/api/v1/program/" . $date . "/" . $channel . "?days=7";
}

if  ( $req == '2' )
{
$id = $_GET['id'];
$ch = curl_init();
$url = "https://tv.wp.pl/api/v1/entry/" . $id ;
}

if  ( $req == '3' )
{
$ch = curl_init();
$url = "https://tv.wp.pl/" ;
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

     
$result = curl_exec($ch);
curl_close($ch);
 
echo $result;
