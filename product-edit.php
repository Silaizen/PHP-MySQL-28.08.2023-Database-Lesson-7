<?php require_once './connect.php' ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>Edit Product</h1>

        <?php
        $id = $_GET['id'] ?? null;
        if (empty($id)) {
            header('Location: product-list.php');
            exit;
        }

        $stmt = $db->query("SELECT products.id, products.name, products.price, products.category_id, categories.name as category_name 
                            FROM products 
                            LEFT JOIN categories ON products.category_id = categories.id 
                            WHERE products.id=$id");
        $product = $stmt->fetch(PDO::FETCH_OBJ);
        ?>

        <form action="product-process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?= $product->name ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value="<?= $product->price ?>">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category_id">
                    <?php
                    $stmt = $db->query('SELECT * FROM categories');
                    $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($categories as $category) :
                    ?>
                    <option value="<?= $category->id ?>" <?= ($category->id == $product->category_id) ? 'selected' : '' ?>>
                        <?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?= $product->id ?>">
            <button class="btn btn-primary mt-3" name="update-product">Save Changes</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>