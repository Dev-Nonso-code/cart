<?php 
include './database/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
    <title>Nav Bar</title>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Nonsoglobal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Add Productes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./view.php">View Productes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                MORE
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item" href="./shop_p.php">Shopit</a></li>
                                <!-- select query  -->
                                <?php
                                $select_product = mysqli_query($conn, "Select * from `cart`") or die('Query Failed');
                                $row_count = mysqli_num_rows($select_product)
                                ?>
                                <a href="./cartes.php" class="cart">
                                <li>
                                    <hr class="dropdown-divider"><span class="material-symbols-outlined">
                                        shopping_cart
                                        <sup><?php echo $row_count ?></sup>
                                    </span>
                                </li>
                                </a>
                                <li><a class="dropdown-item" href="#">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true">About Us</a>
                        </li>
                    </ul>
                    <a href="./cartes.php" class="cart">
                        <span class="material-symbols-outlined m-3 bg-denger">
                            shopping_cart

                            <sup><?php echo $row_count ?></sup>

                        </span>
                    </a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </main>
</body>

</html>