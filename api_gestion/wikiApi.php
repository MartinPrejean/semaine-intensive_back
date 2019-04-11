<?php
//include
include('geolocAPI.php');

/*
*                      Wikipedia API request
*/


// Formate variable country
$country = str_replace(' ', '_', $country);

// Option from Wikipedia
$sentensesCount = '5'; //change for number of full sentences you need

// Url Api communication (only 8 sentences)
$URL = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&explaintext&exintro&exsentences='.$sentensesCount.'&titles='.$country;
$data = getData($URL);

// extract the intro data
$result = json_decode($data);
$key = array_keys((array) $result->query->pages)[0];
$intro = $result->query->pages->$key->extract;