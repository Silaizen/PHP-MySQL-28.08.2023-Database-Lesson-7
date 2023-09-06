<?php require_once './connect.php' ?>

<?php
$id = $_GET['id'] ?? null;
if (!empty($id)) {
    $sql = "DELETE FROM products WHERE id=$id";
    $db->query($sql);
}
header('Location: product-list.php');
exit;
?>