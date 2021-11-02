<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM user WHERE id=$ID");
    header("Location:ManageUser.php");
?>