<?php
    include('mealAPI.php');
    //
    // Rest API request
    //
    $URL = 'https://restcountries.eu/rest/v2/all?fields=';
    $URL.= http_build_query([
        '$country',
        'population',
    ]);
    $data = getData($URL);
    // extract the Country data
    $result = json_decode($data);
    print_r($result)

    // $url_rest = 'https://restcountries.eu/rest/v2/all?fields=name;';

    // // Create cache info
    // $cacheKey = md5($url_rest);
    // $cachePath = './cache/'.$cacheKey;
    // $cacheUsed = false;

    // Get info by country

    // // Cache available
    // if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    // {
    //     $result_rest = file_get_contents($cachePath);
    //     $cacheUsed = true;
    // }

    // // Cache not available
    // else
    // {
    //   $isResult_rest = countryInfo($url_rest, $cachePath);
    // }

    // // Decode JSON
    // $result_rest = json_decode($result_rest);

    // return $result_rest;
?>