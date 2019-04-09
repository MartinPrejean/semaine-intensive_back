<?php

    // 
    // Weather API request
    // 

    $url_weather = 'https://api.openweathermap.org/data/2.5/weather?';

    // Country location
    $url_weather.= http_build_query([
        'lat' => $issLatitude,
        'lon' => $issLongitude,
        'appid' => '9e8150c9d6fbf87d678d2cf7f7a2c00a',
        'units' => 'metric',
    ]);

    // Create cache info
    $cacheKey = md5($url_weather);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    {
        $result_weather = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
      $isResult_weather = weatherPosition($url_weather, $cachePath);
    }

    // Decode JSON
    $result_weather = json_decode($result_weather);

?>