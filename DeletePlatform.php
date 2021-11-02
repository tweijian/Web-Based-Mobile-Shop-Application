<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM platform WHERE id=$ID");
    header("Location:ManagePlatform.php");
?>