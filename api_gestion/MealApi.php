
<?php
//includes
include 'wikiAPI.php';
// include_once 'utils/utils.php';

//variable country

// $countries = [
//   'France' => 'French',
//   'United-State' => 'American',
//   'Canada' => 'Canadian',
// ];

// $nationality = $countries[$result_geonames];
  
  //Country name format
if ($country = 'France'){
  $nationality = 'French';
}else if ($country = 'United States'){
  $nationality = 'American';
}else if ($country = 'Canada'){
  $nationality = 'Canadian';
}else if ($countrys = 'Jamaica'){
  $nationality = 'Jamaican';
}else if ($country = 'China'){
  $nationality = 'Chinese';
}else if ($country = 'Holland'){
  $nationality = 'Dutch';
}else if ($country = 'Egypt'){
  $nationality = 'Egyptian';
}else if ($country = 'Greece'){
  $nationality = 'Greek';
}else if ($country = 'India'){
  $nationality = 'Indian';
}else if ($country = 'Ireland'){
  $nationality = 'Irish';
}else if ($country = 'Italy'){
  $nationality = 'Italian';
}else if ($country = 'Japan'){
  $nationality = 'Japanese';
}else if ($country = 'Malaysia'){
  $nationality = 'Malaisyan';
}else if ($country = 'Mexico'){
  $nationality = 'Mexican';
}else if ($country = 'Marocco'){
  $nationality = 'Maroccan';
}else if ($country = 'Croatia'){
  $nationality = 'Croatian';
}else if ($country = 'Norway'){
  $nationality = 'Norwegian';
}else if ($country = 'portugal'){
  $nationality = 'Portuguese';
}else if ($country = 'Russia'){
  $nationality = 'Russian';
}else if ($country = 'Argentina'){
  $nationality = 'Argentinian';
}else if ($country = 'Spain'){
  $nationality = 'Spanish';
}else if ($country = 'Slovakie'){
  $nationality = 'Slovakian';
}else if ($country = 'Thailand'){
  $nationality = 'thai';
}else if ($country = 'Arabic Emirates'){
  $nationality = 'Argentinian';
}else if ($country = 'Vietnam'){
  $nationality = 'Vietnamese';
}

/**
*   get Some of the local dishs 
*/

// Call to curl - Meals 
$URL = 'https://www.themealdb.com/api/json/v1/1/filter.php?a='.$nationality;
$data = getData($URL);
$result = json_decode($data);

//Get meal ID 
$mealId = $result->meals[0]->idMeal;

// Call to curl - Recipe 
$URL2 = 'https://www.themealdb.com/api/json/v1/1/lookup.php?i='.$mealId;
$data2 = getData($URL2);
$result = json_decode($data2);
var_dump($result);

//Get Meal name
$mealName = $result->meals[0]->strMeal;

//Get Meal dishes type
$mealtype = $result->meals[0]->strCategory; 
// var_dump(count($mealtype));

//Get ingredient list
$ingredientTable = [];
for ($i=1; $i < 20; $i++) 
{ 
  $ingredients = 'strIngredient'.$i;
  if ($result->meals[0]->$ingredients) 
  {
    array_push($ingredientTable, $result->meals[0]->$ingredients);
  }
}
echo('test');
var_dump($ingredientTable);

//Get ingredient quantities
$quantitiesTable = [];
for ($i=1; $i < 20; $i++) 
{ 
  $quantities = 'strMeasure'.$i;
  if ($result->meals[0]->$quantities) 
  {
    array_push($quantitiesTable, $result->meals[0]->$quantities);
  }
}
var_dump($quantitiesTable);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
  <!-- <script src="main.js"></script> -->
</head>
<body>
  
</body>
</html>