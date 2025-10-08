<?php if (! empty($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="Image">Shoe Image: </label>
        <input name="image_link" placeholder="Image" value="<?= htmlspecialchars($image_link); ?>">
    </div>
    
    <div>
        <label for="Name">Shoe Name: </label>
        <input name="shoes_name" placeholder="Name" value="<?= htmlspecialchars($shoes_name); ?>">
    </div>

    <div>
        <label for="Price">Shoe Price: </label>
        <input name="price" placeholder="Price" value="<?= htmlspecialchars($price); ?>">
    </div>

    <div>
        <label for="Model">Shoe Model: </label>
        <input name="model" placeholder="Model" value="<?= htmlspecialchars($model); ?>">
    </div>

    <div>
        <label for="Colour">Colour: </label>
        <input name="colour" placeholder="Colour" value="<?= htmlspecialchars($colour); ?>">
    </div>
    
    <div>
        <label for="Size">Shoe Size: </label>
        <input name="size" placeholder="Size" value="<?= htmlspecialchars($size); ?>">
    </div>

    <div>
        <label for="Description">Shoe Description: </label>
        <textarea name="description" rows="4" cols="40"  placeholder="Description"><?= htmlspecialchars($description); ?></textarea>
    </div>



    <button>ADD</button>
    <button><a href="Shoes.php">CANCEL</a></button>
<form>
</form>
