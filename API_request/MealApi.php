
<?php
// Includes
// include 'wikiAPI.php';
include 'utils/utils.php';

/*
*                      TheMealDB API request
*/
$country = 'France';
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
  'Vietnam' => 'vietnamese',
);

// Check if this Nationality exist in TheMealDB
foreach ($nationalities as $key => $value) {
  if ($country == $key) {
    $country2 = $value;
    // Call to curl - Meals 
    $URL = 'https://www.themealdb.com/api/json/v1/1/filter.php?a='.$country2;
      
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
    break;
  }   
  else{
    var_dump($country2);
    $country2 = 'not implemented yet';
    var_dump($country2);
    $quantitiesTable = [];
    $quantitiesTable[]='not implemented yet';
    $ingredientTable = [];
    // if $ingredientTable{
    //   array_push($ingredientTable, 'not implemented yet');
    // }
    $mealType = 'not implemented yet';
    $mealName = 'not implemented yet';
  }
}



  // var_dump($quantitiesTable);