<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

//$req = $_GET['req'];

$ch = curl_init();
$url = "https://passau.niederbayerntv.de/programm-satellit/" ;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

     
$result = curl_exec($ch);
curl_close($ch);

echo preg_replace('(\d{2}:\d{2}.*?\d{2}:\d{2})', '####$0', $result);

//echo $result;
//echo $url;