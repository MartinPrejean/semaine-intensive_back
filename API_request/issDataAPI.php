<?php

// Includes
include_once 'utils/utils.php';

/*
*                      Open Notify (ISS) API request
*/

// Call to URL
$URL = 'http://api.open-notify.org/iss-now.json';

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

// Get data from URL
$data = getData($URL, $cachePath);
$result = json_decode($data);


// ISS Coords
$issLatitude = $result->iss_position->latitude;
$issLongitude = $result->iss_position->longitude;
