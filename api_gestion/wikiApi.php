<?php
//includes
// include_once 'utils/utils.php';
include 'geolocAPI.php';
// Country variable

//variable country
$country = str_replace(' ', '_', $country);

$sentensesCount = '5'; //change for number of full sentences you need

/**
*   get the country trivia From wikipedia
*/

// Url Api communication (only 8 sentences)
$URL = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&explaintext&exintro&exsentences='.$sentensesCount.'&titles='.$country;
$data = getData($URL);
// extract the intro data
$result = json_decode($data);
$key = array_keys((array) $result->query->pages)[0];
$intro = $result->query->pages->$key->extract;
// Print the intro of the research
print_r($intro)


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
  <!-- <script src="main.js"></script> -->
</head>
<body>
  
</body>
</html>