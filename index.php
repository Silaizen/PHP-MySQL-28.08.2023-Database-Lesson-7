<?php require_once('./connect.php') ?>

<!doctype html>
<html lang="en">

      <head>
            <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Bootstrap demo</title>    
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
                    </head>  
    <body>    
                         

    <?php
    
    if(isset($_POST['create-category'])){
        $name = $_POST['name'] ?? '';
        if(empty($name)){
            header('Location: category-create.php');
            exit;
        }
        $sql = "INSERT INTO categories(name) VALUES('$name')";
        //echo $sql;
        $db->query($sql);
    }

    if(isset($_POST['update-category'])) {
        unset($_POST['update-category']);
        $name = $_POST['name'] ?? '';
        $id = $_POST['id'] ?? '';
 
        if(empty($name)) {
            header('Location: category-edit.php');
            exit();
        }
        $sql = "UPDATE categories SET name=? WHERE id=?";
        $sth = $db->prepare($sql);
        $sth->execute([$name, $id]);
    }
    
    

    $stmt = $db->query('SELECT * FROM categories');
    $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
    //echo '<pre>' . print_r($result, true) . '</pre>';
        ?>

        <div class="container">
        <h1>Categories</h1>

        <a href="category-create.php" class="btn btn-primary">Add category</a>

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td>
                        <a href="category-edit.php?id=<?= $category->id ?>" class="btn btn-warning">Edit</a>
                        <a href="category-delete.php?id=<?= $category->id ?>" class="btn btn-danger">Delete</a>
                            <a href="product-list.php?category_id=<?= $category->id ?>" class="btn btn-info">View Products</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>


                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
                         </script>  
    </body>
 </html> 