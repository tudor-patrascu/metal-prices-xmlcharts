<?php 

// cURL function to import data from XMLCharts.com API

function mpx_import_data() {
    $url = 'https://www.xmlcharts.com/live/precious-metals.php?format=json';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $result = curl_exec($curl);
    curl_close($curl);
    if ($result === false) {
            die('Something went wrong.');
        } else {
        $data = json_decode($result, true);
    }
    return $data;
}
