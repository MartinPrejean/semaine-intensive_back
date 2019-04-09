<?php  

    //
    // Geonames API request
    //

    $url_geonames = 'http://api.geonames.org/findNearbyJSON?';
    
    // Get country name by location
    $url_geonames.= http_build_query([
      'lat' => $issLatitude,
      'lng' => $issLongitude,
      'username' => 'semaine_intensive',
      ]);

    // Create cache info
    $cacheKey = md5($url_geonames);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 100)
    {
        $result_geonames = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
      $isResult_geonames = countryPosition($url_geonames, $cachePath);
    }

    // Decode JSON
    $result_geonames = json_decode($result_geonames);
?>
