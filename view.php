<?php include './database/conn.php'; ?>
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
    <title>View-Product</title>
</head>

<body>
    <div class="sticky-top">
        <?php include('nav.php') ?>
    </div>
    <marquee behavior="" direction="left"><h5 class="text-primary">This website was build under Nonsoglobal @2025</h5></marquee>
    <div class="container bg-dark text-light mt-4 mb-3">
        <section class="display_product">
            <table class="m-auto text-center w-100">
                <thead class="text-center text-center border border-2 border-info">
                    <tr>
                        <th>S/N</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Time</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- php code -->
                    <?php
                    $display_product = mysqli_query($conn, "Select * from `shop`");
                    $num = 1;
                    if (mysqli_num_rows($display_product) > 0) {
                        
                        // Logic to fectch data
                        while ($row = mysqli_fetch_assoc($display_product)) {
                            // echo $row['pname'];
                    ?>
                            <!-- display product -->
                            <tr>
                                <td class="border border-primary"><?php echo $num ?></td>
                                <td class="border border-warning"><img class="h-500" src="images/<?php echo $row['image'] ?>" alt=php echo $row['pname'] srcset=""></td>
                                <td class="border border-secondary"><?php echo $row['pname'] ?></td>

                                <td class="border border-danger">$<?php echo $row['price'] ?></td>
                                <td class="border border-secondary"><?php echo $row['create_at'] ?></td>
                                <td class="border border-success p-1">
                                    <a href="./delet.php?Remove=<?php echo $row['id'] ?>" onclick="return confirm('Are Sure You Want To Delete This Product?');" class="delete_product_btn">
                                        <i class="fas fa-trash border-3"></i></a>
                                    <a href="updat.php?EdiT=<?php echo $row['id'] ?>" onclick="return confirm('Are Sure You Want To Update This Product?');" class="update_product_btn">
                                        <i class="fas fa-edit mx-3"></i></a>
                                </td>

                            </tr>

                    <?php
                            $num++;
                        }
                    } else {
                        echo "<h5 class='empty_text text-center text-danger m-3'> no Product for now</h5>";
                    }
                    ?>

                </tbody>
            </table>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>