<?php

 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];

if ($reqtype == '1') {
        $channel = $_GET['channel'];
        $dataid = $_GET['dataid'];
        $date = $_GET['date'];
        $url = "https://tvtv.us/tvm/t/tv/v4/lineups/" . $dataid . "/listings/grid?detail=%27brief%27&start=" . $date . "T00:00Z&end=" . $date . "T23:59Z&startchan=" . $channel . "&endchan=". $channel . "";
        $cookie = "__cfduid=d93ac7244ffb94e107a1566e2521cf77c1572676195; _ga=GA1.2.232756882.1572676196; cookieconsent_status=dismiss; _gid=GA1.2.1460498149.1577709635; _gat=1";
    } elseif ($reqtype == '2') {
        $dataid = $_GET['dataid'];
        $url = "https://tvtv.us/tvm/t/tv/v4/lineups/" . $dataid . "";
        $cookie = "__cfduid=d93ac7244ffb94e107a1566e2521cf77c1572676195; _ga=GA1.2.232756882.1572676196; cookieconsent_status=dismiss; _gid=GA1.2.1460498149.1577709635";
     }
$ch = curl_init($url);
$fp = fopen("output.json", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));

curl_exec($ch);
curl_close($ch);
fclose($fp);

