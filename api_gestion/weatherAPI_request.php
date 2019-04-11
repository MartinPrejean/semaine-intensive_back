<?php
// Include
include('issDataAPI.php');

/*
*                      Weather API request
*/

// Call to URL
$URL = 'https://api.openweathermap.org/data/2.5/weather?';

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
$weather = $result->weather[0]->description;
$temp = $result->main->temp;
var_dump($temp);



// // Create cache info
// $cacheKey = md5($URL);
// $cachePath = './cache/'.$cacheKey;
// $cacheUsed = false;

//     // Cache not available
// else
// {
//     $isResult_weather = weatherPosition($URL, $cachePath);
// }
//     // Cache available
// if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
// {
//     $result_weather = file_get_contents($cachePath);
//     $cacheUsed = true;
// }