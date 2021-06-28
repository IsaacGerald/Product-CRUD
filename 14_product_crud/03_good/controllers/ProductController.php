<?php


namespace app\controllers;

use app\models\Product;
use app\Router;


class ProductController
{

    public function index(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $products = $router->db->getProducts($search);

        echo $router->renderView('products/index', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function create(Router $router)
    {
        $errors = [];
        $productsData = [
            'title' => '',
            'description' => '',
            'image' => '',
            'price' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productsData['title'] = $_POST['title'];
            $productsData['description'] = $_POST['description'];
            $productsData['price'] = (float)$_POST['price'];
            $productsData['imageFile'] = $_FILES['image'] ?? null;


            $product = new Product();
            $product->load($productsData);
            $errors = $product->save();
            if (empty($errors)) {
                header("Location: /products");
                exit;
            }
        }

        echo $router->renderView('products/create', [
            'product' => $productsData,
            'errors' => $errors
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: /products");
        }
        $errors = [];
        $productsData = $router->db->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $productsData['title'] = $_POST['title'];
            $productsData['description'] = $_POST['description'];
            $productsData['price'] = (float)$_POST['price'];
            $productsData['imageFile'] = $_FILES['image'] ?? null;


            $product = new Product();
            $product->load($productsData);
            $errors = $product->save();
            if (empty($errors)) {
                header("Location: /products");
                exit;
            }
        }

        echo '<pre>';
        var_dump($productsData);
        echo'</pre>';

        echo $router->renderView('products/update', [
            'product' => $productsData,
            'errors' => $errors
        ]);

       ;
    }

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /products');
            exit;
        }


        $router->db->deleteProduct($id);
        header('Location: /products');
    }
}
