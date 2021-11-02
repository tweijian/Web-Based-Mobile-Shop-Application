<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('Staff.php');
	require_once('DataBase.php');
	include_once("DBConnection.php");
	session_start();
	$StaffID="";
	$staff = NULL;
	if(isset($_SESSION['StaffID']) && !empty($_SESSION['StaffID'])) {
		$UserID=$_SESSION['StaffID'];
		$DB = new DataBase();
		$staff = $DB->getStaffById($UserID);
	}
	$result = mysqli_query($connect, "SELECT * FROM staff WHERE id='$UserID'");
	while($res = mysqli_fetch_array($result)){
		$Username = $res['username'];
	}
?>

<html>
	<?php
		//header
		include ('Header.php');
	?>

	<div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 350px;">
                       Staff Panel - Homepage
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('StaffNav.php');
    ?>
    
	<div style="margin: 10px;">
		<div class="card">
            <div class="card-body">
				<h1 style="text-align: center;">
					Welcome Back, <?php echo $Username;?>
				</h1>
			</div>
		</div>
	</div>	

	<?php
		//footer
		include ('Footer.php');
	?>
	</body>
</html>