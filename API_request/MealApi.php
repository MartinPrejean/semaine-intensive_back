<?php
// Includes
include 'geolocAPI.php';
/*
*                      TheMealDB API request
*/
// country into nationality
$nationalities = array (
  'France' => 'French',
  'United-State' => 'American',
  'Canada' => 'Canadian',
  'Jamaica' => 'Jamaican',
  'China' => 'Chinese',
  'Holland' => 'Dutch',
  'Egypt' => 'Egyptian',
  'Greece' => 'Greek',
  'India' => 'Indian',
  'Ireland' => 'Irish',
  'Italy' => 'Italian',
  'Japan' => 'Japanese',
  'Malaisya' => 'Malaisian',
  'Mexico' => 'Mexican',
  'Marocco' => 'Maroccan',
  'Croatia' => 'Croatian',
  'Norway' => 'Norwegian',
  'portugal' => 'Portuguese',
  'Russia' => 'Russian',
  'Argentina' => 'Argentinian',
  'Spain' => 'Spanish',
  'Slovakie' => 'Slovakian',
  'Thailand' => 'Thai',
  'Arabic Emirate' => 'Arabic',
  'Vietnam' => 'vietnamese'
);
// Check if this Nationality exist in TheMealDB
foreach ($nationalities as $key => $value) 
{
  if ($country == $key) 
  {
    $country2 = $value;

    // Call to cURL - Meals 
    $URL = 'https://www.themealdb.com/api/json/v1/1/filter.php?a='.$country2;

    // Create cache info
    $cacheKey = md5($URL);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 5)
    {
        $result = file_get_contents($cachePath); 
        $cacheUsed = true;
    }

    else 
    {
        // Get data from URL - Meals
        $data = getData($URL, $cachePath);
        $result = json_decode($data);
    }

    // Get meal ID 
    $mealId = $result->meals[0]->idMeal;
    
    // Call to cURL - Recipe 
    $URL2 = 'https://www.themealdb.com/api/json/v1/1/lookup.php?i='.$mealId;

    // Create cache info
    $cacheKey = md5($URL, $cachePath);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 5)
    {
        $result = file_get_contents($cachePath); 
        $cacheUsed = true;
    }
    
    else 
    {
      // Get data from URL - Meals
      $data2 = getData($URL2, $cachePath);
      $result = json_decode($data2);
    }

    // Get Meal name
    $mealRecipe = $result->meals[0]->strInstructions;
    // Get Meal recipe
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
    break;
  }   

  else
  {
    $country2 = 'not implemented yet';
    $quantitiesTable = [];
    $quantitiesTable[]='not implemented yet';
    $ingredientTable = [];
    $ingredientTable[]='not implemented yet';
    $mealType = 'not implemented yet';
    $mealName = 'not implemented yet';
    $mealRecipe = 'not implemented yet';
  }
}