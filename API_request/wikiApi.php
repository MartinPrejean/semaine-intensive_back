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
$data = getData($URL);

// Extract the intro data
$result = json_decode($data);
$key = array_keys((array) $result->query->pages)[0];
$intro = $result->query->pages->$key->extract;

// Print the intro of the research
// print_r($intro)