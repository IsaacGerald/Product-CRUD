<?php

session_start();

echo session_id();




$_SESSION['page_counter'] = $_SESSION['page_counter'] ?? 0;
$_SESSION['page_counter']++;

$pageCounter = $_SESSION['page_counter'] ?? 0;
if($_SESSION['page_counter'] === 10){
    echo "Thanks for visiting us 10 times".'<br>';
    session_unset();
    session_destroy();
}



// echo '<pre>';
// var_dump($_SESSION);
// echo'</pre>';



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>My Awesome page visited <?php echo $pageCounter ?> times </h1>
</body>
</html>
