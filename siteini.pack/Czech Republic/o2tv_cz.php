<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$req = $_GET['req'];
$channel = $_GET['channel'];
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];

$url = "https://3201.frp1.ott.kaltura.com/api_v3/service/ottuser/action/anonymousLogin?format=1&clientTag=9.46.0-PC";
$postdata = '{"language":"*","partnerId":"3201","clientTag":"9.46.0-PC","apiVersion":"5.4.0.28195"}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));
$result = curl_exec($ch);
curl_close($ch);
$dat = string_between_two_string($result, '"ks": "','",');
//echo $dat;

if  ( $req == '1' )
{
$url = "https://3201.frp1.ott.kaltura.com/api_v3/service/asset/action/list?format=1&clientTag=9.46.0-PC";
$postdata = '{"language":"ces","ks":"' . $dat . '","filter":{"objectType":"KalturaSearchAssetFilter","orderBy":"START_DATE_ASC","kSql":"(and linear_media_id:\'' . $channel . '\' (and end_date >= \'' . $enddate . '\' start_date <= \'' . $startdate . '\') asset_type=\'epg\' auto_fill= true)"},"pager":{"objectType":"KalturaFilterPager","pageSize":1000,"pageIndex":1},"clientTag":"9.46.0-PC","apiVersion":"5.4.0"}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));
$result = curl_exec($ch);
curl_close($ch);
}

if  ( $req == '2' )
{
$url = "https://3201.frp1.ott.kaltura.com/api_v3/service/asset/action/list?format=1&clientTag=9.46.0-PC";
$postdata = '{"filter":{"objectType":"KalturaSearchAssetFilter","kSql":"(and asset_type=\'607\')"},"pager":{"objectType":"KalturaFilterPager","pageIndex":1,"pageSize":500},"ks":"' . $dat . '","language":"ces","apiVersion":"5.4.0.28195","clientTag":"9.46.0-PC"}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));
$result = curl_exec($ch);
curl_close($ch);

}


echo $result;

