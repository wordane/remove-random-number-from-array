<?php
/* Using a Mersenne Twister Algorithm to 
 * generate random 500 numbers within a while loop
 */

// $arr = array() in php < 5.4
$arr = [];

// Limit of the numbers in the array
$limit = 500;

// Generating unique random numbers within
function UniqueNumbersArray($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$arr = UniqueNumbersArray(1,$limit,$limit);
echo "Initial Array is \n"; var_dump($arr);

// Flipping the original array for later usage
$flipOriginaArray = array_flip($arr);

// Now selecting the random number to be discarded
$remove = mt_rand(1, $limit);
echo 'The random number to be deleted is '.$remove;

//Locating the array key for the random element.
$key = array_search($remove, $arr); 

//unset the array key
unset($arr[$key]);

// Flipping the array so that the value becomes Keys and searching through keys is a hash lookup
$flipReducedArray = array_flip($arr);

//Re-indexing the Array
$arr = array_merge($arr);
echo "\n"; var_dump($arr);

/*
 * Now Searching for the deleted element in the new Array 
 */

// Finding the difference of two arrays
$result = array_diff($flipOriginaArray, $flipReducedArray);

foreach($result as $key => $value)
    echo "The number deleted was ". $key . " and the array key was " . $value . "\n";

?>
