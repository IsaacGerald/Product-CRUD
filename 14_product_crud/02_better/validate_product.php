<?php

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$imagePath = '';


if (!$title) {
    $errors[] = 'Product title is required';
}
if (!$price) {
    $errors[] = 'Product price is required';
}

if (!is_dir(__DIR__ . '/public/images')) {
    mkdir(__DIR__ . '/public/images');
}

if (empty($errors)) {

    //$image = $_FILES['image'] ?? null;

    $image = $_FILES['image']['size'] == 0 ? null : $_FILES['image'];

    $imagePath = $product['image'];


    // echo '<pre>';
    // var_dump($imagePath);
    // echo '</pre>';
    // exit;



    if ($image) {

        if ($product['image']) {
            unlink(__DIR__ .'/public/'. $product['image']); //deletes the image
        }

        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname(__DIR__.'/public/'.$imagePath));


        move_uploaded_file($image['tmp_name'], __DIR__. '/public/' . $imagePath);
    }

}