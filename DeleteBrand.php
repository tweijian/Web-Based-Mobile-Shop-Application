<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM brand WHERE id=$ID");
    header("Location:ManageBrand.php");
?>