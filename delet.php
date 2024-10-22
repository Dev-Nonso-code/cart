<!-- delete logic  -->

<!-- php code -->



<?php
include './database/conn.php';

if (isset($_GET['Remove'])) {
    $delete_id = $_GET['Remove'];
    $delete_query = mysqli_query($conn, "Delete from `shop` WHERE id = $delete_id") or die('Failed to query');
    // print_r($delete_id);
    if ($delete_query) {
        echo "Product deleted";
        header('location: view.php');
    } else {
        echo "Product not deleted";
        header('location: view.php');
    }
    
}

?>