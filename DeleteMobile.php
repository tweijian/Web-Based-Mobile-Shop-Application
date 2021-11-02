<?php
	include ('DBConnection.php');
	if(isset($_POST['ID'])){
	$delete_id = $_POST['ID'];
		$result = mysqli_query($connect, "DELETE FROM mobile WHERE id=$delete_id");
		if($result){
			echo "<script>window.open('ManageMobile.php' , '_self')</script> ";
		}
	}
?>

    