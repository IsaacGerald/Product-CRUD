<?php

$age = 25;
$salary = 300000;

// Sample if
//
// if ($age == 20) {
//   echo "1";
// }
//
// // Without circle braces
//
// if ($age == 20) echo "1";
//
//
// // Sample if-else
//
// if ($age > 20) {
//   echo "1";
// }else {
//   echo "2";
// }

// Difference between == and ===

if ($age == 20) {
  echo "1".'<br>';
}


if ($age === '20') {
  echo "2".'<br>';
}

// if AND

if ($age > 20 && $salary === 300000 ) {
   echo "Do something";
}


// if OR

if ($age > 20 || $salary === 300000 ) {
   echo "Do something";
}

// Ternary if

echo $age < 22 ? 'Young' : 'old';

// Short ternary

$myAge = $age ?: 18;

echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator

$myName = isset($name) ? $name : 'John';

//..also

$myName2 = $name ?? 'John';
echo $myName2. '<br>';

// switch

$userRole = 'editor'; //editor, user, admin
switch ($userRole) {
  case 'admin':
    echo 'admin';
    break;
  case 'editor':
    echo 'editor';
    break;
  case 'user':
    echo 'user';
    break;
  default:
    echo "Invalid role";;
}
