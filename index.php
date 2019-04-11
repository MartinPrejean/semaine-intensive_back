<?php $title = 'Semaine intensive'; ?>
<?php $currentPage = 'index'; ?>

<?php

// Includes
  include 'api_gestion/mealAPI.php';
  include 'api_gestion/weatherAPI_request.php';
  include 'api_gestion/mealAPI.php';

//   include 'fonctions.php';
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
    <!-- <h3>ISS Location</h3> -->
        <div><?= $issLongitude ?>° <br><br></div>
        <div><?= $issLatitude ?>°</div>
        <div><?= $country ?><br><br></div>
        <div><?= $weather ?><br><br></div>
        <div><?= $temp ?>°C<br><br></div>
        <div><?= $intro ?><br><br></div>
        <div><?= $mealName ?><br><br></div>
        <div><?= $mealType ?><br><br></div>
        <div><?= print_r($ingredientTable); ?><br><br></div>
        <div><?= print_r($quantitiesTable); ?><br><br></div>
  </body>
  <script src="script.js"><script>
</html>