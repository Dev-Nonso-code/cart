<?php 
include './database/conn.php';

if (isset($_POST['add_product'])) { 
    $p_pname = $_POST['pname']; 
    $p_price = $_POST['price']; 
    $p_image = $_FILES['Image']['name']; 
    $p_image_temp_name = $_FILES['Image']['tmp_name']; 
    $image_folder = "images/" . $p_image; 
    // echo $p_image; 
    $insert_query = mysqli_query($conn, "INSERT INTO `shop` (pname, price, image) VALUES ('$p_pname', '$p_price', '$p_image')") or die("Insert failed"); 
    
    if($insert_query) { 
        move_uploaded_file($p_image_temp_name, $image_folder); 
        $display_message = "Product inserted successfully"; 
        echo $display_message;
    } else { 
        $display_message = "Product insertion failed"; 
        echo $display_message;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HomePage</title> 
   <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head> 
<body> 
    <div class="sticky-top"> 
        <?php include('nav.php') ?>
    </div>
    <main> 
        <form action="" method="post" enctype="multipart/form-data" class="form-group text-center mt-4 box shadow m-auto"> 
            <div class=""> 
                <input type="text" name="pname" class="text-center m-auto form-control w-50 mt-4 box shadow" placeholder="Product Name" required> 
            </div>
            <div> 
                <input type="number" name="price" class="text-center m-auto form-control w-50 mt-2 box shadow" placeholder="Product Price" id="" required> 
            </div>
            <div> 
                <input type="file" name='Image' accept="image/png, image/jpg, image/jpeg" placeholder="Choose product Image" class="text-center m-auto form-control w-50 mt-2 box shadow" id="" required> 
            </div>
            <div> 
                <button type="submit" name="add_product" class="submit-btn btn btn-primary m-3" id="">Add Product</button> 
            </div>
        </form>
    </main>

    <script src="./databases/javas/script.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
