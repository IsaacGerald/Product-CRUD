<?php
// Magic constants

echo __DIR__.'<br>';
echo __FILE__.'<br>';
echo __LINE__.'<br>';

// Create directory

mkdir('test');

// Rename directory

rename('test', 'test2');

// Delete directory

rmdir('test2');

// Read files and folders inside directory

$files = scandir('../');

echo '<pre>';
var_dump($files);
echo '<prep>';

// file_get_contents, file_put_contents

echo file_get_contents('lorem.txt'); //get contents

file_put_contents('sample.txt', 'Some content'); //put contents

// file_get_contents from URL

$usersJson = file_get_contents('https://jsonplaceholder.typicode.com/users');

echo $usersJson;

$users = json_decode($usersJson, true ); // true => converts associative arrays into objects

echo '<pre>';
var_dump($users);
echo '<prep>';
// https://www.php.net/manual/en/book.filesystem.php
// file_exists
    
file_exists('sample.txt'); //true

// is_dir

is_dir('test'); //false

// filemtime
// filesize
// disk_free_space
// file