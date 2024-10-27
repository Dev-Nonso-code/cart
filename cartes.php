<?php
include './database/conn.php';
// Update Query


if (isset($_POST['Update_cart_q'])) {
    $update_value = $_POST['Update_quantity'];
    // echo $update_value;
    $update_id = $_POST['Update_quantity_id'];
   

    // query
    $update_quantity_query = mysqli_query($conn, "update `cart` set quantity = $update_value WHERE id = $update_id ");
    echo "updated Successfully";
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./all.css">
    <title>Cart Page</title>
</head>
<style>
    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: wavy;
        text-transform: capitalize;
    }
</style>

<body>

    <div>
        <?php include 'nav.php'; ?>
    </div>

    <main class="container bg-dark text-light mt-4 mb-3">
        <section class="shopping_cart m-auto text-center">
            <h1 class="heading">My Cart</h1>
            <table class="m-auto text-center w-100 form-group">
                <?php
                $select_cart_product = mysqli_query($conn, "Select * from `cart`");
                if (mysqli_num_rows($select_cart_product) > 0) {
                    echo "<thead class='text-center border border-2 border-info'>
                    <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
                    while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_product)) {
                ?>

                        <tr>
                            <td>1</td>
                            <td><?php echo $fetch_cart_products['name'] ?></td>
                            <td>

                                <img src="images/<?php echo $fetch_cart_products["image"] ?>" alt="bad" srcset="">
                            </td>
                            <td>$<?php echo $fetch_cart_products['price'] ?>/-</td>


                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="Update_quantity_id" value="<?php echo $fetch_cart_products['id'] ?>">
                                    <div class="d-block text-center m-auto justify-content-center">
                                        <div>
                                            <input type="number" name="Update_quantity" id="" min="1" max="20" class="form-contro">
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-info" name="Update_cart_q">
                                    </div>
                                </form>
                            </td>
                            <td>$10000/-</td>
                            <td>
                                <a href=""><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No Products Avaliable";
                }
                ?>

                </tbody>
            </table>

            <!-- bottom area  -->

            <div class="d-flex mt-4 bg-danger justify-content-around pt-3">
                <a href="./shop_p.php">continue shopping</a>
                <h3 class="bottom_btn">Grand total: <span>$25000/-</span></h3>
                <a href="checkout.php">proceed to checkout</a>
            </div>

        </section>
    </main>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->

</html>