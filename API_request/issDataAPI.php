<?php

// Includes
include_once 'utils/utils.php';

/*
*                      Open Notify (ISS) API request
*/

// Call to URL
$URL = 'http://api.open-notify.org/iss-now.json';

// Get data from URL
$data = getData($URL);
$result = json_decode($data);

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

// ISS Coords
$issLatitude = $result->iss_position->latitude;
$issLongitude = $result->iss_position->longitude;


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

// }