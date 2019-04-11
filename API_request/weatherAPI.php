<?php
$URL = 'https://api.openweathermap.org/data/2.5/weather?';

    // Create cache info
    $cacheKey = md5($URL);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Country location
    $URL.= http_build_query([
        'lat' => $issLatitude,
        'lon' => $issLongitude,
        'appid' => '9e8150c9d6fbf87d678d2cf7f7a2c00a',
        'units' => 'metric',
    ]);
    
// Get data from URL
$data = getData($URL);
$result = json_decode($data);
?>