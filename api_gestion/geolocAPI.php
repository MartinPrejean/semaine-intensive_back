<?php  
// Include
include('issDataAPI.php');

/*
*                      Geonames API request
*/

// Call to URL
$URL = 'http://api.geonames.org/findNearbyJSON?';

// Get country name by location
$URL.= http_build_query([
  'lat' => $issLatitude,
  'lng' => $issLongitude,
  'username' => 'semaine_intensive', //needed for the API to work
]);

// Get data from URL
$data = getData($URL);
$result = json_decode($data);
$country = $result->geonames[0]->countryName ?? 'Ocean';

// test data
// print_r($URL);
// print_r($result);
// print_r($country);
return $result;


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
// Cache not available
// else
// {
//   $isResult_geonames = countryPosition($URL, $cachePath);
// }
// Decode JSON
// $result = json_decode($result);