
<?php
$Country = "Canadian";
$URL = 'https://www.themealdb.com/api/json/v1/1/filter.php?a='.$Country;
$Data = file_get_contents($URL);
$Meal = json_decode($Data);
$Mealid = $Meal->meals[0]->idMeal;

$URLV = 'https://www.themealdb.com/api/json/v1/1/lookup.php?i='.$Mealid;
$Datav = file_get_contents($URLV);
$Mealv = json_decode($Datav);
var_dump($Mealv);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="main.js"></script>
</head>
<body>
  
</body>
</html>