<?php include './database/conn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.js"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
        <link rel="shortcut icon" href="./images/download.png" type="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />

    <title>Update Product</title>
</head>

<body>
    <div class="sticky-top">
        <?php include('nav.php') ?>
    </div>
    <section class="container mt-4">
        <!-- PHP code  -->
        <?php
        if (isset($_GET['EdiT'])) {
            $edit_id = $_GET['EdiT'];
            // $edit_query = mysqli_query($conn, "Select * from `shop` Where id = $edit_id");
            $edit_query = mysqli_query($conn, "SELECT * FROM `shop` WHERE id=$edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                $fetch_data = mysqli_fetch_assoc($edit_query);
        ?>
                <!-- Forms -->
                <form action="" method="post" enctype="multipart/form-data"
                    class="form-group text-center box shadow m-auto p-4 w-50">
                    <div>
                        <img src="images/<?php echo $fetch_data['image'] ?>"
                            alt="Product Image" class="img-fluid mb-3">
                    </div>
                    <div>
                        <input type="hidden" name="edit_id" value="<?php echo $fetch_data['id'] ?>"
                            class="form-control" required>
                    </div>
                    <div>
                        <input type="text" name="pname" value="<?php echo $fetch_data['pname'] ?>"
                            class="form-control mb-2" required>
                    </div>
                    <div>
                        <input type="number" name="price" value="<?php echo $fetch_data['price'] ?>"
                            class="form-control mb-2" required>
                    </div>
                    <div>
                        <input type="file" name="image" class="form-control mb-2" accept="image/png, 
                        image/jpg, image/jpeg">
                    </div>
                    <div class="btns mt-3">
                        <input type="submit" name="update_product" class="edit_btn btn btn-primary w-25"
                            value="Update">
                        <input type="reset" id="close-edit" value="Cancel" class="cancel_btn btn btn-secondary
                         w-25">
                    </div>
                </form>
        <?php
            } else {
                echo "<div class='alert alert-danger'>Product not found.</div>";
            }
        }

        // Handle form submission for update
        if (isset($_POST['update_product'])) {
            $edit_id = $_POST['edit_id'];
            $pname = $_POST['pname'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = "images/" . $image;

            if (!empty($image)) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $update_query = "UPDATE `shop` SET pname = '$pname', price = '$price', image = '$image' WHERE id = $edit_id";
            } else {
                $update_query = "UPDATE `shop` SET pname = '$pname', price = '$price' WHERE id = $edit_id";
            }

            $result = mysqli_query($conn, $update_query);
            if ($result) {
                echo "<div class='alert alert-success'>Product updated successfully.</div>";
                // header('location:view.php');
            } else {
                echo "<div class='alert alert-danger'>Failed to update product.</div>";
            }
        }
        ?>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
     crossorigin="anonymous"></script> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>