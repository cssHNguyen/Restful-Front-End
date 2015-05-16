<?php
    /*
     * Hong P. Nguyen
     * Tatcha Code Challenge
     */

    $endpoint = 'http://api.tatcha.com/shop/api/rest/products/';

    //  Initiate curl
    $ch = curl_init();

    //Make sure Json is returned
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

    // Make sure it returns JSON
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);

    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Set the url
    curl_setopt($ch, CURLOPT_URL,$endpoint);

    // Execute
    $result=curl_exec($ch);

    // Closing
    curl_close($ch);

    //Parse that mess into a PHP variable
    $myResult = json_decode($result);
    /*
    echo $myResult->{"2"}->{"entity_id"};
    echo "\n";
    echo $myResult->{"2"}->{"sku"};
    echo "\n";
    echo $myResult->{"2"}->{"short_description"};
    echo "\n";
    */
    //echo
    //echo $result;
    echo json_encode($myResult, JSON_PRETTY_PRINT);
?>