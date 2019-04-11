<?php
//include
include 'geolocAPI.php';

/*
*                      Wikipedia API request
*/


// Formate variable country
$country = str_replace(' ', '_', $country);

// Get option from Wikipedia
$sentensesCount = '5'; //change for number of full sentences you need

// Url Api communication (only 8 sentences)
$URL = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&explaintext&exintro&exsentences='.$sentensesCount.'&titles='.$country;

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
    $data = getData($URL, $cachePath);
}


// Extract the intro data
$result = json_decode($data);
$key = array_keys((array) $result->query->pages)[0];
$intro = $result->query->pages->$key->extract;

