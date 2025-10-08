<?php

require 'ShoesDatabase.php';
require 'ShoesRecord.php';
require 'ShoesForm.php';
include 'Shoes.php';

// $data = new ShoesRecord();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $db = new Database();
    // $conn = $db->getConn();

    $data->shoes_name = $_POST['shoes_name'];
    $data->price = $_POST['price'];
    $data->model = $_POST['model'];
    $data->description = $_POST['description'];
    $data->colour = $_POST['colour'];
    $data->size = $_POST['size'];
    $data->image_link = $_POST['image_link'];

    //$errors = ShoesRecord::validateData($shoes_name, $price, $model, $description, $colour, $size, $image_link);   // NEW

    if ($data->create($conn)) {
        redirect("/ShoesInfo.php?id={$data->Shoes_id}");
    }
}
