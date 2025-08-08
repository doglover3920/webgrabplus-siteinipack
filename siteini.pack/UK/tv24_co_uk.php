<?php
        $ch = curl_init();
        $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
        $reqtype = $_GET['req'];
        if($reqtype == '1') {
                $date = $_GET['date'];
                $channel = $_GET['channel'];
                $url = "https://tv24.co.uk/x/channel/" . $channel . "/0/" . $date . "" ;
                echo $url;
        } elseif($reqtype == '2') {
                $dataid = $_GET['dataid'];
                $Cookie = $_GET['Cookie'];
                $url = $dataid;
        } elseif($reqtype == '3') {
		$url = "https://tv24.co.uk/x/tvguide/1000193/0/today/default";
        }

    	curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0',
'Accept: */*',
'Accept-Language: nl,en-US;q=0.7,en;q=0.3',
'Accept-Encoding: gzip, deflate, br, zstd',
'Referer: https://tv24.co.uk/',
'X-Requested-With: XMLHttpRequest',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: same-origin',
'Connection: keep-alive',
'Sec-GPC: 1'
));
echo $url;


       $output = curl_exec($ch);

        curl_close($ch);

        echo $output;
?>
