<?php
include './database/conn.php';

if (isset($_POST['Add-Cart'])) {
    $p_name = $_POST['pname'];
    $p_price = $_POST['price'];
    $p_image = $_POST['image'];
    $p_quantity = 1;

    // select cart data

    $select_cart = mysqli_query($conn, "select * from `cart` where name ='$p_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message[] = "Product Already Added To Cart";
    } else {
        // insert cart query
        $insert_products = mysqli_query($conn, "insert into `cart` (name, price, image, quantity) values ('$p_name', '$p_price', '$p_image', '$p_quantity')");
        $display_message[] = "products is added successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
    <link rel="stylesheet" href="all.css">
    
    <title>Shop Product</title>
</head>

<body>
    <!-- header  -->
    <?php include 'nav.php' ?>

    <div class="container text-center bg-warningd p-5 shadow border border-light w-100">
        <?php
        if (isset($display_message)) {
            foreach ($display_message as $display_message) {
                echo "<div class='display_message'>
         <span>$display_message</span>;
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>;
    </div>";
            }
        }
        ?>
        <section class="product">
            <h3 class="heading">Let's Shop</h3>
            <div class="product_container d-flex justify-content-center">
                <?php
                $select_product = mysqli_query($conn, "select * from `shop`");
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                        // echo $fetch_product['pname'];
                ?>
                        <form action="" method="post">
                            <div id="cart-table" class="edit_form bg-secondary p-4">
                                <img src="images/<?php echo $fetch_product['image'] ?>" alt="bad" srcset="" class="">
                                <h4 class="text-danger"><?php echo $fetch_product['pname'] ?></h4>
                                <p class="price text-info"> $<?php echo $fetch_product['price'] ?>/.</p>
                                <input type="hidden" name="pname" value=" <?php echo $fetch_product['pname'] ?>">
                                <input type="hidden" name="price" value=" <?php echo $fetch_product['price'] ?>">
                                <input type="hidden" name="image" value=" <?php echo $fetch_product['image'] ?>">
                                <div>
                                    <button id="btn" type="submit" name="Add-Cart" class="submit_btn 
                    cart_btn btn btn-dark mt-2">Add To Cart</button>
                                </div>
                                <!-- <input type="submit" value="Add To Cart" class="submit_btn cart_btn"> -->
                            </div>
                        </form>
                <?php
                    }
                } else {
                    echo "<h5 class='empty_text text-center text-danger m-3'> no Product for now</h5>";
                }
                ?>


            </div>
        </section>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</html>