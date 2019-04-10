<?php

    // 
    // ISS API request
    // 

    $url_iss = 'http://api.open-notify.org/iss-now.json';
    
    // Create cache info
    $cacheKey = md5($url_iss);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 5)
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
?>