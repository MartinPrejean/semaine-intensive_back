<?php
// includes
include_once('utils/utils.php');

/*
*                      Open Notify (ISS) API request
*/

// call to URL
$URL = 'http://api.open-notify.org/iss-now.json';

// Get data from URL
$data = getData($URL);
$result = json_decode($data);

// ISS Coords
$issLatitude = $result->iss_position->latitude;
$issLongitude = $result->iss_position->longitude;

// Sucess of Call to URL
// if($result->message === 'success')
// {
//   // ISS Location variables
//   $issLatitude;
//   $issLongitude;
//   // ISS TestMap
//   $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
//   $staticMapUrl .= http_build_query([
//       'center' => $issLatitude.','.$issLongitude,
//       'markers' => $issLatitude.','.$issLongitude,
//       'zoom' => 1,
//       'size' => '800x800',
//       'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
//   ]);
// }





/***********************************************************************
 * 
 *                 DANGER ZONE
 * 
 **************************************************************************/







 // 
// ISS API request
//

// // Create cache info
// $cacheKey = md5($URL);
// $cachePath = './cache/'.$cacheKey;
// $cacheUsed = false;

// // Cache available
// if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
// {
//     $result = file_get_contents($cachePath); 
//     $cacheUsed = true;
// }

// // Cache not available
// else
//     {
//       $isResult_iss = issPosition($URL, $cachePath);
//     }
// $URL = 'http://api.open-notify.org/iss-now.json';
// $data = getData($URL);
// $result = json_decode($data);
// ISS API request
  // echo '<pre>';
  // print_r($result);
  // echo '</pre>';
// ISS Coords
// $issLatitude = $result->iss_position->latitude;
// $issLongitude = $result->iss_position->longitude;

// 
// Create static map URL
//

// if($result->message === 'success')
// {
//   // ISS Location variables
//   $issLatitude;
//   $issLongitude;
  
//   $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
//   $staticMapUrl .= http_build_query([
//       'center' => $issLatitude.','.$issLongitude,
//       'markers' => $issLatitude.','.$issLongitude,
//       'zoom' => 1,
//       'size' => '800x800',
//       'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
//   ]);

// }

    // Geonames API request


    // $country = $result_geonames->geonames[0]->countryName ?? 'The ISS is not below a country, maybe an ocean.';


    // include 'API_request/restAPI_request.php';
