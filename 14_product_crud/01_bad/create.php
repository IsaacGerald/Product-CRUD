<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', 'Ayzzoh25');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$errors = [];


$title = '';
$price = '';
$description = '';


// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';


// echo $_SERVER['REQUEST_METHOD'].'<br>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');


    if (!$title) {
        $errors[] = 'Product title is required';
    }
    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (!is_dir('images')) {
        mkdir('images');
    }

    if (empty($errors)) {

        //$image = $_FILES['image'] ?? null;
        $image = $_FILES['image']['size'] == 0 ? null : $_FILES['image'];

        $imagePath = '';


        if ($image) {

            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));

            // echo '<pre>';
            // var_dump($imagePath);
            // echo '</pre>';

            move_uploaded_file($image['tmp_name'], $imagePath);
        }




        $statement =  $pdo->prepare("INSERT INTO products(title, image, description, price, create_date)
               VALUES(:title, :image, :description, :price, :date); ");


        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);

        $statement->execute();


        header('Location: index.php');
    }
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSRUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products CRUD</title>
</head>

<body>

    <p>
        <a href="index.php" class="btn btn-secondary">Go Back to products</a>
    </p>

    <h1>Create new Product</h1>


    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">

            <?php foreach ($errors as $error) : ?>

                <div><?php echo $error ?></div>

            <?php endforeach; ?>

        </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">


        <?php if ($product['image']) : ?>
            <img src="<?php echo $product['image'] ?>" class="update-image">
        <?php endif; ?>

        <div class="form-group">
            <label>Product Image</label>
            <br>
            <input type="file" name="image">

        </div>
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" name="title" value="<?php echo $title ?>" class="form-control">

        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>

        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="price" value="<?php echo $price ?>" step=".01" class="form-control">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



</body>

</html>