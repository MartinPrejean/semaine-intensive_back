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
