<?php
 $ch = curl_init();
 $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
 $reqtype = $_GET['reqtype'];

if ($reqtype == '1') {
     $channel = $_GET['channel'];
     $url = "https://www.tvtv.de/sender/" . $channel . "";
      $cookie = "__utma=80392530.474636290.1567919685.1567919685.1572762760.2; __utmz=80392530.1567919685.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); cookieconsent_status_v3=dismiss; PHPSESSID=f9tajrfo4oj8md1bfuc1q54kq4; merkliste=1756394d602b2c0c77e3a8ea402072d1; POPUPCHECK=1572849159061; __utmb=80392530.1.10.1572762760; __utmc=80392530; __utmt=1; xdefcc=G3c0c2ddec372586187cdfa10fa5bda7f5";
     } elseif ($reqtype == '2') {
     $id = $_GET['idx'];
     $url = $id;
     $cookie = "personalizace=setver=full&sp=1498671233480515&test_verze=B; personalizace_tvprogram=tvProgramTyp=column&tvKanaly=608; aam_td_cpex_network=1569930336512; aam_last=1570003962367; __io_r=webgrabplus.com; __io_first_source=webgrabplus.com; __io_lv=1570003962030; __io=3cb76ce9c.b12536d78_1569930334363; __io_unique_41571=2; aam_net_ui=3014233653; aam_net_ts=1569930339; _ga=GA1.2.827482983.1569930339; _gid=GA1.2.698883899.1569930339; __gfp_64b=HxjReGzIoAVWJZN8veLiNsuEGFS3yWjmMWkJJyD8b9r.b7; _hjid=bbfb680b-5792-4677-bb03-11e92723b5ee; flashver=-21; .imedia.cz|sid=id=14253851283645835037|t=1569930355.530|te=1569930448.485|c=A882B8F85AEFCC408D15EAA2F004F1AA; go.idnes.bbelements.com/please/|bm2uu=0_0_1569930361_20_0_0_(null)~*; g_f=0bacffdce44111e993830242ac120002|03e314aca2ce3eaa0e730fb9a0c0749f; __io_uh=1; bblosync=1570003912481; adb.key=3700052872; _adb.key=ixohrylhtpf; __io_session_id=7778dc0e9.347198895_1570003090502; adb=1; PHP=1";
     } 

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'X-Requested-With: XMLHttpRequest', 'Content-Type: application/json;charset=UTF-8', 'Accept-Encoding: deflate'));


$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
