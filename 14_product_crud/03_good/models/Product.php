<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

class Product
{


    public ?int $id = null;
    public ?string $title = null;
    public ?float $price = null;
    public ?string $description = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;


    public function load($data)
    {

        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->price = $data['price'];
        $this->description = $data['description'] ?? '';
        $this->imagePath = $data['image'] ?? null;
        $this->imageFile = $data['imageFile'] ?? null;
    }

    public function save()
    {

        $errors = [];
        if (!$this->title) {
            $errors[] = 'Product title is required';
        }
        if (!$this->price) {
            $errors[] = 'Product price is required';
        }

        if (!is_dir(__DIR__ . '/../public/images')) {
            mkdir(__DIR__ . '/../public/images');
        }


        if (empty($errors)) {

            //$image = $_FILES['image'] ?? null;

            $this->image = $_FILES['image']['size'] == 0 ? null : $_FILES['image'];




            if ($this->image) {

                if ($this->imagePath) {
                    unlink(__DIR__ . '/../public/' . $this->imagePath); //deletes the image
                }

                $this->imagePath = 'images/' . UtilHelper::randomString(8) . '/' . $this->imageFile['name'];
                mkdir(dirname(__DIR__ . '/../public/' . $this->imagePath));

                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);
            }

            $db = Database::$db;
            if ($this->id) {
                $db->updateProduct($this);
            } else {
                $db->createProduct($this);
            }
        }

        return $errors;
    }
}
