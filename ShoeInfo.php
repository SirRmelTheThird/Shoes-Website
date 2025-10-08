<style>
.edit{
    grid-row-end: 5;
    grid-row-start: 5;
}
.delete{
    grid-row-end: 5;
    grid-row-start: 5;
}

.Edit_Button:hover, .Delete_Button:hover{
    background-color:rgb(175, 175, 175);
    border: 1px solid rgb(175, 175, 175);
    text-decoration: none;
}
</style>

<?php require 'ShoesDatabase.php';
$conn = getDB();
$result = $conn->query("SELECT * FROM shoes WHERE shoes_name LIKE '%$search_term%'"); ?>

<!DOCTYPE html>
<body>
    <div id="content">
        <?php 
        if ($result) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $column) : ?>
                <div class="box">
                    <div class="image">
                        <a href="ShoesForm.php"><img src="<?= $column['image_link']; ?>"></a>
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

