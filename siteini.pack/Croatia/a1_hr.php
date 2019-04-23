<?php
        $ch = curl_init();
        $reqtype = $_GET['reqtype'];

        if($reqtype == '1') {
                $channel = $_GET['channel'];
                $date = $_GET['date'];
                $url = "https://www.a1.hr/bnetepg/call/method::get_entries::channels::" . $channel . "::date::" . $date;
        } elseif($reqtype == '2') {
	            $url = "https://www.a1.hr/bnetepg/call/method::get_init";
        }

        $cookie = "GDPR_consent=false; COOKIE_SUPPORT=true; GUEST_LANGUAGE_ID=hr_HR; ANONYMOUS_USER_ID=603235998; ajs_user_id=null; ajs_group_id=null; _ga=GA1.2.703060790.1552813224; _gcl_au=1.1.1973057734.1552813225; _gid=GA1.2.663676338.1555068929; TS0100abbe=01bfb3d758431cb359df57fe8d4b5f40c59333070c9bfcea9dd32c2b41e1c2a751a4bb02bc7737d3f06fd780128b1ff2fbb659c22dc13a4baa0dc3f0cc3da66542f3a14f4e; TS0100abbe_28=019b2e131147292ace1b35a044bf87ff4b6d7947f03c37060506d5bb6deb51316a0f57a28bde15cb8194a1089c14dce047f90e07c8; aaaStaticCookie=lvpaaa1; TS01bf97ba=0142c2695f806686a383861640fdc90eaf11595161d8c577f543728f3d85375b29ecc278cf5706259fad8a2fc908789947b18a95d6b7dc6d57e6cb8021a7cd5021d4c59024e7a3f28e379bca566cd6fa659d60e0cd6c6474332dae719bcb175be9acb997eb; TS0193b03d=0142c2695f2eeaa9182230efdf9fd4ff0b99102e03d8c577f543728f3d85375b29ecc278cf078ca94ed28c7eb59476dcfdc298da97e16d1f680413e3e4d8e6b5291803d7b6; BS=apps1; JSESSIONID=B19D7E626F8A86654DDCD3F53AE5678B; lbsrv=lvplr04; BIGipServer~Corp-L1P~Cms_vipnet_80=rd1o00000000000000000000ffff0af39a9ao80; asmpCookieMaster=a/6834911461555082187449; webappsStaticCookie=lvpbbgw3; AAAproxySession=lvpaaa1.vipnet.hr/54436046692779483291555082";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
?>
