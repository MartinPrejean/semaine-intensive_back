<?php
//includes
include_once('utils/utils.php');
// Call to URL
$URL = 'http://api.open-notify.org/iss-now.json';
$data = getData($URL);
$result = json_decode($data);

// ISS Coords
$issLatitude = $result->iss_position->latitude;
$issLongitude = $result->iss_position->longitude;

// Sucess of Call to URL
if($result->message === 'success')
{
  // ISS Location variables
  $issLatitude;
  $issLongitude;
  // ISS TestMap
  $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
  $staticMapUrl .= http_build_query([
      'center' => $issLatitude.','.$issLongitude,
      'markers' => $issLatitude.','.$issLongitude,
      'zoom' => 1,
      'size' => '800x800',
      'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
  ]);
}





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
?>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title><?php echo($title); ?></title>
      <meta name="description" content="Semaine Intensive Back">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
      <!-- <link type="text/css" rel="stylesheet" href="styles/style.css"> -->
      <link rel="shortcut icon" href="content/favicon.png">
    </head>
    <body>
      <h3>ISS Location</h3>
        <div>Longitude: <?= $issLongitude ?>°</div>
        <div>Latitude: <?= $issLatitude ?>°</div>
      <img width="800" height="800" src="<?= $staticMapUrl ?>">
    </body>
    <script src="script.js"></script>
  </html>