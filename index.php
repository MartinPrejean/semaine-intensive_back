<?php $title = 'Semaine intensive'; ?>
<?php $currentPage = 'index'; ?>

<?php

  global $country;
  
  // ISS Location variables
  global $issLatitude;
  global $issLongitude;

  // Includes
  include 'fonctions.php';

   // ISS API request
  include 'API_request/issAPI_request.php';

  echo '<pre>';
  print_r($result_iss);
  echo '</pre>';

  $issLatitude = $result_iss->iss_position->latitude;
  $issLongitude = $result_iss->iss_position->longitude;
  
  // Weather API request
  include 'API_request/weatherAPI_request.php';

    // 
    // Create static map URL
    //

    if($result_iss->message === 'success')
    {

        $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
        $staticMapUrl .= http_build_query([
            'center' => $issLatitude.','.$issLongitude,
            'markers' => $issLatitude.','.$issLongitude,
            'zoom' => 1,
            'size' => '300x300',
            'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
        ]);

    }

    // Geonames API request
    include 'API_request/geonamesAPI_request.php';

    echo '<pre>';
    print_r($url_geonames);
    echo '</pre>';
  

    // Rest API request
    include 'API_request/restAPI_request.php';

    // echo '<pre>';
    // print_r($result_rest);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($url_rest);
    // echo '</pre>';

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
    
    <h3><?= $country ?></h3>

    <h3>Weather</h3>
    <p>
      Temperature : <?= $result_weather->main->temp ?>°
    </p>
      <?php foreach($result_weather->weather as $_weather): ?>
          <p>
            Weather casting : <?= $_weather->description ?></div>
          </p>
      <?php endforeach ?>
  <script src="scripts/script.js"><script>
  </body>
</html>