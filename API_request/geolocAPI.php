<?php  
// Include
include 'issDataAPI.php';

/*
*                      OpenCageData API request
*/

// Call to URL
$URL = 'http://api.geonames.org/findNearbyJSON?';

// Create cache info
$cacheKey = md5($URL);
$cachePath = './cache/'.$cacheKey;
$cacheUsed = false;

// Cache available
if(file_exists($cachePath) && time() - filemtime($cachePath) < 5)
{
    $result = file_get_contents($cachePath); 
    $cacheUsed = true;
}


// Get country name by location
$URL.= http_build_query([
  'lat' => $issLatitude,
  'lng' => $issLongitude,
  'username' => 'semaine_intensive',
]);

// Get data from URL
$data = getData($URL, $cachePath);
$result = json_decode($data);
$country = $result->geonames[0]->countryName ?? 'Ocean';
