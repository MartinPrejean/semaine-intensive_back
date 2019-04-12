<?php
    
    $title = 'Semaine intensive';
    global $issLatitude;
    global $issLongitude;

    // Includes
    include 'API_request/issDataAPI.php';

    $issLatitude = $result->iss_position->latitude;
    $issLongitude = $result->iss_position->longitude;

    include 'API_request/geolocAPI.php';

    include 'API_request/weatherAPI.php';

    $temp = $result->main->temp;
    $weather = $result->weather[0]->description;

    include 'API_request/MealAPI.php';

    include 'API_request/wikiAPI.php';

    include 'API_request/restCountryAPI.php';

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
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/International_Space_Station.svg">
  </head>
  <body>
    <div class="container">
        <?php include 'templates/nav-bar.php'; ?>

        <div class="container_landing">
            <div class="container_landing_left">
                <div class="container_description">

                    <div class="text_intro">With the <span class="iss_yellow">ISS</span>, <br>Enrich your <br>culture!</div>
                    <div class="current_text">The international space station constantly flies over our planet, D’<span class="iss_yellow">ISS</span> COVER makes you discover a new culture according to its position</div>

                    <div class="button_discover">Discover</div>

                </div>
                <div class="container_info hide">
          
                    <div class="country">Currently on <br><span class="active_country"><?= $country ?></span></div>

                    <div class="coord">
                        <div class="longitude"><span class="grey_color">Long: </span><?= $issLongitude ?>°</div>
                        <div class="latitude"><span class="grey_color">Lat: </span><?= $issLatitude ?>°</div>
                    </div>
                    
                    <div class="weather">
                        <div class="temp">Temps: <?= $temp ?>°</div>
                        <div class="weather_description">Weather: <?= $weather ?></div>
                    </div>
                    <div class="pop">Pop: <?= $population ?></div>


                    <div class="country_information">
                        <div class="line"></div>
                        <div class="country_description_title">Country <span class="country_color"><?= $country ?></span></div>
                        <div class="country_description"><?= $intro ?></div>
                        <div class="link_country"><a href="https://en.wikipedia.org/wiki/<?= $country ?>">More about <span class="country_color"><?= $country ?></span></a></div>
                    </div>
                </div>
            </div>
            <div class="container_landing_right">
                
                <div class="map"></div>
            
            </div>
        </div>
        <div class="recipe_container hide">
            <div class="line"></div>
            <div class="recipe_subtitle">Recipe</div>

            <div class="recipe_card">
                <div class="recipe_left">
                    <div class="recipe_name"><?= $mealName ?></div>
                    <div class="recipe_img"></div>
                    <div class="recipe_detail">
                        <div class="recipe_type"><?= $mealType ?></div>
                        <div class="recipe_country"><?= $country2 ?></div>
                    </div>
                </div>

                <div class="recipe_middle">
                    <div class="recipe_ingredient_title">Ingredients</div>
                    <div class="recipe_ingredient_detail">
                        
                        <div class="recipe_ingredient"> 
                            <?php foreach ($ingredientTable as $ingredient): ?>
                                <?= $ingredient ?>
                            <?php endforeach ?>
                        </div>
                        <div class="recipe_measure">
                            <?php foreach ($quantitiesTable as $quantity): ?>
                                <?= $quantity ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="recipe_right">
                    <div class="recipe_description_title">How to make it</div>
                    <div class="recipe_description"><?= $mealRecipe ?></div>
                </div>
            </div> 
        </div>  
    </div>

    <script>
        const countryName = '<?= $country ?>';
        let latitudeISS = '<?= $issLatitude ?>';
        let longitudeISS = '<?= $issLongitude ?>';
    </script>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="scripts/map.js"></script>

    <script src="scripts/app.js"></script>      
</body>
</html>
