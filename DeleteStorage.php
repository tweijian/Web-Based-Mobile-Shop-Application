<?php
    include("DBConnection.php");
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM storage WHERE id=$ID");
    header("Location:ManageStorage.php");
?>