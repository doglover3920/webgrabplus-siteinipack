<?php
 $ch = curl_init();
 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];
//$url = "https://sincroguia-tv.expansion.com/parrilla/canal/3/2019-08-17";
// $url = "https://sincroguia-tv.expansion.com/parrilla/2019-08-13?callback=loadScheduleDayOk";

$cookie = "PHPSESSID=rbsjm4gtd5rovkc67ub1mpnufp; _ga=GA1.2.391341700.1565593426; _gid=GA1.2.2052124842.1565593426; s_fid=500E23EC65721A74-0736C4F3CAAC5973; s_ppvl=https%253A%2F%2Fsincroguia-tv.expansion.com%2Fparrilla%2F2019-08-14%2C94%2C94%2C964%2C1513%2C964%2C1920%2C1080%2C1%2CP; s_ppv=https%253A%2F%2Fsincroguia-tv.expansion.com%2F%2C11%2C11%2C569%2C1513%2C569%2C1920%2C1080%2C1%2CP; s_nr=1565597458602-Repeat; s_cc=true; s_ptc=%5B%5BB%5D%5D; s_sq=ueexpansionpreprod%3D%2526c.%2526a.%2526activitymap.%2526page%253Dhttps%25253A%25252F%25252Fsincroguia-tv.expansion.com%25252F%2526link%253DPROGRAMACI%2525C3%252593N%252520TV%2526region%253DBODY%2526pageIDType%253D1%2526.activitymap%2526.a%2526.c%2526pid%253Dhttps%25253A%25252F%25252Fsincroguia-tv.expansion.com%25252F%2526pidt%253D1%2526oid%253Dhttps%25253A%25252F%25252Fsincroguia-tv.expansion.com%25252Fprogramacion-tv%2526ot%253DA; cookiebar=hide; _gat=1; s_ppn=https%3A%2F%2Fsincroguia-tv.expansion.com%2F";
 
if ($reqtype == '1') {
     $channel = $_GET['channel'];
     $date = $_GET['date'];
     $url = "https://sincroguia-tv.expansion.com/parrilla/canal/" . $channel . "/" . $date . "";

     } elseif ($reqtype == '2') {
     $date = $_GET['date'];
     $url = "https://sincroguia-tv.expansion.com/parrilla/" . $date . "?callback=loadScheduleDayOk";
     } 

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));

$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
