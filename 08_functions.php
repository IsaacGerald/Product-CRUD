<?php

// Function which prints "Hello I am Zura"

// function hello(){
//   echo "Hello I am Zura";
// }
// hello();
// hello();
// hello();

// Function with argument

function hello($name){
  return "Hello I am $name";
}

echo hello('Zura'). '<br>';
// Create sum of two functions

function sum1($a, $b){
  return $a + $b;
}

echo sum1(2, 3).'<br>';
// Create function to sum all numbers using ...$nums
// function sum(...$nums){
//
//   echo '<prep>';
//   var_dump($nums);
//   echo '</prep>';
//
// }

function sum(...$nums){

   $sum = 0;

   foreach ($nums as $num) {
     $sum+=$num;
   }

   return $sum;

}


echo sum(1, 2, 3, 4, 5, 6). '<br>';


// Arrow functions


function sum3(...$nums){

   return array_reduce($nums, fn($carry, $n) => $carry + $n);

}

echo sum3(1, 2, 3, 4, 5, 6);
