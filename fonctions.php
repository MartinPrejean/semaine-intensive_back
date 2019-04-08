<?php 

// Function for ISS API request
function issPosition($url, $cachePath)
{   
    // Make request to API
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    $result_iss = curl_exec($curl);
    curl_close($curl);

    // Save in cache
    file_put_contents($cachePath, $result_iss);

    return $result_iss;
}

// Function for Open Weather App API request 
function weatherPosition($url, $cachePath)
{   
    // Make request to API
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    $result_weather = curl_exec($curl);
    curl_close($curl);

    // Save in cache
    file_put_contents($cachePath, $result_weather);

    return $result_weather;
}