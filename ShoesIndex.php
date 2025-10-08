<?php
require 'ShoeInfo.php';
require 'ShoesRecord.php';


if (isset($_GET['Shoes_id'])) {
    $data =  getData($conn, $_GET['Shoes_id']);
    } else {
        $data = null;   
}

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $data = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>

<!-- <a href="InsertShoes.php">Add Shoes</a> -->

<?php if (empty($data)): ?>
    <p>No Shoes found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($datas as $data): ?>
            <li>
                <data>
                    <h2><a href="Shoes.php?id=<?= $data['Shoes_id']; ?>"><?= htmlspecialchars($data['shoes_name']); ?></a></h2>
                    <p><?= htmlspecialchars($data['price']); ?></p>
                    <p><?= htmlspecialchars($data['model']); ?></p>
                </data>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>
