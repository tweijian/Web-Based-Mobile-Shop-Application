<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "UPDATE orders SET status='Delivered' WHERE id='$ID'");
    header("Location:Sales.php");
?>