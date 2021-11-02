<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM order_items  WHERE order_id=$ID");
    $result = mysqli_query($connect, "DELETE FROM orders WHERE id=$ID");
    header("Location:Sales.php");
?>