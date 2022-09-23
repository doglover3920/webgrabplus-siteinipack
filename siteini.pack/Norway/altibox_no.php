<?php
function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
    return substr($str, $subtring_start, $size);  
}

$channel = $_GET['channel'];
$date = $_GET['date'];
$req = $_GET['req'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://gmtvvscallc1.envision.services.altibox.net/EPG/JSON/Authenticate");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"authType":0,"userType":3,"terminaltype":"WEBTV","subnetId":4701}');
curl_setopt($ch, CURLOPT_HTTPHEADER, CURL_HEADER);
$result = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$substring = string_between_two_string($result, 'CSESSIONID=', ';');
$cookies = 'CSESSIONID=' . $substring ;
$substring = string_between_two_string($result, 'XSESSIONID=', ';');
$cookies = $cookies . '; XSESSIONID=' . $substring ;
$substring = string_between_two_string($result, 'JSESSIONID=', ';');
$cookies = $cookies . '; JSESSIONID=' . $substring ;
$SessionTicket = 'SessionTicket: ' . $cookies ;
$cookies = 'Cookie: ' . $cookies ;
echo $cookies ."<br>";
echo $SessionTicket ."<br>";

if  ( $req == '1' )
{
$payload = '{"requestList":[{"name":"PlayBillContextEx","param":{"channelid":"' . $channel . '","date":"' . $date . '060000","type":2,"preNumber":0,"nextNumber":250}}]}';

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, 'https://gmtvvscallc1.envision.services.altibox.net/EPG/JSON/ExecuteBatch');  
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload);  
curl_setopt( $ch1, CURLOPT_HTTPHEADER, array(
    'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:83.0) Gecko/20100101 Firefox/86.0', 'Accept: application/json,text/javascript,*/*; q=0.01', 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8', $SessionTicket , 'Accept-Language: nl,en-US;q=0.7,en;q=0.3', 'Accept-Encoding: deflate, br'    
     ) );
$result = curl_exec($ch1);
$info = curl_getinfo($ch1);
curl_close($ch1);
}

if  ( $req == '2' )
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://gmtvvscallc1.envision.services.altibox.net/EPG/JSON/AllChannel");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain":0,"channelNamespace":"0","metaDataVer":"Channel/1.1","filterlist":[{"key":"IsHide","value":"-1"}],"properties":[{"include":"/channellist/logicalChannel/contentId,/channellist/logicalChannel/name,/channellist/logicalChannel/chanNo,/channellist/logicalChannel/mediaid,/channellist/logicalChannel/locationCopyrights,/channellist/logicalChannel/pictures/picture/href,/channellist/logicalChannel/physicalChannels/physicalChannel/extensionInfo,/channellist/logicalChannel/physicalChannels/physicalChannel/mediaId,/channellist/logicalChannel/physicalChannels/physicalChannel/btvBR/is,/channellist/logicalChannel/physicalChannels/physicalChannel/btvBR/va,/channellist/logicalChannel/physicalChannels/physicalChannel/videoCodec,/channellist/logicalChannel/physicalChannels/physicalChannel/cutvCR,/channellist/logicalChannel/physicalChannels/physicalChannel/npvrRecCR"}]}');
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
    'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:83.0) Gecko/20100101 Firefox/86.0', 'Accept: application/json,text/javascript,*/*; q=0.01', 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8', $SessionTicket , 'Accept-Language: nl,en-US;q=0.7,en;q=0.3', 'Accept-Encoding: deflate, br'    
     ) );
$result = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
}

echo $result;
echo $info;
