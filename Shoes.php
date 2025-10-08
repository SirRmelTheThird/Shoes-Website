<?php 
    require 'ShoesDatabase.php';
    require 'ShoesHeader.php'; 
?>

<?php
$db = new Database();
$conn = $db->getConn();
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["clicked"]) && isset($_POST["searchbar"])) {
    $search_term = $_POST["searchbar"];

    $result = $conn->query("SELECT * FROM shoes WHERE shoes_name LIKE '%$search_term%'");

    if (!$result) { 
        echo "<center>No Shoes Found</center>";
        exit();
    }
}
?>
<!DOCTYPE html>
<body>
    <div id="content">
        <?php 
        if ($result) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $column) : ?>
                <div class="box">
                    <div class="image">
                        <a href="ShoeInfo.php"><img src="<?= $column['image_link']; ?>"></a>
                    </div>

                    <div class="id">
                        <p><?= $column['shoes_name']; ?></p>
                    </div>

                    <div class="model">
                        <p><?= $column['model']; ?></p>
                    </div>

                    <div class="price">
                        <p>£<?= $column['price']; ?></p>
                    </div>                   
                </div>
            <?php endforeach;} ?>
    </div>
</body>
</html>