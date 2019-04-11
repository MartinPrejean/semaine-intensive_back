<?php  
// Include
include('issDataAPI.php');
//
// Geonames API request
//*
// Call to URL
$URL = 'http://api.geonames.org/findNearbyJSON?';

// Get country name by location
$URL.= http_build_query([
  'lat' => $issLatitude,
  'lng' => $issLongitude,
  'username' => 'semaine_intensive', //needed for the API to work
]);
// Get data from URL
$data = getData($URL);
$result = json_decode($data);
var_dump($result);
$country = $result->geonames[0]->countryName ?? 'Ocean';

// test data
print_r($URL);
print_r($result);
print_r($country);
return $result;


// // Create cache info
// $cacheKey = md5($URL);
// $cachePath = './cache/'.$cacheKey;
// $cacheUsed = false;

// //Cache available
// if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
// {
//     $result_geonames = file_get_contents($cachePath);
//     $cacheUsed = true;
// }
// Cache not available
// else
// {
//   $isResult_geonames = countryPosition($URL, $cachePath);
// }
// Decode JSON
// $result = json_decode($result);
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