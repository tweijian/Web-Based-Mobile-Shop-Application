<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM admin WHERE id=$ID");
    header("Location:ManageAdmin.php");
?>