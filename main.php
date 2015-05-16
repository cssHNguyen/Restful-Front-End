<?php
/*
 * Hong P. Nguyen
 * Tatcha Code Challenge
 */
    //$var1 = $_GET['http://api.tatcha.com/shop/api/rest/products'];


    //From PHP Documentation
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://api.tatcha.com/shop/api/rest/products/");
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);





?>