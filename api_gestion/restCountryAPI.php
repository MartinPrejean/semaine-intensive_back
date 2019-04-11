    
<?php
// includes
include_once('utils/utils.php');

/*
*                      Open Notify (ISS) API request
*/

// call to cURL
$URL = 'https://restcountries.eu/rest/v2/name/'.$country;

// Get data from URL
$data = getData($URL);
$result = json_decode($data);

// Get country resident
$population = $result[0]->population.' residents' ?? 'this is Strange' ;
