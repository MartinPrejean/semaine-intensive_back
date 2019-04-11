
<?php
// Includes
include 'wikiAPI.php';

/*
*                      TheMealDB API request
*/

// country into nationality
// $countries = [
//   'France' => 'French',
//   'United-State' => 'American',
//   'Canada' => 'Canadian',
// ];

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

// Call to curl - Meals 
$URL = 'https://www.themealdb.com/api/json/v1/1/filter.php?a='.$nationality;

// Get data from URL - Meals
$data = getData($URL);
$result = json_decode($data);

// Get meal ID 
$mealId = $result->meals[0]->idMeal;

// Call to curl - Recipe 
$URL2 = 'https://www.themealdb.com/api/json/v1/1/lookup.php?i='.$mealId;

// Get data from URL - Meals
$data2 = getData($URL2);
$result = json_decode($data2);

// Get Meal name
$mealName = $result->meals[0]->strMeal;

// Get Meal dishes type
$mealType = $result->meals[0]->strCategory; 

// Get ingredient list
$ingredientTable = [];
for ($i=1; $i < 20; $i++) 
{ 
  $ingredients = 'strIngredient'.$i;
  if ($result->meals[0]->$ingredients) 
  {
    array_push($ingredientTable, $result->meals[0]->$ingredients);
  }
}

// Get ingredient quantities
$quantitiesTable = [];
for ($i=1; $i < 20; $i++) 
{ 
  $quantities = 'strMeasure'.$i;
  if ($result->meals[0]->$quantities) 
  {
    array_push($quantitiesTable, $result->meals[0]->$quantities);
  }
}
// var_dump($quantitiesTable);