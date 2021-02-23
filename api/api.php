<?php

function load_content($url){
    $codivUrl=curl_init();
    curl_setopt($codivUrl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($codivUrl, CURLOPT_HEADER, false);
    curl_setopt($codivUrl, CURLOPT_URL, $url);
    $data=curl_exec($codivUrl);
    curl_close($codivUrl);
    return $data;
}

echo load_content('https://tw.tv.yahoo.com/embed/%E6%B9%AF%E5%A7%86%E8%B2%93%E8%88%87%E5%82%91%E5%88%A9%E9%BC%A0-%E5%89%8D%E5%B0%8E%E9%A0%90%E5%91%8A-055702646.html?format=embed&mode=simpletron&region=TW&lang=zh-Hant-TW&site=tv&autoplay=true')

?>