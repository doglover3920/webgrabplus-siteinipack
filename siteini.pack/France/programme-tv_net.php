<?php
        $ch = curl_init();
        $agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0';
        $reqtype = $_GET['reqtype'];
        if($reqtype == '1') {
                $date = $_GET['date'];
                $channel = $_GET['channel'];
                $Cookie = $_GET['Cookie'];
                $url = "https://www.programme-tv.net/programme/chaine/" . $date . "programme-" . $channel . ".html";
        } elseif($reqtype == '2') {
                $dataid = $_GET['dataid'];
                $Cookie = $_GET['Cookie'];
                $url = $dataid;
        } elseif($reqtype == '3') {
		$date = $_GET['date'];
		$Cookie = $_GET['Cookie'];
		$url = "https://www.programme-tv.net/_esi/channel-list/" . $date . "/?bouquet=perso&modal=0";
        }

    	curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, $Cookie);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

       $output = curl_exec($ch);

        curl_close($ch);

        echo $output;
?>
