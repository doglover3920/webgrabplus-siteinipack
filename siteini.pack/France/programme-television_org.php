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
$subpage = $_GET['subpage'];
$channel = $_GET['channel'];

$ch = curl_init();
$url = "https://www.programme-television.org/grid/tranches/" . $channel . "_" . $date . "_t" . $subpage . ".json" ;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

     
$result = curl_exec($ch);
curl_close($ch);

$dat = string_between_two_string($result, '"dateGrille":"', '",');
$resultA = preg_replace('/"heureDif":"/', '"heureDif":"' . $dat . ' ', $result);  
//echo $result;
echo $resultA;

}

if  ( $req == '2' )
{
$dataid = $_GET['dataid'];

$ch = curl_init();
$url = "https://www.programme-television.org/getinfos/" . $dataid . "";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
}