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

    //sends json to HTML
    header("Content-type: text/javascript");
    //Data for iteration
    $pCount = 0;
    $productList = array();
    //Defines what a product is
    class myProduct {
        public $entity_id = 0;
        public $sku = 0;
        public $short_description = "";
        public $description = "";
        public $name = "";
        public $image_url = "";
    }
    //first product


    //iterates through all json objects to construct a more elegant JSON file
    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($result, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            $tempPro = new myProduct();
            $tempPro->entity_id = $val['entity_id'];
            $tempPro->sku = $val['sku'];
            $tempPro->short_description = $val['short_description'];
            $tempPro->description = $val['description'];
            $tempPro->name = $val['name'];
            $tempPro->image_url = $val['image_url'];
            array_push($productList, $tempPro);
            $tempPro = null;
        }
    }
    echo (json_encode($productList));
?>