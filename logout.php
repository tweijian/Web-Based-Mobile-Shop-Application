<?php
	session_start();
	unset($_SESSION["UserID"]);
	unset($_SESSION["AdminID"]);
	unset($_SESSION["StaffID"]);
	header('Location: Home.php');
?>