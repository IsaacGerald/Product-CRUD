<?php


require_once "Person.php";
require_once "Student.php";
// What is class and instance

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter



// $p = new Person('Brad', 'Traversy');
// $p->setAge(30);
// echo $p->getAge();


// echo '<pre>';
// var_dump($p);
// echo '<pre>';


// $p2 = new Person('John', 'Smith');
// echo '<pre>';
// var_dump($p2);
// echo '<pre>';

// echo Person::$counter;


$student = new Student("Brad", "Traversy", "342");
echo Person::getCounter();

echo '<pre>';
var_dump($student);
echo '<pre>';
