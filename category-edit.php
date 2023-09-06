<?php require_once './connect.php' ?>
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
    $id = $_GET['id'] ?? null;
    if(empty($id)){
        header('Location: index.php');
        exit;
    }

    $category = $db->query("SELECT * FROM categories WHERE id=$id")->fetch(PDO::FETCH_OBJ);
    ?>

        <div class="container">
            <h1>Edit category</h1>
            
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?= $category->name ?>">
                </div>
                
                <input type="hidden" name="id" value="<? $category->id ?>">
                <button class="btn btn-primary mt-3"name="update-category">Send</button>
            </form>

        </div>  
        
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>  
    </body>

    </html>