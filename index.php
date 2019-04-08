<?php $title = 'Semaine intensive'; ?>
<?php $currentPage = 'index'; ?>
<?php

    // ISS Location
    $url = 'http://api.open-notify.org/iss-now.json';

    // Country location
    $country = empty($_GET['country']) ? 'France' : $_GET['country'];
    
    // Create cache info
    $cacheKey = md5($url);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;
    
    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    {
        $result = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
        // Make request to API
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($curl);
        curl_close($curl);

        // Save in cache
        file_put_contents($cachePath, $result);
    }

    // decode JSON
    $result = json_decode($result);

    // Create static map URL
    if($result->message === 'success')
    {
        $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
        $staticMapUrl .= http_build_query([
            'center' => $result->iss_position->latitude.','.$result->iss_position->longitude,
            'markers' => $result->iss_position->latitude.','.$result->iss_position->longitude,
            'zoom' => 1,
            'size' => '300x300',
            'key' => 'AIzaSyAPwpGHLkdZCvyPYjUxoVTQHozgOmE0eH4',
        ]);

        echo '<pre>';
        print_r($staticMapUrl);
        echo '</pre>';
    }
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
        <div>Longitude: <?= $result->iss_position->longitude ?>°</div>
        <div>Latitude: <?= $result->iss_position->latitude ?>°</div>
    <img width="300" height="300" src="<?= $staticMapUrl ?>">
  </body>
</html>