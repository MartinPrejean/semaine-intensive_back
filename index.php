<?php $title = 'Semaine intensive'; ?>
<?php $currentPage = 'index'; ?>

<?php

  // Includes
  include 'fonctions.php';


  // Déclaration des variables pour le scope global
  // $isResult_iss;
  // $isResult_weather;
  // $issLatitude;
  // $issLongitude;


    // 
    // ISS API request
    // 

    $url_iss = 'http://api.open-notify.org/iss-now.json';
    
    // Create cache info
    $cacheKey = md5($url_iss);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    {
        $result_iss = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
      $isResult_iss = issPosition($url_iss, $cachePath);
    }

    // Decode JSON
    $result_iss = json_decode($result_iss);

    $issLatitude = $result_iss->iss_position->latitude;
    $issLongitude = $result_iss->iss_position->longitude;
    
    // 
    // Weather API request
    // 

    $url_weather = 'https://api.openweathermap.org/data/2.5/weather?';

    // Country location
    $url_weather.= http_build_query([
        'lat' => $issLatitude,
        'lon' => $issLongitude,
        'appid' => '9e8150c9d6fbf87d678d2cf7f7a2c00a',
        'units' => 'metric',
    ]);

    // Create cache info
    $cacheKey = md5($url_weather);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    {
        $result_weather = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
      $isResult_weather = weatherPosition($url_weather, $cachePath);
    }

    // Decode JSON
    $result_weather = json_decode($result_weather);


    // Create static map URL
    if($result_iss->message === 'success')
    {
        // ISS Location variables
        $issLatitude;
        $issLongitude;

        $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
        $staticMapUrl .= http_build_query([
            'center' => $issLatitude.','.$issLongitude,
            'markers' => $issLatitude.','.$issLongitude,
            'zoom' => 1,
            'size' => '300x300',
            'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
        ]);

    }

    echo '<pre>';
    print_r($result_weather->coord->lon);
    echo '</pre>';
    echo '<pre>';
    print_r($result_weather->coord->lat);
    echo '</pre>';
    echo '<pre>';
    print_r($url_weather);
    echo '</pre>';
?>

<!DOCTYPE html>
<!--[if lte IE 7]> <html class="ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="ie8 ie678" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--><!--<![endif]-->
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
    <img width="300" height="300" src="<?= $staticMapUrl ?>">

    <h3>Weather</h3>
        <?php foreach($result_weather->weather as $_weather): ?>
            <div><?= $_weather->description ?></div>
        <?php endforeach ?>
  </body>
  <script src="script.js"><script>
</html>