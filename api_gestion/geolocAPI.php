<?php  
// Include
include('issDataAPI.php');

/*
*                      OpenCageData API request
*/

// Call to URL
$URL = 'https://api.opencagedata.com/geocode/v1/json?key=fd094825a8f34ed08ebfce3f1ab54e49&q=';

// Get country name by location
$URL.= http_build_query([
  'lat' => $issLatitude,
  'lng' => $issLongitude,
]);

// Get data from URL
$data = getData($URL);
$result = json_decode($data);
// var_dump($result);
$country = $result->results[0]->components->country;

// test data
// print_r($URL);
// print_r($result);
// print_r($country);
// return $result;


// // Create cache info
// $cacheKey = md5($URL);
// $cachePath = './cache/'.$cacheKey;
// $cacheUsed = false;

// //Cache available
// if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
// {
//     $result_geonames = file_get_contents($cachePath);
//     $cacheUsed = true;
// }
// // Cache not available
// else
// {
//   $isResult_geonames = countryPosition($URL, $cachePath);
// }
// // Decode JSON
// // $result = json_decode($result);