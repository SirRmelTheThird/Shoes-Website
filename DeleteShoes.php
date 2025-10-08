<?php
require 'ShoesDatabase.php';
require 'ShoesRecord.php';

$conn = getDB();

if (isset($_GET['Shoes_id'])) {
    $id = $_GET['Shoes_id'];
    $data = getData($conn, $id);

    if ($data) {
        $shoes_name = $data['shoes_name'];
        $price = $data['price'];
        $model = $data['model'];
        $description = $data['description'];
        $colour = $data['colour'];
        $size = $data['size'];
        $image_link = $data['image_link'];
        

    } else {
        die("Shoe not found");
    }

//} else {
    //die("id not supplied, shoe not found");
}



if (empty($errors)) {

    $sql = "DELETE FROM article
            WHERE Shoes_id = ?";
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);

        } else {

            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                redirect("/Shoes.php");

            } else {

                echo mysqli_stmt_error($stmt);

            }
        }
    }
}

?>
<h2>Delete Shoe</h2>
<form method="post">
    <p>Are you sure?</p>
    <button>DELETE</button>
    <a href="Shoes.php?id=<?= $data['Shoes_id']; ?>">CANCEL</a>
<form>