<?php require_once './connect.php' ?>

<?php
if (isset($_POST['create-product'])) {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $category_id = $_POST['category_id'] ?? '';

    if (empty($name) || empty($price) || empty($category_id)) {
        header('Location: product-create.php');
        exit;
    }

    $sql = "INSERT INTO products (name, price, category_id) VALUES ('$name', '$price', '$category_id')";
    $db->query($sql);
    header('Location: product-list.php');
    exit;
}

if (isset($_POST['update-product'])) {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $category_id = $_POST['category_id'] ?? '';

    if (empty($id) || empty($name) || empty($price) || empty($category_id)) {
        header('Location: product-edit.php');
        exit;
    }

    $sql = "UPDATE products SET name='$name', price='$price', category_id='$category_id' WHERE id=$id";
    $db->query($sql);
    header('Location: product-list.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";
    $db->query($sql);
    header('Location: product-list.php');
    exit;
}
?>