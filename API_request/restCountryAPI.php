<?php
// includes
include_once('utils/utils.php');
/*
*                      Open Notify (ISS) API request
*/
// call to cURL
$URL = 'https://restcountries.eu/rest/v2/name/'.$country;

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

else 
{
    // Get data from URL
    $data = getData($URL, $cachePath);
    $result = json_decode($data);   
}

// Get country resident
$population = $result[0]->population.' residents' ?? 'this is Strange' ;
