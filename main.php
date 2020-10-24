<?php
main();

function main(){

  // Type Numbers
  $input_user_numbers = inputs() ;
 
  // Get Winning numbers of Loto
  $loto_numbers = getRandomNumbers();

  // Compare the arrays
  $isWin = compareTwoArrays($input_user_numbers, $loto_numbers);

  echo "\nVos numéros: ". implode(", ", $input_user_numbers);
  echo "\nVoici la grille gangante: ". implode(", ", $loto_numbers);

  // Check is user win or not
  if($isWin){
    echo "\nVous avez gangné !";
  }
  else{
    echo "\nVous avez perdu !";
  }
}

/**
* Input numbers by user
*/
function inputs(){
  $input_user_numbers = [] ;
  echo "Entrez votre grille de loto compris entre 1 et 49 \n";

  // Type 6 numbers
  for ($i=0; $i < 6; $i++) {
    $new_number = readline("Tapez un nombre: ") ;
    while(in_array($new_number, $input_user_numbers) || !$new_number || !is_numeric ( $new_number )){
      echo "\nThis number is already exist or invalid \n";
      $new_number = readline("Retapez un autre nombre: ") ;
    }

    if(!in_array($new_number, $input_user_numbers)){
      $input_user_numbers[] = $new_number;
    }
  }
  return $input_user_numbers ;
}

/**
* Get 6 numbers randomly
*/
function getRandomNumbers(){
    $rand_numbers = [] ;
    for ($i=0; $i < 6; $i++) {
      $new_rand_numbers = rand(1, 49);
      while(in_array($new_rand_numbers, $rand_numbers)){
        echo "\nThis number is already exist or invalid \n" ;
        $new_rand_numbers = rand(1, 49);
      }
      $rand_numbers[] = $new_rand_numbers;
    }
  return $rand_numbers ;
}

/**
* Compare random array and input array
*/
function compareTwoArrays($first_array, $seconde_array){
  sort($first_array);
  sort($seconde_array);
  return $first_array == $seconde_array ;
}
