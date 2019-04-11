<?php  
// Includes
include 'issDataAPI.php';

//
// Geonames API request
//

// Call to cURL
$URL = 'http://api.geonames.org/findNearbyJSON?';
$URL.= http_build_query([
  'lat' => $issLatitude,
  'lng' => $issLongitude,
  'username' => 'semaine_intensive',
]);

// Get country name by URL
$data = getData($URL);
$result_geonames = json_decode($data);
$country = $result_geonames->geonames[0]->countryName ?? 'Ocean';
?>
